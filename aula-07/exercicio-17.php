<?php
require_once('./config.php');
$configuration = [
  'title' => 'Aula 07 - Exercício 17',
  'menu' => $config['menu']
];

include '../components/header.php';


function codificarTenisPolar($mensagem)
{
  $mapa = [
    't' => 'p',
    'e' => 'o',
    'n' => 'l',
    'i' => 'a',
    's' => 'r',
    'p' => 't',
    'o' => 'e',
    'l' => 'n',
    'a' => 'i',
    'r' => 's',
    'T' => 'P',
    'E' => 'O',
    'N' => 'L',
    'I' => 'A',
    'S' => 'R',
    'P' => 'T',
    'O' => 'E',
    'L' => 'N',
    'A' => 'I',
    'R' => 'S'
  ];

  return strtr($mensagem, $mapa);
}

function getResultado()
{
  if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $mensagem = trim($_POST["mensagem"] ?? '');
    return array(
      'original' => $mensagem,
      'codificado' => codificarTenisPolar($mensagem)
    );
  }
}

$resultado = getResultado();
?>

<div class="container mx-auto py-10">
  <h1 class="text-2xl font-bold mb-6 text-center">Exercício 17</h1>

  <form method="POST" class="max-w-md mx-auto">
    <label for="mensagem" class="block mb-2 font-semibold">Digite a palavra ou frase:</label>
    <input type="text" name="mensagem" id="mensagem" class="w-full border border-gray-300 p-2 rounded mb-4" required>

    <button type="submit" class="p-4 bg-indigo-600 text-white rounded-md w-full">Codificar</button>
  </form>

  <?php if ($resultado): ?>
    <div class="max-w-md mx-auto mt-6 p-4 bg-white border border-gray-400 rounded space-y-4">
      <div class="text-sm text-slate-600 flex items-center gap-2">
        Original:
        <span class="py-1 px-4 bg-slate-800 text-white rounded">
          <?php echo htmlspecialchars($resultado['original']); ?>
        </span>
      </div>
      <div class="text-sm text-slate-600 flex items-center gap-2">
        Codificado:
        <span class="py-1 px-4 bg-green-800 text-white rounded">
          <?php echo htmlspecialchars($resultado['codificado']); ?>
        </span>
      </div>
    </div>
  <?php endif; ?>
</div>

<?php include '../components/footer.php'; ?>