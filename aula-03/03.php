<?php

require_once('./config.php');
$configuration = [
  'logo' => 'Aula 03',
  'title' => 'Aula 03 - Exercício 3',
  'menu' => $config['menu']
];

include '../components/header.php';

$tecnicoA = "notebook";
$tecnicoB = "tablet";

?>
<div class="container mx-auto py-10 max-w-md">
  <h1 class="text-center text-2xl font-bold mb-8">
    Exercício 3
  </h1>

  <div class="border border-red-600 bg-red-50 p-8 rounded mb-6">
    <h1 class="text-sm font-bold uppercase">Antes da Troca</h1>
    <p>Técnico A: <?php echo $tecnicoA; ?></p>
    <p>Técnico B: <?php echo $tecnicoB; ?></p>
  </div>

  <?php
  $temp = $tecnicoA;
  $tecnicoA = $tecnicoB;
  $tecnicoB = $temp;
  ?>

  <div class="border border-green-600 bg-green-50 p-8 rounded">
    <h1 class="text-sm font-bold uppercase">Resultado Final</h1>
    <p>Técnico A: <?php echo $tecnicoA; ?></p>
    <p>Técnico B: <?php echo $tecnicoB; ?></p>
  </div>
</div>
<?php include '../components/footer.php'; ?>