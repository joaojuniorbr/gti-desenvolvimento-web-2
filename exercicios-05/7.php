<?php
$vendas = [
  "Ana Souza" => [7500, 7500, 8200, 7800, 8300, 8900],
  "Camila Silva" => [10600, 11500, 11200, 10800, 10500, 11000],
  "Carlos Rodrigues" => [11200, 9800, 11500, 10500, 12000, 11000],
  "João da Silva" => [12000, 9000, 11000, 13000, 8500, 9800],
  "Laura Oliveira" => [9500, 8000, 7800, 8500, 9400, 9200],
  "Lúcia Costa" => [9200, 8600, 9400, 10000, 9800, 10200],
  "Marcos Almeida" => [8900, 9700, 8500, 9200, 7800, 8200],
  "Maria Santos" => [8500, 11000, 9500, 10500, 11500, 9000],
  "Pedro Oliveira" => [9800, 8800, 10200, 9700, 9000, 10800],
  "Ricardo Santos" => [8000, 8700, 9200, 8900, 9300, 8600]
];

$rankingsMensais = [];
for ($mes = 0; $mes < count($vendas[array_key_first($vendas)]); $mes++) {
  $vendasMes = [];
  foreach ($vendas as $vendedor => $valores) {
    $vendasMes[$vendedor] = $valores[$mes];
  }
  arsort($vendasMes);
  $ranking = 1;
  foreach (array_keys($vendasMes) as $vendedor) {
    $rankingsMensais[$vendedor][] = $ranking++;
  }
}

$mediaRankings = [];
foreach ($rankingsMensais as $vendedor => $ranks) {
  $mediaRankings[$vendedor] = array_sum($ranks) / count($ranks);
}

asort($mediaRankings);
$vencedor = array_key_first($mediaRankings);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>Exercício 7</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800">
  <div class="container mx-auto px-4 py-10">
    <div class="bg-white rounded shadow-md p-8 border space-y-6">
      <h1 class="text-2xl font-bold text-indigo-700">Ranking Final de Vendas - IFPR</h1>
      <p class="text-lg">Vendedor com melhor desempenho médio:
        <strong class="text-sky-800"><?php echo $vencedor ?></strong>
        com média de ranking <strong><?php echo number_format($mediaRankings[$vencedor], 2, ',', '.') ?></strong>
      </p>

      <div class="overflow-x-auto">
        <table class="table-auto w-full text-left border-collapse mt-4">
          <thead class="bg-indigo-700 text-white">
            <tr>
              <th class="p-4">Vendedor</th>
              <th class="p-4">Ranking Médio</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($mediaRankings as $vendedor => $media): ?>
              <tr class="<?php echo $vendedor === $vencedor ? 'bg-sky-200' : 'bg-gray-50'; ?> border-b border-stone-400">
                <td class="p-4 font-medium"><?php echo $vendedor ?></td>
                <td class="p-4"><?php echo number_format($media, 2, ',', '.') ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>

</html>