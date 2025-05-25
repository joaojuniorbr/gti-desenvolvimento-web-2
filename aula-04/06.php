<?php
require_once('./config.php');
$configuration = [
  'logo' => 'Aula 04',
  'title' => 'Aula 04 - Exercício 6',
  'menu' => $config['menu']
];

include '../components/header.php';

?>

<div class="container mx-auto py-10 max-w-md">
  <h1 class="text-center text-2xl font-bold mb-10">
    Exercício 6
  </h1>
  <form method="POST" class="space-y-4 bg-white p-6 rounded shadow border border-slate-200">
    <div>
      <label class="block text-sm font-medium text-gray-700 mb-1">Digite o número de selos:</label>
      <input type="number" name="selos" required class="w-full px-3 py-2 border border-gray-300 rounded" />
    </div>

    <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600 transition">
      Verificar
    </button>
  </form>

  <?php if (isset($_POST['selos'])): ?>
    <?php
    $selos = (int)$_POST['selos'];
    $resposta = 'Não';

    for ($i = 2; $i < $selos; $i++) {
      if ($selos % $i === 0 && ($selos / $i) > 1) {
        $resposta = 'Sim';
        break;
      }
    }

    $classe = $resposta === 'Sim' ? 'bg-green-100 text-green-700 border-green-600' : 'bg-red-100 text-red-700 border-red-600';
    ?>
    <div class="mt-6 p-4 text-center rounded border <?= $classe ?>">
      <strong>Resultado:</strong> <?= $resposta ?>
    </div>
  <?php endif; ?>

</div>
<?php include '../components/footer.php'; ?>