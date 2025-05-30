<?php
require_once('./config.php');
$configuration = [
  'logo' => 'Aula 03',
  'title' => 'Aula 03 - Exercício 2',
  'menu' => $config['menu']
];

include '../components/header.php';

$primeiro_nome = "Joao";
$sobrenome = "Junior";
$departamento = "TI";

$email = "{$primeiro_nome}.{$sobrenome}@ifpr.edu.br";

?>
<div class="container mx-auto py-10 max-w-md text-center">
  <h1 class="text-center text-2xl font-bold mb-4">
    Exercício 2
  </h1>
  <p class="text-2xl font-bold text-slate-600 lowercase"><?php echo $email; ?></p>
</div>
<?php include '../components/footer.php'; ?>