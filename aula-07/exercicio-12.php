<?php
include './config.php';

$configuration = [
  'title' => 'Aula 07 - Exercício 12',
  'menu' => $config['menu']
];

include '../components/header.php';
?>

<div class="container mx-auto py-20">
  <h1 class="text-center text-2xl font-bold mb-10">Exercício 12 – Leitura de Arquivo</h1>

  <form action="" method="POST" enctype="multipart/form-data" class="flex flex-col gap-4 max-w-lg mx-auto">
    <label class="text-sm font-medium text-gray-700">
      Escolha um arquivo de texto (.txt):
    </label>
    <input type="file" name="arquivo" accept=".txt" required class="bg-white border border-gray-300 rounded p-3" />
    <button type="submit" class="p-4 bg-indigo-600 text-white rounded-md w-full">Ler Arquivo</button>
  </form>

  <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['arquivo'])): ?>
    <?php
    $arquivo = $_FILES['arquivo'];

    if ($arquivo['error'] === UPLOAD_ERR_OK && mime_content_type($arquivo['tmp_name']) === 'text/plain') {
      $conteudo = file_get_contents($arquivo['tmp_name']);
    ?>
      <div class="bg-white border border-slate-400 rounded p-6 mt-10 max-w-lg mx-auto space-y-4">
        <h2 class="text-lg font-semibold">Conteúdo do Arquivo:</h2>
        <pre class="whitespace-pre-wrap text-sm text-gray-800"><?php echo htmlspecialchars($conteudo); ?></pre>
      </div>
    <?php } else { ?>
      <div class="text-red-600 mt-10 text-center">Erro ao carregar o arquivo. Verifique se o arquivo é um arquivo .txt válido.</div>
    <?php } ?>
  <?php endif; ?>
</div>

<?php include '../components/footer.php'; ?>