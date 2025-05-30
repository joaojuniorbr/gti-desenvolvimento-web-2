<?php include './config.php'; ?>

<?php
$configuration = [
  'title' => 'Aula 03',
  'menu' => $config['menu']
];
include '../components/header.php';
?>
<div class="container mx-auto py-10">

  <h1 class="text-center text-2xl font-bold mb-10">Aula 03 - Linguagem PHP: Características Gerais</h1>

  <img src="../assets/images/stuck-at-home-quality-time.png" class="mx-auto h-auto max-w-md mb-10 w-full" />

  <ul class="grid grid-cols-2 md:grid-cols-4 gap-4">
    <?php for ($i = 1; $i < count($config['menu']); $i++): ?>
      <li>
        <a
          href="<?php echo $config['menu'][$i]['url']; ?>"
          class="block bg-white border border-orange-500 text-orange-500 text-center py-4 rounded shadow text-xs hover:bg-orange-500 hover:text-white transition duration-300 ease-in-out">
          <?php echo $config['menu'][$i]['label']; ?>
        </a>
      </li>
    <?php endfor; ?>
  </ul>
</div>
<?php include '../components/footer.php'; ?>