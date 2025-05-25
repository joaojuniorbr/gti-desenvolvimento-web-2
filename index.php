<?php
$configuration = [
  'title' => 'GTI - IFPR Campus Pinhais',
  'logo' => 'GTI - IFPR Campus Pinhais'
];
include './components/header.php';

$menu = array(
  array('label' => 'Aula 02', 'url' => './exercicios-02/index.php'),
  array('label' => 'Aula 03', 'url' => './exercicios-03/index.php'),
  array('label' => 'Aula 04', 'url' => './exercicios-04/index.php'),
  array('label' => 'Aula 05', 'url' => './aula-05/index.php'),
  array('label' => 'Aula 06', 'url' => './aula-06-aps/index.php'),
  array('label' => 'Aula 07', 'url' => './aula-07/index.php'),
  array('label' => 'Aula 08', 'url' => './aula-08/index.php'),
);
?>
<div class="container mx-auto py-10">

  <img src="./assets/images/pixeltrue-web-development-1.svg" class="mx-auto h-auto max-w-lg mb-10" />

  <ul class="grid grid-cols-2 md:grid-cols-5 gap-4">
    <?php for ($i = 0; $i < count($menu); $i++): ?>
      <li>
        <a
          href="<?php echo $menu[$i]['url']; ?>"
          class="flex items-center gap-2 bg-white border border-orange-500 text-orange-500 text-center py-2 px-4 rounded shadow text-xs hover:bg-orange-500 hover:text-white transition duration-300 ease-in-out">
          <i class="ri-arrow-right-s-line text-2xl"></i>
          <span><?php echo $menu[$i]['label']; ?></span>
        </a>
      </li>
    <?php endfor; ?>
  </ul>
</div>
<?php include './components/footer.php'; ?>