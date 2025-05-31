<?php
session_start();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $_SESSION['dados'] = [
    'nome' => $_POST['nome'],
    'cpf' => $_POST['cpf'],
    'email' => $_POST['email'],
    'nascimento' => $_POST['nascimento'],
  ];
}

if (!isset($_SESSION['dados'])) {
  header('Location: exercicio-4.php');
  exit;
}

require_once('./config.php');

$configuration = [
  'logo' => 'Aula 09',
  'title' => 'Exercício 4 - Etapa 2',
  'menu' => $config['menu']
];

include '../components/header.php';
?>

<div class="container mx-auto py-10 max-w-md text-center">
  <h1 class="text-2xl font-bold mb-8">Cadastro de Currículo - Etapa 2</h1>
  <form action="exercicio-4-final.php" method="POST" class="space-y-4 text-left bg-white p-6 rounded shadow">
    <p class="font-medium mb-2">Selecione as áreas de conhecimento:</p>
    <label class="flex w-full items-center gap-2"><input type="checkbox" name="areas[]" value="Banco de Dados" />Banco de Dados</label>
    <label class="flex w-full items-center gap-2"><input type="checkbox" name="areas[]" value="Desenvolvimento Web" />Desenvolvimento Web</label>
    <label class="flex w-full items-center gap-2"><input type="checkbox" name="areas[]" value="Desenvolvimento Móvel" />Desenvolvimento Móvel</label>
    <button type="submit" class="w-full bg-indigo-600 text-white py-2 rounded mt-4">Finalizar Cadastro</button>
  </form>
</div>

<?php include '../components/footer.php'; ?>