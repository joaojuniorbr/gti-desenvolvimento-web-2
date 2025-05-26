<?php
require_once('./config.php');
$configuration = [
  'logo' => 'Aula 04',
  'title' => 'Aula 04 - Exercício 2',
  'menu' => $config['menu']
];

include '../components/header.php';

?>
<div class="container mx-auto py-10 max-w-md">
  <h1 class="text-center text-2xl font-bold mb-10">
    Exercício 2
  </h1>
  <form action="" method="GET" class="space-y-4 bg-white p-6 rounded shadow border border-slate-200">
    <div>
      <label for="name" class="block text-sm font-bold text-gray-700">Nome:</label>
      <input type="text" id="name" name="name" class="mt-1 block w-full border border-gray-300 rounded p-4 shadow-sm" required>
    </div>
    <div>
      <label for="age" class="block text-sm font-bold text-gray-700">Idade:</label>
      <input type="text" id="age" name="age" class="mt-1 block w-full border border-gray-300 rounded p-4 shadow-sm" required>
    </div>
    <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">Enviar</button>
  </form>

  <?php if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['name']) && isset($_GET['age'])): ?>
    <?php
    $name = htmlspecialchars($_GET['name']);
    $age = htmlspecialchars($_GET['age']);
    ?>
    <div class="bg-white border border-slate-200 shadow rounded p-6 mt-10">
      <h2 class="text-lg font-bold mb-4">Dados Recebidos:</h2>

      <p><strong>Nome:</strong> <?php echo $name; ?></p>
      <p><strong>Idade:</strong> <?php echo $age; ?></p>

      <p class="mt-4 text-green-600 font-bold uppercase">Obrigado por enviar seus dados!</p>
      <p class="mt-4"><strong>Data e Hora:</strong> <?php echo date('Y-m-d H:i:s'); ?></p>
    </div>
  <?php endif; ?>
</div>
<?php include '../components/footer.php'; ?>