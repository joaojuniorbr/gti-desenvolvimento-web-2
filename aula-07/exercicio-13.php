<?php
require_once('./config.php');
$configuration = [
  'logo' => 'Aula 07',
  'title' => 'Aula 07 - Exercício 13',
  'menu' => $config['menu']
];

include '../components/header.php';

function uploadArquivo()
{

  $resultado = '';
  $status = '';

  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['arquivo'])) {
    $arquivo = $_FILES['arquivo'];

    if ($arquivo['error'] === UPLOAD_ERR_OK) {
      $nomeTemporario = $arquivo['tmp_name'];
      $nomeArquivo = strtolower(trim(preg_replace('/\s+/', '', date('YmdHis') . '-' . $arquivo['name'])));
      $caminhoDestino = './upload/' . $nomeArquivo;

      if (pathinfo($nomeArquivo, PATHINFO_EXTENSION) === 'txt') {
        if (move_uploaded_file($nomeTemporario, $caminhoDestino)) {
          $resultado = "Arquivo armazenado com sucesso: <strong>$nomeArquivo</strong>";
          $status = "success";
        } else {
          $resultado = "Erro ao mover o arquivo.";
          $status = "error";
        }
      } else {
        $resultado = "Apenas arquivos .txt são permitidos.";
        $status = "warning";
      }
    } else {
      $resultado = "Erro no upload do arquivo.";
      $status = "error";
    }
  }

  return array(
    'mensagem' => $resultado,
    'status' => $status
  );
}

function getStatus($status)
{
  switch ($status) {
    case 'success':
      return 'border-green-600 text-green-600';
    case 'error':
      return 'border-red-600 text-red-600';
    case 'warning':
      return 'border-yellow-800 text-yellow-800';
    default:
      return 'border-slate-400 text-slate-800';
  }
}

$uploadResult = uploadArquivo();

?>

<div class="container mx-auto py-10">
  <h1 class="text-center text-2xl font-bold mb-10">Exercício 13 - Upload de Arquivo</h1>

  <form action="" method="POST" enctype="multipart/form-data" class="flex flex-col gap-4 max-w-lg mx-auto">
    <label for="arquivo" class="text-sm font-medium text-gray-700">Escolha um arquivo .txt para enviar:</label>
    <input type="file" name="arquivo" id="arquivo" required class="bg-white border border-gray-300 rounded p-3" accept=".txt" />
    <button type="submit" class="p-4 bg-indigo-600 text-white rounded-md w-full">Enviar Arquivo</button>
  </form>

  <?php if (!empty($uploadResult['mensagem'])): ?>
    <div class="<?php echo getStatus($uploadResult['status']); ?> bg-white border rounded px-6 py-4 mt-8 text-center max-w-lg mx-auto">
      <?php echo $uploadResult['mensagem']; ?>
    </div>
  <?php endif; ?>
</div>

<?php include '../components/footer.php'; ?>