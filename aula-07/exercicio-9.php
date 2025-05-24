<?php
require_once('./config.php');
$configuration = [
  'title' => 'Aula 07 - Exercício 9',
  'menu' => $config['menu']
];

include '../components/header.php';

function getMensagem()
{

  $hora = (int)date('H');
  if ($hora < 12) {
    $mensagem = '☀️ Bom dia!';
    $video = '4281782-sd_240_426_25fps.mp4';
  } elseif ($hora < 18) {
    $mensagem = '🌤️ Boa tarde!';
    $video = '4830364-sd_226_426_25fps.mp4';
  } else {
    $mensagem = '🌙 Boa noite!';
    $video = '3226454-sd_240_426_25fps.mp4';
  }
  return array(
    'mensagem' => $mensagem,
    'video' => '../assets/videos/' . $video
  );
}

$resultado = getMensagem();

?>

<div class="container mx-auto py-10 text-center">
  <h1 class="text-2xl font-bold mb-10">Exercício 9</h1>

  <div class="max-w-xs w-full relative mx-auto">
    <p class="bg-white/25 text-black text-xl uppercase font-semibold w-full p-4 absolute top-1/2 left-0 transform -translate-y-1/2 z-10"><?php echo $resultado['mensagem']; ?></p>

    <video class="rounded shadow max-w-xs w-full" autoplay muted loop controlsList="nodownload">
      <source src="<?php echo $resultado['video']; ?>" type="video/mp4">
      Seu navegador não suporta vídeo HTML5.
    </video>
  </div>
</div>

<?php include '../components/footer.php'; ?>