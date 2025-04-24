<?php
$cursos = [
  "PHP" => 25,
  "Python" => 30,
  "Redes" => 20
];

$totalAlunos = array_sum($cursos);
$cursoMaisAlunos = array_keys($cursos, max($cursos))[0];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Exercício 5</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
  <div class="container mx-auto p-10 text-gray-800">
    <h1 class="text-3xl font-bold text-center mb-10">Dashboard de Cursos</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
      <div class="bg-white p-6 rounded shadow-md text-center">
        <h2 class="text-lg font-semibold">Total de alunos</h2>
        <p class="text-xl mt-2">
          Alunos matriculados
          <span class="bg-indigo-600 text-white text-sm px-3 py-1 rounded-full ml-2">
            <?php echo $totalAlunos; ?> alunos
          </span>
        </p>
      </div>

      <div class="bg-white p-6 rounded shadow-md text-center">
        <h2 class="text-lg font-semibold">Curso com mais alunos</h2>
        <p class="text-xl mt-2">
          <?php echo $cursoMaisAlunos; ?>
          <span class="bg-indigo-600 text-white text-sm px-3 py-1 rounded-full ml-2">
            <?php echo $cursos[$cursoMaisAlunos]; ?> alunos
          </span>
        </p>
      </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
      <?php foreach ($cursos as $curso => $qtd):
        $percentual = ($qtd / $totalAlunos) * 100;
      ?>
        <div class="bg-white p-6 rounded shadow-md">
          <h3 class="text-xl font-semibold"><?php echo $curso; ?></h3>
          <p class="mb-4 text-sm"><?php echo $qtd; ?> alunos (<?php echo round($percentual); ?>%)</p>
          <div class="w-full bg-slate-200 rounded-full h-8">
            <div class="bg-indigo-600 h-full text-white text-xs font-semibold flex items-center rounded-l-full" style="width: <?php echo round($percentual); ?>%">
              <span class="px-6"><?php echo round($percentual); ?>%</span>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</body>

</html>