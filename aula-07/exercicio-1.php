<?php
require_once('./config.php');
$configuration = [
  'title' => 'Aula 07 - Exercício 1',
  'menu' => $config['menu']
];

include '../components/header.php';

?>
<div class="container mx-auto py-10">
  <h1 class="text-center text-2xl font-bold mb-10">
    Exercício 1
  </h1>

  <form action="" method="POST" class="flex flex-row gap-4 max-w-lg mx-auto">
    <label for="numero" class="block text-sm font-medium text-gray-700 flex items-center">Digite um número:</label>
    <input type="number" id="numero" name="numero" required class="w-full border border-gray-300 rounded p-4 flex-1" />
    <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md">Calcular</button>
  </form>

  <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['numero'])): ?>
    <?php
    $numero = (int)$_POST['numero'];
    $quadrado = $numero ** 2;
    ?>
    <div class="bg-slate-50 border border-slate-400 rounded p-10 mt-10">
      <p><strong>Número:</strong> <?php echo $numero; ?></p>
      <p><strong>Quadrado:</strong> <?php echo $quadrado; ?></p>
    </div>
  <?php endif; ?>
</div>
<?php include '../components/footer.php'; ?>