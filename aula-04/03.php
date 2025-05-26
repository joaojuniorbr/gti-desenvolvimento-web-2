<?php
require_once('./config.php');
$configuration = [
  'logo' => 'Aula 04',
  'title' => 'Aula 04 - Exercício 3',
  'menu' => $config['menu']
];

include '../components/header.php';

?>
<div class="container mx-auto py-10 max-w-md">
  <h1 class="text-center text-2xl font-bold mb-10">
    Exercício 3
  </h1>
  <form action="" method="GET" class="space-y-4 bg-white p-6 rounded shadow border border-slate-200">
    <div>
      <label for="weight" class="block text-sm font-bold text-gray-700">Peso (kg):</label>
      <input type="number" id="weight" name="weight" step="0.1" class="mt-1 block w-full border border-gray-300 rounded p-4 shadow-sm" required>
    </div>
    <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">Calcular</button>
  </form>

  <?php if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['weight'])): ?>
    <?php
    $weight = htmlspecialchars($_GET['weight']);
    $calculoDeAgua = $weight * 0.035;
    ?>
    <div class="bg-white border border-slate-200 shadow rounded p-6 mt-10">
      <h2 class="text-lg font-bold">Resultado:</h2>
      <p class="text-xs text-gray-500 mb-4"><?php echo date('d/m/Y H:i:s'); ?></p>

      <p><strong>Peso:</strong> <?php echo $weight; ?> kg</p>
      <p><strong>Quantidade ideal de água:</strong> <?php echo number_format($calculoDeAgua, 2); ?> litros por dia</p>
    </div>
  <?php endif; ?>
</div>

<?php include '../components/footer.php'; ?>