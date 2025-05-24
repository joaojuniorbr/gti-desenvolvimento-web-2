<?php
require_once('./config.php');
$configuration = [
  'logo' => 'Aula 07',
  'title' => 'Aula 07 - Exercício 18',
  'menu' => $config['menu']
];

include '../components/header.php';

function direcaoFinalRecruta($inicial, $comandoStr)
{
  $direcoes = ['Norte', 'Leste', 'Sul', 'Oeste'];
  $index = array_search($inicial, $direcoes);

  $comandos = str_split(strtoupper($comandoStr));

  foreach ($comandos as $comando) {
    if ($comando === 'D') {
      $index = ($index + 1) % 4;
    } elseif ($comando === 'E') {
      $index = ($index - 1 + 4) % 4;
    }
  }

  return $direcoes[$index];
}

function getResultado()
{
  if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $inicial = $_POST["direcao_inicial"] ?? 'Norte';
    $comandos = trim($_POST["comandos"] ?? '');
    return [
      'inicial' => $inicial,
      'comandos' => $comandos,
      'final' => direcaoFinalRecruta($inicial, $comandos)
    ];
  }
}

$resultado = getResultado();
?>

<div class="container mx-auto py-10">
  <h1 class="text-2xl font-bold mb-6 text-center">Exercício 18</h1>

  <video class="rounded shadow w-full max-w-md mx-auto mb-4" autoplay muted loop controlsList="nodownload">
    <source src="../assets/videos/9466269-sd_640_360_25fps.mp4" type="video/mp4">
    Seu navegador não suporta o elemento de vídeo.
  </video>

  <form method="POST" class="max-w-md mx-auto space-y-6 border border-gray-300 p-6 rounded bg-white">
    <div>
      <p class="block font-semibold mb-2">Direção Inicial:</p>
      <div class="flex flex-wrap gap-4">
        <?php
        $direcoes = ['Norte', 'Leste', 'Sul', 'Oeste'];
        foreach ($direcoes as $direcao):
        ?>
          <label class="flex items-center gap-2">
            <input type="radio" name="direcao_inicial" value="<?php echo $direcao; ?>" required>
            <?php echo $direcao; ?>
          </label>
        <?php endforeach; ?>
      </div>
    </div>

    <div>
      <label for="comandos" class="block font-semibold mb-2">Comandos (ex: DDEED):</label>
      <input
        type="text"
        name="comandos"
        id="comandos"
        class="w-full border border-gray-300 p-2 rounded"
        placeholder="Digite a sequência de comandos (D e E)"
        pattern="[DEde]*"
        required>
      <p class="text-sm text-gray-500 mt-1">Use apenas letras D e E (maiúsculas ou minúsculas).</p>
    </div>

    <button type="submit" class="p-4 bg-indigo-600 text-white rounded-md w-full">Calcular Direção Final</button>
  </form>

  <?php if ($resultado): ?>
    <div class="max-w-md mx-auto mt-6 p-4 bg-white border border-gray-400 rounded space-y-4">
      <div class="text-sm text-slate-600 flex items-center gap-2">
        Direção Inicial:
        <span class="py-1 px-4 bg-slate-800 text-white rounded">
          <?php echo htmlspecialchars($resultado['inicial']); ?>
        </span>
      </div>
      <div class="text-sm text-slate-600 flex items-center gap-2">
        Comandos:
        <span class="py-1 px-4 bg-blue-800 text-white rounded">
          <?php echo htmlspecialchars(strtoupper($resultado['comandos'])); ?>
        </span>
      </div>
      <div class="text-sm text-slate-600 flex items-center gap-2">
        Direção Final:
        <span class="py-1 px-4 bg-green-800 text-white rounded">
          <?php echo $resultado['final']; ?>
        </span>
      </div>
    </div>
  <?php endif; ?>
</div>

<?php include '../components/footer.php'; ?>