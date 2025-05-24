<?php
include './config.php';

$configuration = [
  'title' => 'Aula 07 - Exercício 2',
  'menu' => $config['menu']
];

include '../components/header.php';

function ajustarPreco($preco, $percentual)
{
  return $preco + ($preco * $percentual / 100);
}
?>

<div class="container mx-auto py-20">
  <h1 class="text-center text-2xl font-bold mb-10">
    Exercício 3 - Ajuste de Preço (Valor de Retorno)
  </h1>

  <form action="" method="POST" class="flex flex-col gap-4 max-w-lg mx-auto">
    <div class="flex flex-col">
      <label for="preco" class="text-sm font-medium text-gray-700 mb-2">Preço da Mercadoria:</label>
      <input type="number" name="preco" id="preco" step="0.01" required class="border border-gray-300 rounded p-3" />
    </div>

    <div class="flex flex-col">
      <label for="percentual" class="text-sm font-medium text-gray-700 mb-2">Percentual de Ajuste (%):</label>
      <input type="number" name="percentual" id="percentual" step="0.01" required class="border border-gray-300 rounded p-3" />
    </div>

    <button type="submit" class="p-4 bg-indigo-600 text-white rounded-md w-full">Calcular Novo Preço</button>
  </form>

  <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['preco'], $_POST['percentual'])): ?>
    <?php
    $preco = (float)$_POST['preco'];
    $percentual = (float)$_POST['percentual'];
    $precoAjustado = ajustarPreco($preco, $percentual);
    ?>
    <div class="bg-slate-50 border border-slate-400 rounded px-10 py-6 mt-10 max-w-lg mx-auto space-y-4">
      <p><strong>Preço original:</strong> R$ <?php echo number_format($preco, 2, ',', '.'); ?></p>
      <p><strong>Percentual de ajuste:</strong> <?php echo number_format($percentual, 2, ',', '.'); ?>%</p>
      <p><strong>Preço ajustado:</strong> R$ <?php echo number_format($precoAjustado, 2, ',', '.'); ?></p>
    </div>
  <?php endif; ?>
</div>

<?php include '../components/footer.php'; ?>