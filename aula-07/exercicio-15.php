<?php
require_once('./config.php');
$configuration = [
  'logo' => 'Aula 07',
  'title' => 'Aula 07 - Exercício 15',
  'menu' => $config['menu']
];

include '../components/header.php';

function statusStyle($status)
{
  $class = '';
  $icon = '';

  switch ($status) {
    case 'success':
      $class = 'green-600';
      $icon = 'ri-check-line';
      break;
    case 'warning':
      $class = 'yellow-500';
      $icon = 'ri-alert-line';
      break;
    case 'error':
      $class = 'red-600';
      $icon = 'ri-error-warning-line';
      break;
    default:
      $class = '';
      $icon = '';
  }

  return ['class' => $class, 'icon' => $icon];
}



function buscarPalavra()
{
  if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $status = '';

    $lista = [
      "Conceito",
      "Exceção",
      "Muçarela",
      "Paralelepípedo",
      "Maçã",
      "Banana",
      "Pera",
      "Laranja",
      "Mamão",
      "Uva",
      "Figo",
      "Goiaba",
      "Ford",
      "Chevrolet",
      "Volkswagen",
      "Toyota",
      "Honda",
      "Nissan",
      "Renault",
      "Azul",
      "Vermelho",
      "Amarelo",
      "Verde",
      "Branco",
      "Preto",
      "Cinza",
      "Rosa",
      "São Paulo",
      "Rio de Janeiro",
      "Brasília",
      "Belo Horizonte",
      "Porto Alegre",
      "Curitiba",
      "Florianópolis",
      "Goiânia"
    ];

    $palavra = trim($_POST["palavra"] ?? '');

    if ($palavra !== '') {
      $posicao = array_search($palavra, $lista);

      if ($posicao !== false) {
        $mensagem = "Palavra encontrada na posição <strong>$posicao</strong>!";
      } else {

        $melhorSimilaridade = 0;
        $melhorPalavra = '';

        foreach ($lista as $item) {
          similar_text(strtolower($palavra), strtolower($item), $percentual);
          if ($percentual > $melhorSimilaridade) {
            $melhorSimilaridade = $percentual;
            $melhorPalavra = $item;
          }
        }

        if ($melhorSimilaridade >= 95) {
          $posicao = array_search($melhorPalavra, $lista);
          $mensagem = "Palavra encontrada na posição <strong>$posicao</strong>!";
          $status = 'success';
        } elseif ($melhorSimilaridade >= 75) {
          $posicao = array_search($melhorPalavra, $lista);
          $mensagem = "Você quis dizer <strong>$melhorPalavra</strong>? Ela está na posição <strong>$posicao</strong>!";
          $status = 'warning';
        } else {
          $mensagem = "Palavra não encontrada";
          $status = 'error';
        }
      }
    }

    return array(
      'palavra' => $palavra,
      'mensagem' => $mensagem,
      'status' => $status
    );
  }
}

$resultado = buscarPalavra();
$statusResultStyle = statusStyle($resultado['status'] ?? '');
?>

<div class="container mx-auto py-10">
  <h1 class="text-2xl font-bold mb-6 text-center">Exercício 15</h1>

  <form method="POST" class="max-w-md mx-auto">
    <label for="palavra" class="block mb-2 font-semibold">Digite uma palavra:</label>
    <input type="text" name="palavra" id="palavra" class="w-full border border-gray-300 p-2 rounded mb-4" required>

    <button type="submit" class="p-4 bg-indigo-600 text-white rounded-md w-full">Verificar</button>
  </form>

  <?php if ($resultado): ?>
    <div class="max-w-md mx-auto mt-6 p-4 bg-white border border-<?php echo $statusResultStyle['class']; ?> rounded">
      <div class="text-sm text-slate-600 flex items-center gap-2">Palavra: <span class="py-1 px-2 bg-slate-800 text-white rounded"><?php echo $resultado['palavra']; ?></span></div>
      <div class="flex items-center gap-2 mt-2 text-sm text-<?php echo $statusResultStyle['class']; ?>">
        <i class="<?php echo $statusResultStyle['icon']; ?> text-lg"></i>
        <span><?php echo $resultado['mensagem']; ?></span>
      </div>
    </div>
  <?php endif; ?>
</div>

<?php include '../components/footer.php'; ?>