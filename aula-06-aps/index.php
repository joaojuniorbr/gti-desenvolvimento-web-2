<?php
$configuration = [
  'title' => 'Aula 06 - APS',
  'logo' => 'Controle de Notas'
];
include '../components/header.php';

?>
<div class="container mx-auto">
  <?php

  if (!isset($_GET['nota'])) {
    include 'form-campos.php';
  }

  if (!isset($_GET['nota']) && isset($_GET['alunos']) && isset($_GET['avaliacoes'])) {
    include 'form-avaliacoes.php';
  }

  if (isset($_GET['nota'])) {
    include 'resultado.php';
  }

  ?>
</div>

<?php include '../components/footer.php'; ?>