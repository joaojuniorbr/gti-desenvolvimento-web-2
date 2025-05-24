<?php
require_once('./config.php');
$configuration = [
  'logo' => 'Aula 07',
  'title' => 'Aula 07 - Exercício 10',
  'menu' => $config['menu']
];

include '../components/header.php';

function simularLancamentos(int $quantidade)
{
  $ocorrencias = array_fill(1, 6, 0);

  for ($i = 0; $i < $quantidade; $i++) {
    $lancamento = rand(1, 6);
    $ocorrencias[$lancamento]++;
  }

  return $ocorrencias;
}

$ocorrencias = simularLancamentos(100);
?>

<div class="container mx-auto py-10">
  <h1 class="text-center text-2xl font-bold mb-10">Exercício 10</h1>

  <div class="max-w-lg mx-auto space-y-4">
    <h2 class="text-xl font-semibold mb-4">Resultados dos 100 lançamentos:</h2>
    <ul class="grid grid-cols-3 gap-4">
      <?php foreach ($ocorrencias as $face => $quantidade): ?>
        <li class="bg-white px-2 py-6 rounded shadow flex items-center justify-center gap-2">
          <span class="font-bold h-6 w-6 flex items-center justify-center bg-red-600 text-white text-xs rounded-full"><?php echo $face; ?></span>
          <span class="text-sma"><?php echo $quantidade; ?> vezes</span>
        </li>
      <?php endforeach; ?>
    </ul>

    <video class="rounded shadow w-full" autoplay muted loop controlsList="nodownload">
      <source src="../assets/videos/7607436-sd_640_360_25fps.mp4" type="video/mp4" />
      Seu navegador não suporta vídeo HTML5.
    </video>
  </div>

</div>

<?php include '../components/footer.php'; ?>