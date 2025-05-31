<?php
$configuration = [
  'title' => 'GTI - IFPR Campus Pinhais',
  'logo' => 'GTI - IFPR Campus Pinhais'
];
include './components/header.php';

$menu = array(
  array('label' => 'Aula 02', 'url' => './aula-02/index.php'),
  array('label' => 'Aula 03', 'url' => './aula-03/index.php'),
  array('label' => 'Aula 04', 'url' => './aula-04/index.php'),
  array('label' => 'Aula 05', 'url' => './aula-05/index.php'),
  array('label' => 'Aula 06', 'url' => './aula-06-aps/index.php'),
  array('label' => 'Aula 07', 'url' => './aula-07/index.php'),
  array('label' => 'Aula 08', 'url' => './aula-08/index.php'),
  array('label' => 'Aula 09', 'url' => './aula-09/index.php'),
  array('label' => 'Aula 10', 'url' => './aula-10-aps/index.php'),
);
?>
<div class="container mx-auto py-10">

  <img src="./assets/images/pixeltrue-web-development-1.svg" class="mx-auto h-auto max-w-sm mb-10 w-full" />

  <h1 class="text-lg md:text-3xl font-bold text-center mb-4">Bem-vindo à Página de Exercícios de Desenvolvimento Web II (GTI)</h1>

  <article class="text-gray-600 space-y-2 text-center text-sm mb-10">
    <p>Esta página reúne os exercícios práticos da disciplina <em>Desenvolvimento Web II</em>, ministrada pelo Prof. Tieppo, conforme o <a href="https://sites.google.com/site/proftieppo/disciplinas/desenv-web-ii-gti" target="_blank" class="underline">programa disponível no site da disciplina</a>. Aqui, você encontrará uma coleção de atividades desenvolvidas para consolidar conceitos essenciais como HTML, CSS, JavaScript, frameworks front-end e integração com back-end. </p>

    <p>Todos os códigos-fonte estão organizados no <a href="https://github.com/joaojuniorbr/gti-desenvolvimento-web-2" target="_blank" class="underline">repositório GitHub</a>, onde você pode explorar as implementações.</p>
  </article>

  <ul class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
    <?php for ($i = 0; $i < count($menu); $i++): ?>
      <li>
        <a
          href="<?php echo $menu[$i]['url']; ?>"
          class="flex items-center justify-between gap-2 bg-white border border-orange-500 text-orange-500 py-2 px-6 rounded-full shadow text-xs hover:bg-orange-500 hover:text-white transition duration-300 ease-in-out">
          <span><?php echo $menu[$i]['label']; ?></span>
          <i class="ri-arrow-right-s-line text-2xl -mr-2"></i>
        </a>
      </li>
    <?php endfor; ?>
  </ul>
</div>
<?php include './components/footer.php'; ?>