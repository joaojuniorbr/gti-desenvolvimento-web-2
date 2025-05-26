<?php
require_once('./config.php');
$configuration = [
  'logo' => 'Aula 04',
  'title' => 'Aula 04 - Exercício 5',
  'menu' => $config['menu']
];

include '../components/header.php';

$style = [
  "label"  => "block text-sm font-bold text-gray-700",
  "input"  => "mt-1 block w-full border border-gray-300 rounded p-2"
];

?>
<div class="container mx-auto py-10 max-w-md">
  <h1 class="text-center text-2xl font-bold mb-10">
    Exercício 5
  </h1>
  <form method="GET" class="space-y-4 bg-white p-8 rounded border border-slate-200">
    <div>
      <label for="bebida" class="<?php echo $style['label']; ?>">Escolha sua bebida:</label>
      <select name="bebida" id="bebida" required class="<?php echo $style['input']; ?>">
        <option value="">Selecione</option>
        <option value="agua">Água - R$ 3,00</option>
        <option value="cha">Chá - R$ 5,00</option>
        <option value="soda">Soda Italiana - R$ 10,00</option>
      </select>
    </div>

    <div>
      <label for="quantidade" class="<?php echo $style['label']; ?>">Quantidade:</label>
      <input type="number" name="quantidade" id="quantidade" min="1" required class="<?php echo $style['input']; ?>" />
    </div>

    <div>
      <label for="pago" class="<?php echo $style['label']; ?>">Valor pago (R$):</label>
      <input type="number" name="pago" id="pago" step="0.01" min="0" required class="<?php echo $style['input']; ?>" />
    </div>

    <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">Calcular</button>
  </form>
  <?php if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['bebida']) && isset($_GET['quantidade']) && isset($_GET['pago'])): ?>

    <?php
    $bebida = $_GET['bebida'] ?? null;
    $quantidade = (int) ($_GET['quantidade'] ?? 0);
    $pago = (float) ($_GET['pago'] ?? 0);

    $precos = [
      'agua' => 3.00,
      'cha' => 5.00,
      'soda' => 10.00,
    ];

    $precoUnitario = $precos[$bebida];
    $total = $precoUnitario * $quantidade;
    $troco = $pago - $total;

    $mensagem = "";

    if ($troco < 0) {
      $mensagem = "Valor insuficiente. Faltam R$ " . number_format(abs($troco), 2, ',', '.');
    } else {
      $mensagem = "Troco: R$ " . number_format($troco, 2, ',', '.');
    }

    $haveTroco = $troco >= 0;

    ?>
    <div class="bg-white border border-slate-200 shadow rounded p-6 mt-10 mt-10">
      <p><strong>Bebida:</strong> <?php echo $bebida; ?></p>
      <p><strong>Quantidade:</strong> <?php echo $quantidade; ?></p>
      <p><strong>Total:</strong> R$ <?php echo number_format($total, 2, ',', '.'); ?></p>
      <p><strong>Valor pago:</strong> R$ <?php echo number_format($pago, 2, ',', '.'); ?></p>
      <p class="mt-4 <?php echo $haveTroco ? 'text-green-600' : 'text-red-600'; ?>"><strong>Mensagem:</strong> <?php echo $mensagem; ?></p>
    </div>
  <?php endif; ?>
</div>
<?php include '../components/footer.php'; ?>