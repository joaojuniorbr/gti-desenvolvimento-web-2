<?php
require_once('./config.php');
$configuration = [
  'title' => 'Aula 07 - Exercício 7',
  'menu' => $config['menu']
];

include '../components/header.php';

function calcularMediaArredondada($nota1, $nota2, $nota3)
{
  $media = ($nota1 + $nota2 + $nota3) / 3;
  return ceil($media * 10) / 10;
}
?>

<div class="container mx-auto py-10">
  <h1 class="text-center text-2xl font-bold mb-10">
    Exercício 7
  </h1>

  <form action="" method="POST" class="flex flex-col gap-4 max-w-lg mx-auto">
    <div class="flex flex-col">
      <label for="nota1" class="text-sm font-medium text-gray-700 mb-2">Nota 1:</label>
      <input type="number" step="0.01" name="nota1" id="nota1" required class="border border-gray-300 rounded p-3" />
    </div>

    <div class="flex flex-col">
      <label for="nota2" class="text-sm font-medium text-gray-700 mb-2">Nota 2:</label>
      <input type="number" step="0.01" name="nota2" id="nota2" required class="border border-gray-300 rounded p-3" />
    </div>

    <div class="flex flex-col">
      <label for="nota3" class="text-sm font-medium text-gray-700 mb-2">Nota 3:</label>
      <input type="number" step="0.01" name="nota3" id="nota3" required class="border border-gray-300 rounded p-3" />
    </div>

    <button type="submit" class="p-4 bg-indigo-600 text-white rounded-md w-full">Calcular Média</button>
  </form>

  <?php if (
    $_SERVER['REQUEST_METHOD'] === 'POST' &&
    isset($_POST['nota1'], $_POST['nota2'], $_POST['nota3'])
  ): ?>
    <?php
    $nota1 = (float)$_POST['nota1'];
    $nota2 = (float)$_POST['nota2'];
    $nota3 = (float)$_POST['nota3'];

    $media = calcularMediaArredondada($nota1, $nota2, $nota3);
    ?>
    <div class="bg-slate-50 border border-slate-400 rounded px-10 py-6 mt-10 max-w-lg mx-auto space-y-4">
      <p><strong>Notas:</strong> <?php echo "$nota1, $nota2, $nota3"; ?></p>
      <p><strong>Média arredondada para cima:</strong> <?php echo number_format($media, 1, ',', '.'); ?></p>
    </div>
  <?php endif; ?>
</div>

<?php include '../components/footer.php'; ?>