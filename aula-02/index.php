<?php include './config.php'; ?>

<?php
$configuration = [
  'title' => 'Aula 02',
  'menu' => $config['menu'],
  'menuGrid' => 2
];
include '../components/header.php';
?>
<div class="container mx-auto py-10">

  <h1 class="text-center text-2xl font-bold mb-10">Aula 02 - jQuery</h1>

  <img src="../assets/images/pixeltrue-support-1.svg" class="mx-auto h-auto max-w-sm mb-10 w-full" />

  <div class="max-w-lg mx-auto">
    <?php include '../components/menu.php'; ?>
  </div>
</div>
<?php include '../components/footer.php'; ?>