<?php
$tarefas = [
  "Revisar contratos" => "pendente",
  "Enviar relatórios" => "concluída",
  "Atualizar planilhas" => "pendente",
  "Backup do sistema" => "concluída",
  "Responder e-mails" => "pendente"
];

$tarefasPendentes = [];
$quantidadeConcluidas = 0;

foreach ($tarefas as $descricao => $status) {
  if ($status === "pendente") {
    $tarefasPendentes[] = $descricao;
  } elseif ($status === "concluída") {
    $quantidadeConcluidas++;
  }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Exercício 3</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet" />

</head>

<body>
  <div class="container mx-auto p-10 text-gray-700">
    <div class="bg-white p-8 rounded shadow-lg border border-slate-200">
      <h1 class="text-xl font-bold text-indigo-700 mb-8">Relatório de Tarefas</h1>
      <h2 class="text-lg font-semibold text-indigo-600 text-red-600">Tarefas Pendentes:</h2>
      <ul class="space-y-1 mt-2 mb-10">
        <?php foreach ($tarefasPendentes as $tarefa): ?>
          <li>
            <i class="ri-close-circle-fill text-red-600"></i>
            <?php echo $tarefa; ?>
          </li>
        <?php endforeach; ?>
      </ul>
      <div class="text-lg font-semibold text-red-800 bg-red-50 p-4 rounded border border-red-800">
        Quantidade de tarefas concluídas:<?php echo $quantidadeConcluidas; ?>
      </div>
    </div>
  </div>
</body>

</html>