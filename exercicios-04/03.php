<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>03</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
  <div class="max-w-md mx-auto py-10 px-6">
    <form action="" method="GET" class="space-y-4 bg-white p-6 rounded shadow border border-slate-200">
      <div>
      <label for="weight" class="block text-sm font-bold text-gray-700">Peso (kg):</label>
      <input type="number" id="weight" name="weight" step="0.1" class="mt-1 block w-full border border-gray-300 rounded p-4 shadow-sm" required>
      </div>
      <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">Calcular</button>
    </form>   

    <?php if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['weight'])): ?>
      <?php
        $weight = htmlspecialchars($_GET['weight']);
        $calculoDeAgua = $weight * 0.035;
      ?>
      <div class="bg-slate-50 border border-slate-400 rounded p-6 mt-10">
        <p><strong>Peso:</strong> <?php echo $weight; ?> kg</p>
        <p><strong>Quantidade ideal de água:</strong> <?php echo number_format($calculoDeAgua, 2); ?> litros por dia</p>
      </div>
    <?php endif; ?>
  </div>
</body>
</html>