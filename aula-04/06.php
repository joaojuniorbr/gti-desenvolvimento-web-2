<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>06</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

  <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
    <form method="POST" class="space-y-4">
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Digite o número de selos:</label>
        <input type="number" name="selos" required class="w-full px-3 py-2 border border-gray-300 rounded" />
      </div>

      <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600 transition">
        Verificar
      </button>
    </form>

    <?php if (isset($_POST['selos'])): ?>
      <?php
        $selos = (int)$_POST['selos'];
        $resposta = 'Não';

        for ($i = 2; $i < $selos; $i++) {
            if ($selos % $i === 0 && ($selos / $i) > 1) {
                $resposta = 'Sim';
                break;
            }
        }

        $classe = $resposta === 'Sim' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700';
      ?>
      <div class="mt-6 p-4 text-center rounded <?= $classe ?>">
        <strong>Resultado:</strong> <?= $resposta ?>
      </div>
    <?php endif; ?>

  </div>

</body>
</html>
