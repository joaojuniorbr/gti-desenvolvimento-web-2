<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['lang'])) {
  $lang = $_POST['lang'];
  setcookie("lang", $lang, time() + (3600 * 30));
  header("Location: " . $_SERVER['PHP_SELF']);
  exit;
}

require_once('./config.php');

$configuration = [
  'logo' => 'Aula 09',
  'title' => 'Exercício 2',
  'menu' => $config['menu']
];

$translations = [
  'pt' => [
    'title' => 'Bem-vindo!',
    'description' => 'Este é um site multilíngue.',
    'select_language' => 'Selecione sua linguagem preferida:',
    'submit' => 'Salvar',
  ],
  'en' => [
    'title' => 'Welcome!',
    'description' => 'This is a multilingual website.',
    'select_language' => 'Select your preferred language:',
    'submit' => 'Save',
  ]
];

$lang = isset($_COOKIE['lang']) ? $_COOKIE['lang'] : 'pt';

$text = $translations[$lang] ?? $translations['pt'];

include '../components/header.php';
?>

<div class="container mx-auto py-10 max-w-md text-center">
  <h1 class="text-2xl font-bold mb-4">Exercício 2</h1>
  <h2 class="text-xl font-bold mb-4"><?php echo $text['title']; ?></h2>
  <p class="mb-6 text-slate-600"><?php echo $text['description']; ?></p>

  <form method="POST" class="space-y-4 bg-white p-6 rounded shadow text-left">
    <p class="block text-sm font-medium mb-2"><?php echo $text['select_language']; ?></p>

    <div class="flex items-center gap-6">
      <label class="inline-flex items-center space-x-2 cursor-pointer">
        <input type="radio" name="lang" value="pt" <?php if ($lang === 'pt') echo 'checked'; ?> class="text-indigo-600">
        <span>Português</span>
      </label>

      <label class="inline-flex items-center space-x-2 cursor-pointer">
        <input type="radio" name="lang" value="en" <?php if ($lang === 'en') echo 'checked'; ?> class="text-indigo-600">
        <span>English</span>
      </label>
    </div>

    <button type="submit" class="mt-4 w-full bg-indigo-600 text-white py-2 rounded">
      <?php echo $text['submit']; ?>
    </button>
  </form>
</div>

<?php include '../components/footer.php'; ?>