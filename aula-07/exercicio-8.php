<?php
require_once('./config.php');
$configuration = [
  'title' => 'Aula 07 - Exercício 8',
  'menu' => $config['menu']
];

include '../components/header.php';

$imagens = [
  'pixeltrue-chatting-using-phone.svg',
  'pixeltrue-healthy-eating-1.svg',
  'pixeltrue-idea-1.svg',
  'pixeltrue-man-sitting-in-bed-and-reading-a-book-1.svg',
  'pixeltrue-newsletter-1.svg',
  'pixeltrue-plan-1.svg',
];
$indice = rand(0, count($imagens) - 1);
$caminhoImagem = "../assets/images/" . $imagens[$indice];

?>

<div class="container mx-auto py-10 text-center">
  <h1 class="text-2xl font-bold mb-10">Exercício 8</h1>

  <p class="mb-6">Imagem sorteada dinamicamente:</p>

  <div class="max-w-lg mx-auto">
    <img src="<?php echo $caminhoImagem; ?>" class="max-w-full h-auto" />
  </div>
</div>

<?php include '../components/footer.php'; ?>