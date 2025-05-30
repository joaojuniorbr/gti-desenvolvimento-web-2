<?php
require_once('./config.php');
$configuration = [
  'logo' => 'Aula 03',
  'title' => 'Aula 03 - Exercício 1',
  'menu' => $config['menu']
];

include '../components/header.php';

?>
<div class="container mx-auto py-10 max-w-md text-center">
  <h1 class="text-center text-2xl font-bold mb-4">
    Exercício 1
  </h1>
  <h2 class="text-3xl text-slate-600"><?php echo "Olá, Mundo!"; ?></h2>
</div>
<?php include '../components/footer.php'; ?>