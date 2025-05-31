<?php
session_start();

if (isset($_GET['reset'])) {
  session_destroy();
  header("Location: " . strtok($_SERVER['REQUEST_URI'], '?'));
  exit;
}

if (!isset($_SESSION['contador'])) {
  $_SESSION['contador'] = 1;
} else {
  $_SESSION['contador']++;
}

require_once('./config.php');

$configuration = [
  'logo' => 'Aula 09',
  'title' => 'Exercício 3',
  'menu' => $config['menu']
];

include '../components/header.php';
?>

<div class="container mx-auto py-10 max-w-md text-center">
  <h1 class="text-2xl font-bold mb-8">Exercício 3</h1>

  <img src="../assets/images/stuck-at-home-home-office.png" class="mx-auto h-auto max-w-sm mb-8 w-full" />

  <p class="mb-10 text-slate-700">
    Você acessou esta página <span class="inline-block font-bold bg-indigo-600 text-white px-2 px-1 rounded"><?php echo $_SESSION['contador']; ?></span> vez(es) nesta sessão.
  </p>

  <a href="?reset=true" class="inline-block bg-red-600 text-white px-4 py-2 rounded text-xs">
    Encerrar sessão e zerar contador
  </a>
</div>

<?php include '../components/footer.php'; ?>