<?php
require_once('./config.php');
$configuration = [
  'title' => 'Aula 07 - Exercício 6',
  'menu' => $config['menu']
];

include '../components/header.php';


function raizQuadradaAproximada($c, $chuteInicial = 1.0)
{
  if ($c < 0) {
    return null;
  }

  $resultado = $chuteInicial;
  do {
    $resultado = 0.5 * ($resultado + $c / $resultado);
  } while (abs($c - ($resultado * $resultado)) >= 0.0001);

  if (floor($resultado) ** 2 === $c) {
    return (int)floor($resultado);
  }

  return null;
}
?>
<div class="container mx-auto py-10">
  <h1 class="text-center text-2xl font-bold mb-10">
    Exercício 6
  </h1>

  <form action="" method="POST" class="flex flex-col gap-4 max-w-lg mx-auto">
    <div class="flex flex-col">
      <label for="numero" class="text-sm font-medium text-gray-700 mb-2">Digite o valor de c:</label>
      <input type="number" id="numero" name="numero" step="any" required class="w-full border border-gray-300 rounded p-4 flex-1" />
    </div>

    <div class="flex flex-col">
      <label for="chute" class="text-sm font-medium text-gray-700 mb-2">Chute inicial (opcional):</label>
      <input type="number" id="chute" name="chute" step="any" class="w-full border border-gray-300 rounded p-4 flex-1" />
    </div>

    <button type="submit" class="p-4 bg-indigo-600 text-white rounded-md w-full">Calcular Raiz</button>
  </form>

  <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['numero'])): ?>
    <?php
    $numero = floatval($_POST['numero']);
    $chute = isset($_POST['chute']) && $_POST['chute'] !== '' ? floatval($_POST['chute']) : 1.0;
    $resultado = raizQuadradaAproximada($numero, $chute);
    ?>
    <div class="bg-slate-50 border border-slate-400 rounded px-10 py-6 space-y-2 mt-10 max-w-lg mx-auto">
      <p><strong>Valor de c:</strong> <?php echo $numero; ?></p>
      <p><strong>Chute Inicial:</strong> <?php echo $chute; ?></p>
      <?php if ($resultado !== null): ?>
        <p class="text-green-600"><strong>Raiz Quadrada:</strong> <?php echo $resultado; ?></p>
      <?php else: ?>
        <p class="text-red-600 font-bold">Não é possível calcular a raiz de <?php echo $numero; ?>.</p>
      <?php endif; ?>
    </div>
  <?php endif; ?>
</div>
<?php include '../components/footer.php'; ?>