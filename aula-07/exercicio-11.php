<?php
require_once('./config.php');
$configuration = [
  'title' => 'Aula 07 - Exercício 11',
  'menu' => $config['menu']
];

include '../components/header.php';

function gerarNumeros($quantidade = 6, $min = 1, $max = 60)
{
  $numeros = [];
  for ($i = 0; count($numeros) < $quantidade; $i++) {
    $num = rand($min, $max);
    if (!in_array($num, $numeros)) {
      $numeros[] = $num;
    }
  }
  sort($numeros);
  return $numeros;
}

function contarAcertos(array $chutados, array $sorteados)
{
  return count(array_intersect($chutados, $sorteados));
}
?>

<div class="container mx-auto py-10">
  <h1 class="text-center text-2xl font-bold mb-10">Exercício 11</h1>

  <form action="" method="POST" class="flex flex-col gap-4 max-w-lg mx-auto">
    <label for="numeros" class="text-sm font-medium text-gray-700">
      Digite 6 números separados por hífens (ex: 5-10-15-20-25-30):
    </label>
    <input
      type="text"
      name="numeros"
      id="numeros"
      required
      class="border border-gray-300 rounded p-3"
      placeholder="Ex: 12-33-5-44-20-17" />
    <button type="submit" class="p-4 bg-indigo-600 text-white rounded-md w-full">Verificar</button>
  </form>

  <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['numeros'])): ?>
    <?php
    $entrada = $_POST['numeros'];
    $chutados = array_map('intval', explode('-', $entrada));
    $sorteados = gerarNumeros();
    $acertos = contarAcertos($chutados, $sorteados);
    ?>
    <div class="bg-slate-100 border border-slate-400 rounded px-10 py-6 mt-10 max-w-lg mx-auto space-y-4">
      <p><strong>Números chutados:</strong> <?php echo implode(', ', $chutados); ?></p>
      <p><strong>Números sorteados:</strong> <?php echo implode(', ', $sorteados); ?></p>
      <p><strong>Quantidade de acertos:</strong> <?php echo $acertos; ?></p>
    </div>
  <?php endif; ?>
</div>

<?php include '../components/footer.php'; ?>