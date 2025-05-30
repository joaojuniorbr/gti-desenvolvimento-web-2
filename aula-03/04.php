<?php
require_once('./config.php');
$configuration = [
  'logo' => 'Aula 03',
  'title' => 'Aula 03 - Exercício 4',
  'menu' => $config['menu']
];

include '../components/header.php';

$a = 4.10;
$b = 3.90;

$style = "text-xl font-bold text-indigo-800 border-indigo-800 border-2 rounded p-4 mb-4 bg-indigo-200";

?>
<div class="container mx-auto py-10 max-w-md">
  <h1 class="text-center text-2xl font-bold mb-10">
    Exercício 4
  </h1>

  <div class="flex items-center justify-center gap-6">

    <p class="<?php echo $style; ?>">
      <?php
      $soma = $a + $b;
      echo (int)$soma;
      ?>
    </p>

    <p class="<?php echo $style; ?>">
      <?php
      $soma = ($a + $b) - 0.1;
      echo number_format($soma, 1)
      ?>
    </p>

    <p class="<?php echo $style; ?>">
      <?php
      $soma = ($a + $b) - 0.9;
      echo number_format($soma, 1)
      ?>
    </p>

    <p class="<?php echo $style; ?>">
      <?php
      $soma = ($a + $b) - 1;
      echo (int)$soma
      ?>
    </p>
  </div>
</div>
<?php include '../components/footer.php'; ?>