<?php
$vendas = [];

$isResposta = isset($_POST['produto']);

if ($isResposta) {

  $produto = $_POST['produto'];

  foreach ($produto['nome'] as $index => $nome) {
    $quantidade = $produto['quantidade'][$index];
    $vendas[$nome] = $quantidade;
  }
}

$total = array_sum($vendas);
$produtoMaisVendido = array_keys($vendas, max($vendas))[0];
$media = $total / count($vendas);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Exercício 9</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet" />
</head>

<body>
  <div class="container mx-auto" id="app">

    <h1 class="text-3xl font-bold text-center pt-10 mb-4">Controle de Vendas</h1>

    <form method="post">
      <div class="p-6">
        <div class="border-b border-dotted border-slate-400 space-y-4 pb-6 mb-6" v-for="index in items" :key="index">
          <h2 class="text-lg font-bold">Produto {{ index }}</h2>
          <input type="text" name="produto[nome][]" placeholder="Nome do produto" class="border border-slate-400 p-4 w-full text-base rounded" required />
          <input type="number" name="produto[quantidade][]" placeholder="Quantidade" class="border border-slate-400 p-4 w-full text-base rounded" required />
        </div>

        <div class="flex gap-4 border-b-4 border-slate-200 pb-10 mb-6">
          <button type="button"
            class="px-8 rounded flex gap-2 items-center bg-red-600 text-white"
            :class="items === 1 ? 'bg-gray-400 cursor-not-allowed' : 'bg-red-600'"
            @click="removeItem()"
            :disabled="items === 1">
            <i class="ri-delete-bin-fill"></i>
            Remover Produto
          </button>

          <button type="button" class="px-8 rounded flex gap-2 items-center bg-green-600 text-white" @click="addItem()">
            <i class="ri-add-fill"></i>
            Adicionar Produto
          </button>

          <button type="submit" class="bg-indigo-800 text-sm font-bold uppercase text-white p-4 rounded flex-1">Salvar vendas</button>
        </div>
      </div>
    </form>
  </div>

  <?php if ($isResposta): ?>
    <div class="container mx-auto p-10 text-gray-700">
      <div class="bg-white rounded border-2 border-indigo-800 overflow-hidden">
        <h1 class="text-xl font-bold text-white bg-indigo-800 p-6 uppercase">Relatório de Vendas do Mês</h1>

        <div class="space-y-4 p-6">
          <p><strong>Total de unidades vendidas:</strong> <?php echo $total; ?></p>
          <p><strong>Produto mais vendido:</strong> <?php echo $produtoMaisVendido; ?> (<?php echo $vendas[$produtoMaisVendido]; ?> unidades)</p>
          <p><strong>Média de vendas por produto:</strong> <?php echo number_format($media, 2, ',', '.'); ?></p>
        </div>

        <dl>
          <dt class="font-semibold bg-indigo-800 text-white p-6">Resumo por produto:</dt>
          <dd class="p-6">
            <ul class="grid grid-cols-2 lg:grid-cols-4 gap-4">
              <?php foreach ($vendas as $produto => $quantidade): ?>
                <li class="p-4 bg-indigo-50 text-center font-semibold">
                  <?php echo $produto; ?>: <?php echo $quantidade; ?> unidades
                </li>
              <?php endforeach; ?>
            </ul>
          </dd>
        </dl>
      </div>
    </div>
  <?php endif; ?>

  <script type="module">
    import {
      createApp,
      ref
    } from 'https://unpkg.com/vue@3/dist/vue.esm-browser.js'

    createApp({
      setup() {
        const items = ref(1)
        return {
          items
        }
      },

      methods: {
        addItem() {
          this.items += 1;
        },
        removeItem() {
          if (this.items != 1) {
            this.items -= 1;
          }
        }
      }
    }).mount('#app')
  </script>
</body>

</html>