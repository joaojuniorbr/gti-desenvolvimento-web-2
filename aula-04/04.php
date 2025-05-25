<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>04</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
  <div class="max-w-md mx-auto py-10 px-6">
    <form method="GET" class="space-y-4 bg-white p-6 rounded shadow border border-slate-200">
      <div>
        <label for="valor" class="block text-sm font-bold text-gray-700">Informe o valor (em reais):</label>
        <input type="number" name="valor" id="valor" min="1" class="mt-1 block w-full border border-gray-300 rounded p-4 shadow-sm" required>
      </div>
      <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">Calcular</button>
    </form>

    <?php if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['valor'])): ?>
      <?php
        $valor = $_GET['valor'];

        $cedulas = [100, 50, 20, 10, 5, 2, 1];

        $resultado = [];
        
        foreach ($cedulas as $cedula) {
          $quantidade = (int) ($valor / $cedula);
          if ($quantidade > 0) {
            $resultado[$cedula] = $quantidade;
            $valor %= $cedula;
          }
        }
      ?>

        <div class="bg-slate-50 border border-slate-400 rounded p-6 mt-10">
          <h2 class="text-lg font-bold mb-4">Cédulas necessárias:</h2>
          <ul class="space-y-2">
            <?php foreach ($resultado as $cedula => $quantidade): ?>
              <li><span class="bg-indigo-600 text-white inline-block px-2 py-1 rounded"><?php echo $quantidade ?></span> x R$<?php echo $cedula; ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
    <?php endif; ?>
  </div>
</body>
</html>