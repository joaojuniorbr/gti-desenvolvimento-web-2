<?php
require_once('./config.php');
$configuration = [
  'logo' => 'Aula 07',
  'title' => 'Aula 07 - Exercício 5',
  'menu' => $config['menu']
];

include '../components/header.php';

$faixaSelecionada = "";

function getFaixaSalarial($salario)
{
  if ($salario <= 1000) {
    $faixa = 1;
  } elseif ($salario <= 2000) {
    $faixa = 2;
  } elseif ($salario <= 3000) {
    $faixa = 3;
  } else {
    $faixa = 4;
  }

  return $faixa;
}

function calcularReajuste($salario)
{
  if ($salario <= 1000) {
    return $salario * 1.20;
  } elseif ($salario <= 2000) {
    return $salario * 1.15;
  } elseif ($salario <= 3000) {
    return $salario * 1.10;
  } else {
    return $salario * 1.05;
  }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['salario'])) {
  $salario = (float)$_POST['salario'];
  $faixaSelecionada = getFaixaSalarial($salario);
}
?>

<div class="container mx-auto py-10">
  <h1 class="text-center text-2xl font-bold mb-10">
    Exercício 5
  </h1>

  <form action="" method="POST" class="flex flex-col gap-4 max-w-lg mx-auto">
    <div class="flex flex-col">
      <label for="salario" class="text-sm font-medium text-gray-700 mb-2">Salário Atual do Colaborador:</label>
      <input type="number" name="salario" id="salario" step="0.01" required class="border border-gray-300 rounded p-3" />
    </div>

    <button type="submit" class="p-4 bg-indigo-600 text-white rounded-md w-full">Calcular Novo Salário</button>
  </form>

  <table class="table-auto border-collapse border border-gray-400 w-full max-w-lg mx-auto mt-10 bg-white text-xs">
    <thead class="bg-slate-600 text-white text-left">
      <tr>
        <th class="border border-gray-400 p-4">Faixa Salarial</th>
        <th class="border border-gray-400 p-4">Reajuste</th>
      </tr>
    </thead>
    <tbody>
      <tr class="<?php echo $faixaSelecionada == 1 ? 'bg-indigo-100' : '' ?>">
        <td class="border border-gray-400 p-4">Salário &le; R$ 1.000,00</td>
        <td class="border border-gray-400 p-4">Aumento de 20%</td>
      </tr>
      <tr class="<?php echo $faixaSelecionada == 2 ? 'bg-indigo-100' : '' ?>">
        <td class="border border-gray-400 p-4">R$ 1.000,00 &lt; Salário &le; R$ 2.000,00</td>
        <td class="border border-gray-400 p-4">Aumento de 15%</td>
      </tr>
      <tr class="<?php echo $faixaSelecionada == 3 ? 'bg-indigo-100' : '' ?>">
        <td class="border border-gray-400 p-4">R$ 2.000,00 &lt; Salário &le; R$ 3.000,00</td>
        <td class="border border-gray-400 p-4">Aumento de 10%</td>
      </tr>
      <tr class="<?php echo $faixaSelecionada == 4 ? 'bg-indigo-100' : '' ?>">
        <td class="border border-gray-400 p-4">Salário &gt; R$ 3.000,00</td>
        <td class="border border-gray-400 p-4">Aumento de 5%</td>
      </tr>
    </tbody>
  </table>


  <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['salario'])): ?>
    <?php
    $salario = (float)$_POST['salario'];
    $novoSalario = calcularReajuste($salario);
    ?>
    <div class="bg-slate-50 border border-slate-400 rounded px-10 py-6 mt-10 max-w-lg mx-auto space-y-4">
      <p><strong>Salário original:</strong> R$ <?php echo number_format($salario, 2, ',', '.'); ?></p>
      <p><strong>Salário após reajuste:</strong> R$ <?php echo number_format($novoSalario, 2, ',', '.'); ?></p>
    </div>
  <?php endif; ?>
</div>

<?php include '../components/footer.php'; ?>