<?php
session_start();

if (isset($_GET['reset'])) {
  session_destroy();
  header("Location: ./exercicio-4.php");
  exit;
}

require_once('./config.php');

$configuration = [
  'logo' => 'Aula 09',
  'title' => 'Exercício 4 - Final',
  'menu' => $config['menu']
];

if (!isset($_SESSION['dados'])) {
  header('Location: exercicio-4.php');
  exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['areas'])) {
    $_SESSION['dados']['areas'] = $_POST['areas'];
  }
}

$dados = $_SESSION['dados'];

include '../components/header.php';
?>

<div class="container mx-auto py-10 max-w-md text-center">
  <h1 class="text-2xl font-bold mb-8">Exercicio 4 - Currículo Registrado</h1>

  <div class="text-left space-y-4 bg-white p-6 rounded shadow">
    <div>
      <div class="font-bold text-xs text-slate-600">Nome:</div>
      <p class="font-semibold"><?php echo htmlspecialchars($dados['nome']) ?></p>
    </div>
    <div>
      <div class="font-bold text-xs text-slate-600">CPF:</div>
      <p class="font-semibold"><?php echo htmlspecialchars($dados['cpf']) ?></p>
    </div>
    <div>
      <div class="font-bold text-xs text-slate-600">Email:</div>
      <p class="font-semibold"><?php echo htmlspecialchars($dados['email']) ?></p>
    </div>
    <div>
      <div class="font-bold text-xs text-slate-600">Nascimento:</div>
      <p class="font-semibold"><?php echo htmlspecialchars($dados['nascimento']) ?></p>
    </div>

    <?php if (isset($dados['areas'])): ?>

      <div>
        <div class="font-bold text-xs text-slate-600">Áreas Dominadas:</div>
        <ul class="list-disc list-inside">
          <?php foreach ($dados['areas'] as $area): ?>
            <li><?php echo htmlspecialchars($area) ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>
  </div>

  <div class="mt-6">
    <a href="?reset=true" class="rounded bg-indigo-600 px-4 py-2 text-white">Cadastrar outro currículo</a>
  </div>
</div>

<?php include '../components/footer.php'; ?>