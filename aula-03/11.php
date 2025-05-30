<?php


require_once('./config.php');
$configuration = [
  'logo' => 'Aula 03',
  'title' => 'Aula 03 - Exercício 11',
  'menu' => $config['menu']
];

include '../components/header.php';

$pulgas = 2;
$dias = 0;
$antipulgas = 1;
?>
<div class="container mx-auto py-10">
  <h1 class="text-center text-2xl font-bold mb-10">
    Exercício 11
  </h1>

  <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <?php while ($pulgas > 0) : ?>
      <?php
      $dias++;

      $dias++;

      $pulgas += floor($pulgas / 2) * 6;

      if ($dias % 3 == 0) {
        $pulgas -= 2;
      }

      $pulgas -= $antipulgas;
      $antipulgas *= 4;

      if ($pulgas < 0) {
        $pulgas = 0;
      }
      ?>
      <div class="rounded p-4 text-xs text-white bg-stone-500 font-bold">Dia <?php echo $dias; ?>: Restam <?php echo $pulgas; ?> pulgas</div>
    <?php endwhile; ?>
  </div>

  <div class="font-bold py-6 px-4 bg-green-600 text-white mt-10 text-center rounded">PHP estará livre das pulgas em <?php echo $dias; ?> dias!</div>

  <img src="../assets/images/stuck-at-home-working-from-home.png" class="mx-auto h-auto max-w-sm w-full" />
</div>
<?php include '../components/footer.php'; ?>