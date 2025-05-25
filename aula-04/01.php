<?php
require_once('./config.php');
$configuration = [
  'logo' => 'Aula 04',
  'title' => 'Aula 04 - Exercício 1',
  'menu' => $config['menu']
];

include '../components/header.php';

?>
<div class="container mx-auto py-10 max-w-md">
  <h1 class="text-center text-2xl font-bold mb-10">
    Exercício 1
  </h1>
  <form action="" method="POST" class="space-y-4 bg-white p-6 rounded shadow border border-slate-200">
    <div>
      <label for="name" class="block text-sm font-bold text-gray-700">Nome:</label>
      <input type="text" id="name" name="name" class="mt-1 block w-full border border-gray-300 rounded p-4 shadow-sm" required>
    </div>
    <div>
      <label for="password" class="block text-sm font-bold text-gray-700">Senha:</label>
      <input type="password" id="password" name="password" class="mt-1 block w-full border border-gray-300 rounded p-4 shadow-sm" required>
    </div>
    <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">Enviar</button>
  </form>

  <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
    <?php
    $name = htmlspecialchars($_POST['name']);
    $password = htmlspecialchars($_POST['password']);
    ?>
    <div class="bg-white border border-slate-200 shadow rounded p-6 mt-10">
      <h2 class="text-lg font-bold">Dados Recebidos:</h2>
      <p class="text-xs text-gray-500 mb-4"><?php echo date('d/m/Y H:i:s'); ?></p>

      <p><strong>Nome:</strong> <?php echo $name; ?></p>
      <p><strong>Senha:</strong> <?php echo $password; ?></p>
    </div>
  <?php endif; ?>
</div>

<?php include '../components/footer.php'; ?>