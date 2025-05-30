<?php
require_once('./config.php');
$configuration = [
  'logo' => 'Aula 03',
  'title' => 'Aula 03 - Exercício 9',
  'menu' => $config['menu']
];

include '../components/header.php';

?>
<div class="container mx-auto py-10">
  <h1 class="text-center text-2xl font-bold mb-10">
    Exercício 9
  </h1>
  <div class="grid grid-cols-2 gap-2 md:grid-cols-5 md:gap-4">
    <?php for ($i = 1; $i <= 10; $i++): ?>
      <div class="p-4 border border-slate-200 rounded bg-white shadow-sm">
        <h2 class="text-lg font-semibold mb-2">Tabuada do <?php echo $i ?></h2>
        <?php for ($j = 1; $j <= 10; $j++): ?>
          <p><?php echo $i ?> * <?php echo $j ?> = <?php echo $i * $j ?></p>
        <?php endfor; ?>
      </div>
    <?php endfor; ?>
  </div>
</div>
<?php include '../components/footer.php'; ?>