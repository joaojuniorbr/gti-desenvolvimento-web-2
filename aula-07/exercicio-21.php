<?php
include './config.php';

$configuration = [
  'logo' => 'Aula 07',
  'title' => 'Aula 07 - Exercício 21',
  'menu' => $config['menu']
];

include '../components/header.php';

function cardPersonagem($personagem)
{
?>
  <dl class="border overflow-hidden rounded-lg shadow-md">
    <dt class="border-b border-gray-200">
      <img src="../assets/images/dragonball/<?php echo $personagem->imagem; ?>" alt="<?php echo $personagem->nome; ?>" class="w-full" />
    </dt>
    <dd class="p-4 bg-white">
      <div class="text-base font-bold"><?php echo $personagem->nome ?></div>
      <div class="flex items-center my-2">
        <span class="border border-green-500 text-green-500 text-xs px-2 py-1 rounded"><?php echo number_format($personagem->kiAntes, 2); ?></span>
        <span class="text-gray-500 px-2">
          <i class="ri-arrow-right-line"></i>
        </span>
        <span class="bg-green-500 text-white text-xs px-2 py-1 rounded"><?php echo number_format($personagem->kiDepois, 2); ?></span>
      </div>
      <div class="block">
        <span class="bg-orange-500 text-white text-xs px-2 py-1 rounded inline-block"><?php echo number_format($personagem->percentual, 2); ?>%</span>
      </div>
    </dd>
  </dl>
<?php
}

function getResultado()
{
  $personagens = [
    ['nome' => 'Goku',       'imagem' => 'goku.png',       'kiAntes' => 924,  'kiDepois' => 10000],
    ['nome' => 'Kuririn',    'imagem' => 'kuririn.png',    'kiAntes' => 206,  'kiDepois' => 1750],
    ['nome' => 'Piccolo',    'imagem' => 'piccolo.png',    'kiAntes' => 408,  'kiDepois' => 9501],
    ['nome' => 'Gohan',      'imagem' => 'gohan.png',      'kiAntes' => 408,  'kiDepois' => 3500],
    ['nome' => 'Tenshinhan', 'imagem' => 'tenshinhan.png', 'kiAntes' => 250,  'kiDepois' => 1830],
    ['nome' => 'Chaos',      'imagem' => 'chaos.png',      'kiAntes' => 145,  'kiDepois' => 1800],
    ['nome' => 'Yamcha',     'imagem' => 'yamcha.png',     'kiAntes' => 177,  'kiDepois' => 1480],
    ['nome' => 'Yajirobe',   'imagem' => 'yajirobe.png',   'kiAntes' => 4,    'kiDepois' => 4]
  ];

  $somaKiDepois = 0;
  $maiorPercentual = null;

  foreach ($personagens as &$personagem) {
    $personagem['percentual'] = $personagem['kiAntes'] == 0 ? 0 : (($personagem['kiDepois'] - $personagem['kiAntes']) / $personagem['kiAntes']) * 100;
    $somaKiDepois += $personagem['kiDepois'];

    if ($maiorPercentual === null || $personagem['percentual'] > $maiorPercentual) {
      $maiorPercentual = $personagem;
    }
  }

  $personagens = array_map(fn($personagem) => (object) $personagem, $personagens);

  $mediaKi = $somaKiDepois / count($personagens);
  $acimaMedia = (object) array_filter($personagens, fn($personagem) => $personagem->kiDepois > $mediaKi);

  $maisFraco = array_reduce($personagens, function ($menor, $personagem) {
    return $menor === null || $personagem->kiDepois < $menor->kiDepois ? $personagem : $menor;
  });

  return [
    'personagens' => $personagens,
    'maiorPercentual' => (object) $maiorPercentual,
    'mediaKi' => $mediaKi,
    'acimaMedia' => $acimaMedia,
    'maisFraco' => $maisFraco
  ];
}

$resultado = getResultado();
?>

<div class="container mx-auto py-10">
  <h1 class="text-2xl font-bold mb-6 text-center">Exercício 21</h1>

  <img src="../assets/images/logo-dbz.png" alt="Dragon Ball Z" class="mx-auto max-w-xs mb-6" />

  <div class="max-w-3xl mx-auto mb-6">
    <table class="w-full text-left border border-gray-300 mb-6 text-sm bg-white">
      <thead>
        <tr class="bg-gray-200">
          <th class="px-4 py-4">Guerreiro Z</th>
          <th class="px-4 py-2">ki (antes)</th>
          <th class="px-4 py-2">ki (depois)</th>
          <th class="px-4 py-2">% aumento</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($resultado['personagens'] as $personagem): ?>
          <tr class="border-t border-gray-300">
            <td class="p-4">
              <div class="flex items-center gap-2">
                <img src="../assets/images/dragonball/<?php echo $personagem->imagem; ?>" alt="<?php echo $personagem->nome; ?>" class="w-20 border border-gray-300 rounded" />
                <span class="font-bold"><?php echo $personagem->nome; ?></span>
              </div>
            </td>
            <td class="px-4 py-2"><?php echo $personagem->kiAntes; ?></td>
            <td class="px-4 py-2"><?php echo $personagem->kiDepois; ?></td>
            <td class="px-4 py-2"><?php echo number_format($personagem->percentual, 2); ?>%</td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <hr class="border-gray-300 border-dotted my-10" />

  <div class="max-w-3xl mx-auto">
    <h2 class="text-xl font-bold mb-6">Dados</h2>

    <h3 class="text-lg font-bold mb-6 flex items-center gap-2 pb-4 border-b border-gray-300 border-dashed">
      <span class="bg-green-500 text-white flex items-center justify-center w-12 h-12 rounded-full">
        <i class="ri-trophy-line text-2xl"></i>
      </span>
      Guerreiro com Maior Percentual de aumento de KI
    </h3>

    <div class="grid grid-cols-2 md:grid-cols-3 gap-8">
      <?php cardPersonagem($resultado['maiorPercentual']); ?>
    </div>

    <div class="py-20">
      <h3 class="text-lg font-bold mb-6 flex items-center gap-2 pb-4 border-b border-gray-300 border-dashed">
        <span class="bg-blue-500 text-white flex items-center justify-center w-12 h-12 rounded-full">
          <i class="ri-arrow-up-line text-2xl"></i>
        </span>
        Os lutadores com ki (depois do treinamento) acima da média de ki
      </h3>

      <div class="grid grid-cols-2 md:grid-cols-3 gap-8">
        <?php
        foreach ($resultado['acimaMedia'] as $personagem) {
          cardPersonagem($personagem);
        }
        ?>
      </div>
    </div>

    <h3 class="text-lg font-bold mb-6 flex items-center gap-2 pb-4 border-b border-gray-300 border-dashed">
      <span class="bg-red-500 text-white flex items-center justify-center w-12 h-12 rounded-full">
        <i class="ri-arrow-down-line text-2xl"></i>
      </span>
      Guerreiro mais fracote
    </h3>

    <div class="grid grid-cols-2 md:grid-cols-3 gap-8">
      <?php cardPersonagem($resultado['maisFraco']); ?>
    </div>
  </div>



</div>

<?php include '../components/footer.php'; ?>