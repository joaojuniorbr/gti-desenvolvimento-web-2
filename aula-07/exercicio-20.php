<?php
require_once('./config.php');

$configuration = [
  'title' => 'Aula 07 - Exercício 20',
  'menu' => $config['menu']
];

include '../components/header.php';
?>

<div class="container mx-auto max-w-md py-10">
  <h1 class="text-2xl font-bold mb-6 text-center">Exercício 20</h1>

  <img src="../assets/images/pixeltrue-web-development-1.svg" class="mx-auto max-w-sm" />

  <h2 class="text-xl font-bold mb-1">include</h2>
  <div class="space-y-2 text-sm mb-8">
    <p>Se o arquivo não for encontrado, o PHP escreve um warning (aviso), mas a aplicação continua executando.</p>

    <p class="italic">Uso ideal: quando o arquivo não é prioridade para a execução da aplicação (ex: conteúdo opcional ou extra).</p>
  </div>

  <h2 class="text-xl font-bold mb-1">require</h2>
  <div class="space-y-2 text-sm">
    <p>Se o arquivo não for encontrado, o PHP interrompe imediatamente a execução da aplicação.</p>
    <p class="italic">Uso ideal: quando o arquivo não pode faltar para o funcionamento da aplicação (ex: configuração, funções importantes, segurança).</p>
  </div>
</div>

<?php include '../components/footer.php'; ?>