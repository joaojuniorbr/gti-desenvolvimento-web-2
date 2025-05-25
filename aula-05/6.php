<?php
require_once('./config.php');
$configuration = [
  'logo' => 'Aula 05',
  'title' => 'Aula 05 - Exercício 6',
  'menu' => $config['menu']
];

include '../components/header.php';

$plantao = [
  "João" => ["segunda", "quarta"],
  "Ana" => ["terça", "quinta"],
  "Carlos" => ["sexta"]
];

$resultado = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $tipoBusca = $_POST["tipo_busca"];
  $valor = strtolower(trim($_POST["valor"]));

  if ($tipoBusca === "dia") {
    $quemTrabalha = [];

    foreach ($plantao as $nome => $dias) {
      if (in_array($valor, $dias)) {
        $quemTrabalha[] = $nome;
      }
    }

    if ($quemTrabalha) {
      $resultado = "Plantão na <strong>" . ucfirst($valor) . "</strong>: " . implode(", ", $quemTrabalha);
    } else {
      $resultado = "Nenhum funcionário está de plantão na <strong>" . ucfirst($valor) . "</strong>.";
    }
  } elseif ($tipoBusca === "funcionario") {
    $nomeCapitalizado = ucfirst($valor);
    if (array_key_exists($nomeCapitalizado, $plantao)) {
      $dias = implode(", ", array_map('ucfirst', $plantao[$nomeCapitalizado]));
      $resultado = "<strong>$nomeCapitalizado</strong> está de plantão nos dias: $dias";
    } else {
      $resultado = "Funcionário <strong>$nomeCapitalizado</strong> não encontrado.";
    }
  }
}

?>
<div class="container mx-auto py-10">
  <h1 class="text-2xl font-bold text-center mb-10">Exercício 6 - Consulta de Plantão</h1>

  <div class="bg-white p-6 rounded shadow space-y-6">
    <form method="post" class="space-y-4">
      <div>
        <span class="block font-semibold mb-2">Buscar por:</span>
        <label class="inline-flex items-center mr-4">
          <input type="radio" name="tipo_busca" value="dia" class="mr-2">
          Dia da Semana
        </label>
        <label class="inline-flex items-center">
          <input type="radio" name="tipo_busca" value="funcionario" class="mr-2">
          Nome do Funcionário
        </label>
      </div>

      <div>
        <label class="block font-semibold mb-1">Digite o valor:</label>
        <input type="text" name="valor" class="w-full border rounded p-2" required>
      </div>

      <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Buscar</button>
    </form>

    <?php if ($resultado): ?>
      <div class="bg-stone-100 text-stone-800 border border-stone-300 p-4 rounded mt-4">
        <?php echo $resultado; ?>
      </div>
    <?php endif; ?>
  </div>
</div>

<?php include '../components/footer.php'; ?>