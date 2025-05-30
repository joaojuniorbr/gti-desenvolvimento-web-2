<?php
require_once('./config.php');
$configuration = [
  'logo' => 'Aula 03',
  'title' => 'Aula 03 - Exercício 8',
  'menu' => $config['menu']
];

include '../components/header.php';

?>
<div class="container mx-auto py-10">
  <h1 class="text-center text-2xl font-bold mb-10">
    Exercício 8
  </h1>
  <table class="table-auto border-collapse mx-auto mt-10">
    <thead>
      <tr>
        <th class="border border-slate-200 px-4 py-2 bg-slate-800 text-white">x</th>
        <th class="border border-slate-200 px-4 py-2 bg-slate-800 text-white">x²</th>
      </tr>
    </thead>
    <tbody>
      <?php for ($x = 1; $x <= 30; $x++): ?>
        <tr>
          <td class="border border-slate-200 bg-white px-4 py-2 font-bold"><?php echo $x; ?></td>
          <td class="border border-slate-200 bg-white px-4 py-2"><?php echo $x * $x; ?></td>
        </tr>
      <?php endfor; ?>
    </tbody>
  </table>
</div>
<?php include '../components/footer.php'; ?>