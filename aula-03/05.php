<?php
require_once('./config.php');
$configuration = [
  'logo' => 'Aula 03',
  'title' => 'Aula 03 - Exercício 5',
  'menu' => $config['menu']
];

include '../components/header.php';

?>
<div class="container mx-auto py-10 max-w-md">
  <h1 class="text-center text-2xl font-bold mb-10">
    Exercício 5
  </h1>
  <form method="POST" class="mx-auto max-w-md w-full bg-white rounded border border-slate-200 p-6">
    <label for="numero" class="block font-bold text-xs uppercase">Digite um número:</label>
    <input type="number" id="numero" name="numero" required class="border border-gray-300 rounded p-2 block w-full mb-4 mt-2" />
    <button type="submit" class="bg-indigo-600 text-white rounded py-3 px-8 w-full">Verificar</button>

    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') : ?>
      <?php
      $numero = $_POST['numero'];
      ?>
      <div class="border border-indigo-800 rouded bg-indigo-50 p-8 mt-10 rounded">
        <h1 class="text-sm font-bold uppercase">Resultado</h1>
        <p class="text-sm">O número <?php echo $numero; ?> é <?php echo ($numero % 2 == 0) ? 'par' : 'ímpar'; ?>.</p>
        <p class="text-sm">Você pode tentar novamente!</p>
      </div>
    <?php endif; ?>

  </form>
</div>
<?php include '../components/footer.php'; ?>