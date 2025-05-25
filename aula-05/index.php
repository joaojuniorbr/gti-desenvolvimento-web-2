<?php include './config.php'; ?>

<?php
$configuration = [
  'title' => 'Aula 05',
  'menu' => $config['menu']
];
include '../components/header.php';
?>
<div class="container mx-auto py-10">

  <h1 class="text-center text-2xl font-bold">Aula 05 - Linguagem PHP: Arrays</h1>

  <img src="../assets/images/pixeltrue-chatting-using-phone.svg" class="mx-auto h-auto max-w-sm mb-10" />

  <ul class="grid grid-cols-2 md:grid-cols-3 gap-4">
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