<?php
require_once('./config.php');
$configuration = [
  'logo' => 'Aula 04',
  'title' => 'Aula 04 - Exercício 4',
  'menu' => $config['menu']
];

include '../components/header.php';

?>

<div class="container mx-auto py-10 max-w-md">
  <h1 class="text-center text-2xl font-bold mb-10">
    Exercício 4
  </h1>
  <form method="GET" class="space-y-4 bg-white p-6 rounded shadow border border-slate-200">
    <div>
      <label for="valor" class="block text-sm font-bold text-gray-700">Informe o valor (em reais):</label>
      <input type="number" name="valor" id="valor" min="1" class="mt-1 block w-full border border-gray-300 rounded p-4 shadow-sm" required>
    </div>
    <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">Calcular</button>
  </form>

  <?php if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['valor'])): ?>
    <?php
    $valor = $_GET['valor'];

    $cedulas = [100, 50, 20, 10, 5, 2, 1];

    $resultado = [];

    foreach ($cedulas as $cedula) {
      $quantidade = (int) ($valor / $cedula);
      if ($quantidade > 0) {
        $resultado[$cedula] = $quantidade;
        $valor %= $cedula;
      }
    }
    ?>

    <div class="bg-white border border-slate-200 shadow rounded p-6 mt-10">
      <h2 class="text-lg font-bold mb-4">Cédulas necessárias:</h2>
      <ul class="space-y-4">
        <?php foreach ($resultado as $cedula => $quantidade): ?>
          <li class="flex items-center space-x-2">
            <span class="bg-indigo-600 text-white inline-block px-2 py-1 rounded text-xs"><?php echo $quantidade ?></span>
            <i class="ri-arrow-right-line"></i>
            <span class="text-gray-700 text-xl">R$ <?php echo $cedula; ?></span>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  <?php endif; ?>
</div>
<?php include '../components/footer.php'; ?>