<?php
require_once('./config.php');
$configuration = [
  'logo' => 'Aula 05',
  'title' => 'Aula 05 - Exercício 1',
  'menu' => $config['menu']
];

include '../components/header.php';

$acessos = [120, 135, 160, 200, 180, 90, 150];
$dias = ["Domingo", "Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sábado"];

$maior = max($acessos);
$menor = min($acessos);
$media = array_sum($acessos) / count($acessos);

?>
<div class="container mx-auto py-10">

  <h1 class="text-center text-2xl font-bold mb-10">
    Exercício 1
  </h1>

  <div class="bg-white p-8 rounded shadow-lg border border-slate-200 space-y-4">
    <h1 class="text-xl font-bold text-indigo-700">Relatório de Acessos Semanais</h1>

    <p><strong>Maior acesso da semana:</strong> <?php echo $maior ?></p>
    <p><strong>Menor acesso da semana:</strong> <?php echo $menor ?></p>
    <p><strong>Média semanal de acessos:</strong> <?php echo number_format($media, 2) ?></p>

    <dl class="border border-indigo-800 overflow-hidden rounded-md">
      <dt class="font-semibold bg-indigo-800 text-white p-4">Dias com mais de 150 acessos:</dt>
      <dd class="p-6">
        <ul class="grid grid-cols-3 gap-4">
          <?php foreach ($acessos as $i => $valor): ?>
            <?php if ($valor > 150): ?>
              <li class="p-4 bg-indigo-50 text-center font-semibold"><?php echo $dias[$i] ?>: <?php echo $valor ?> acessos</li>
            <?php endif; ?>
          <?php endforeach; ?>
        </ul>
      </dd>
    </dl>
  </div>
</div>

<?php include '../components/footer.php'; ?>