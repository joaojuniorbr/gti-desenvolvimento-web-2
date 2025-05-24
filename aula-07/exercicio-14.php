<?php
require_once('./config.php');
$configuration = [
  'title' => 'Aula 07 - Exercício 14',
  'menu' => $config['menu']
];

include '../components/header.php';

$arquivoLog = './log.txt';

$log = date('d/m/Y - H:i:s') . ' - ' . $_SERVER['HTTP_USER_AGENT'];

file_put_contents($arquivoLog, $log . PHP_EOL, FILE_APPEND);

$logCompleto = file_exists($arquivoLog) ? file($arquivoLog) : [];

$acessos = count($logCompleto);
?>

<div class="container mx-auto py-10">
  <h1 class="text-center text-2xl font-bold mb-10">Exercício 14</h1>

  <div class="bg-slate-100 border border-slate-300 rounded p-6 max-w-md mx-auto bg-white shadow-md">
    <h2 class="text-lg font-semibold mb-4">Acessos registrados:</h2>
    <p class="text-sm text-slate-600">Total de acessos: <strong><?php echo $acessos; ?></strong></p>

    <img src="../assets/images/pixeltrue-support-1.svg" class="max-w-sm mx-auto mb-4" />

    <?php if ($acessos >= 4): ?>
      <ul>
        <?php foreach ($logCompleto as $linha): ?>
          <li class="flex items-center gap-2 text-xs text-slate-600 border-t border-slate-300 border-dotted p-2">
            <i class="ri-time-line text-green-600 text-lg"></i>
            <?php echo htmlspecialchars(trim($linha)) ?>
          </li>
        <?php endforeach; ?>
      </ul>
    <?php else: ?>
      <p class="text-sm text-orange-600 text-center">
        <i class="ri-error-warning-line text-orange-600"></i>
        Ainda não há acessos registrados suficientes.
      </p>
    <?php endif; ?>
  </div>
</div>

<?php include '../components/footer.php'; ?>