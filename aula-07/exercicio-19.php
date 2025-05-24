<?php
require_once('./config.php');

$configuration = [
  'title' => 'Aula 07 - Exercício 19',
  'menu' => $config['menu']
];

include '../components/header.php';

function extrairHashtags($input)
{
  $palavras = preg_split('/\s+/', trim($input));
  $hashtags = [];

  foreach ($palavras as $palavra) {
    if (str_starts_with($palavra, '#')) {
      $hashtags[] = substr($palavra, 1);
    }
  }

  return $hashtags;
}

function gerarSQL($hashtags, $postId = 1)
{
  $linhas = [];
  foreach ($hashtags as $tag) {
    $tag = addslashes($tag);
    $linhas[] = "INSERT INTO post_tags VALUES ($postId,'$tag');";
  }
  return $linhas;
}

$resultado = null;

$input = $_POST['hashtags'] ?? '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $tags = extrairHashtags($input);
  $resultado = gerarSQL($tags);
}
?>

<div class="container mx-auto py-10">
  <h1 class="text-2xl font-bold mb-6 text-center">Exercício 19</h1>

  <form method="POST" class="max-w-md mx-auto space-y-6">
    <div>
      <label for="hashtags" class="block font-semibold mb-2">Digite as hashtags:</label>
      <input
        type="text"
        name="hashtags"
        id="hashtags"
        class="w-full border border-gray-300 p-2 rounded"
        placeholder="#sextou #feriado #sqn"
        required
        value="<?php echo htmlspecialchars($input); ?>" />
    </div>

    <button type="submit" class="p-4 bg-indigo-600 text-white rounded-md w-full">Gerar SQL</button>
  </form>

  <?php if ($resultado): ?>
    <div class="max-w-md mx-auto mt-6 p-4 bg-white border border-gray-400 rounded space-y-2 text-sm">
      <?php foreach ($resultado as $linha): ?>
        <div class="font-mono text-red-600"><?php echo htmlspecialchars($linha); ?></div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
</div>

<?php include '../components/footer.php'; ?>