<?php
require_once('./config.php');
$configuration = [
  'logo' => 'Aula 05',
  'title' => 'Aula 05 - Exercício 5',
  'menu' => $config['menu']
];

include '../components/header.php';

$cursos = [
  "PHP" => 25,
  "Python" => 30,
  "Redes" => 20
];

$totalAlunos = array_sum($cursos);
$cursoMaisAlunos = array_keys($cursos, max($cursos))[0];

?>
<div class="container mx-auto py-10">
  <h1 class="text-center text-2xl font-bold mb-10">Exercício 5 - Dashboard de Cursos</h1>

  <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
    <div class="bg-white p-6 rounded shadow-md text-center">
      <h2 class="text-lg font-semibold">Total de alunos</h2>
      <p class="text-xl mt-2">
        <span class="block md:inline">Alunos matriculados</span>
        <span class="bg-indigo-600 text-white text-sm px-3 py-1 rounded-full ml-2">
          <?php echo $totalAlunos; ?> alunos
        </span>
      </p>
    </div>

    <div class="bg-white p-6 rounded shadow-md text-center">
      <h2 class="text-lg font-semibold">Curso com mais alunos</h2>
      <p class="text-xl mt-2">
        <span class="block md:inline"><?php echo $cursoMaisAlunos; ?></span>
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

<?php include '../components/footer.php'; ?>