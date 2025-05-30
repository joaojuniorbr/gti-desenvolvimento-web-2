<?php
require_once('./config.php');
$configuration = [
  'logo' => 'Aula 03',
  'title' => 'Aula 03 - Exercício 7',
  'menu' => $config['menu']
];

include '../components/header.php';

?>
<div class="container mx-auto py-10">
  <h1 class="text-center text-2xl font-bold mb-10">
    Exercício 7
  </h1>
  <div class="grid grid-cols-5 md:grid-cols-10 gap-2 md:gap-4">
    <?php for ($i = 1; $i <= 100; $i++): ?>
      <div class="bg-<?php echo ($i % 2 == 0) ? 'purple' : 'indigo'; ?>-700 text-white py-4 px-2 rounded text-center text-xs uppercase text-center">

        <?php echo $i; ?> - <?php echo ($i % 2 == 0) ? 'Par' : 'Ímpar'; ?>

      </div>
    <?php endfor; ?>
  </div>
</div>

<?php include '../components/footer.php'; ?>