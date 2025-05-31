<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['nome'])) {
  setcookie("usuario", $_POST['nome'], time() + 3600);
  header("Location: " . $_SERVER['PHP_SELF']);
  exit;
}

require_once('./config.php');

$configuration = [
  'logo' => 'Aula 09',
  'title' => 'Exercício 1',
  'menu' => $config['menu']
];

include '../components/header.php';

$nome = isset($_COOKIE['usuario']) ? $_COOKIE['usuario'] : 'Visitante';
?>

<div class="container mx-auto py-10 max-w-md text-center">
  <h1 class="text-2xl font-bold mb-4">Exercício 1</h1>

  <form method="POST" class="mb-6 space-y-4 bg-white p-6 rounded shadow">
    <input
      type="text"
      name="nome"
      placeholder="Digite seu nome"
      class="w-full border border-gray-300 px-4 py-2 rounded" />
    <button
      type="submit"
      class="w-full bg-indigo-600 text-white py-2 rounded hover:bg-indigo-700">
      Enviar
    </button>
  </form>

  <h2 class="text-xl text-slate-600 flex items-center justify-center gap-2">
    <i class="ri-user-line text-stone-800 text-2xl"></i>
    Olá, <?php echo htmlspecialchars($nome); ?>!
  </h2>
</div>

<?php include '../components/footer.php'; ?>