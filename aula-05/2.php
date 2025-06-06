<?php
require_once('./config.php');
$configuration = [
  'logo' => 'Aula 05',
  'title' => 'Aula 05 - Exercício 2',
  'menu' => $config['menu']
];

include '../components/header.php';

$vendas = [
  "Caneca Geek" => 34,
  "Camiseta Dev" => 52,
  "Mousepad RGB" => 27,
  "Chaveiro USB" => 41
];

$total = array_sum($vendas);
$produtoMaisVendido = array_keys($vendas, max($vendas))[0];
$media = $total / count($vendas);
?>
<div class="container mx-auto py-10">

  <h1 class="text-center text-2xl font-bold mb-10">
    Exercício 2
  </h1>

  <div class="bg-white p-8 rounded shadow-lg border border-slate-200 space-y-4">
    <h1 class="text-xl font-bold text-indigo-700">Relatório de Vendas do Mês</h1>

    <p><strong>Total de unidades vendidas:</strong> <?php echo $total; ?></p>
    <p><strong>Produto mais vendido:</strong> <?php echo $produtoMaisVendido; ?> (<?php echo $vendas[$produtoMaisVendido]; ?> unidades)</p>
    <p><strong>Média de vendas por produto:</strong> <?php echo number_format($media, 2, ',', '.'); ?></p>

    <dl class="border border-indigo-800 overflow-hidden rounded-md">
      <dt class="font-semibold bg-indigo-800 text-white p-4">Resumo por produto:</dt>
      <dd class="p-6">
        <ul class="grid grid-cols-2 lg:grid-cols-4 gap-4">
          <?php foreach ($vendas as $produto => $quantidade): ?>
            <li class="p-4 bg-indigo-50 text-center font-semibold">
              <?php echo $produto; ?>: <?php echo $quantidade; ?> unidades
            </li>
          <?php endforeach; ?>
        </ul>
      </dd>
    </dl>
  </div>
</div>

<?php include '../components/footer.php'; ?>