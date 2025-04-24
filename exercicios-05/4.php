<?php
$chamados = [
  101 => "aberto",
  102 => "concluído",
  103 => "em andamento",
  104 => "aberto"
];

$contagemStatus = [
  "aberto" => 0,
  "em andamento" => 0,
  "concluído" => 0
];

$idsAbertos = [];

foreach ($chamados as $id => $status) {
  if (isset($contagemStatus[$status])) {
    $contagemStatus[$status]++;
  }

  if ($status === "aberto") {
    $idsAbertos[] = $id;
  }
}

$totalChamados = count($chamados);
$porcentagemResolvidos = ($contagemStatus["concluído"] / $totalChamados) * 100;
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Exercício 4</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
  <div class="container mx-auto p-10 text-gray-700">
    <div class="bg-white p-8 rounded shadow-lg border border-slate-200 space-y-4">
      <h1 class="text-xl font-bold text-indigo-700">Relatório de Chamados</h1>

      <p><strong>Total de chamados:</strong> <?php echo $totalChamados; ?></p>
      <p><strong>Porcentagem de chamados resolvidos:</strong> <?php echo number_format($porcentagemResolvidos, 2, ',', '.'); ?>%</p>

      <dl class="border border-indigo-800 overflow-hidden rounded-md">
        <dt class="font-semibold bg-indigo-800 text-white p-4">Status dos chamados:</dt>
        <dd class="p-6">
          <ul class="grid grid-cols-2 lg:grid-cols-3 gap-4">
            <li class="p-4 bg-indigo-50 text-center font-semibold">Abertos: <?php echo $contagemStatus["aberto"]; ?></li>
            <li class="p-4 bg-indigo-50 text-center font-semibold">Em andamento: <?php echo $contagemStatus["em andamento"]; ?></li>
            <li class="p-4 bg-indigo-50 text-center font-semibold">Concluídos: <?php echo $contagemStatus["concluído"]; ?></li>
          </ul>
        </dd>
      </dl>

      <dl class="border border-red-500 overflow-hidden rounded-md">
        <dt class="font-semibold bg-red-500 text-white p-4">IDs dos chamados abertos:</dt>
        <dd class="p-6">
          <ul class="grid grid-cols-2 lg:grid-cols-4 gap-4">
            <?php foreach ($idsAbertos as $id): ?>
              <li class="p-4 bg-red-50 text-center font-semibold">ID: <?php echo $id; ?></li>
            <?php endforeach; ?>
          </ul>
        </dd>
      </dl>
    </div>
  </div>
</body>

</html>