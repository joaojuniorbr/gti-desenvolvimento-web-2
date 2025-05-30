<?php
require_once('./config.php');
$configuration = [
  'logo' => 'Aula 03',
  'title' => 'Aula 03 - Exercício 6',
  'menu' => $config['menu']
];

include '../components/header.php';

$numero = 1;

?>
<div class="container mx-auto py-10 max-w-lg">
  <h1 class="text-center text-2xl font-bold mb-10">
    Exercício 6
  </h1>
  <div class="grid grid-cols-5 md:grid-cols-10 gap-4">
    <?php while ($numero <= 100) : ?>
      <div class="bg-fuchsia-800 text-white py-4 rounded text-center text-xs"><?php echo $numero ?></div>
      <?php $numero++; ?>
    <?php endwhile; ?>
  </div>
</div>

<?php include '../components/footer.php'; ?>