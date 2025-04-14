<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Exercícios</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
  <div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6 text-center">Lista de Exercícios</h1>
    <ul class="grid grid-cols-4 gap-4">
      <?php for($i = 1; $i <= 11; $i++): ?>
        <li>
          <a href="./<?php echo ($i < 10) ? "0".$i : $i; ?>.php" class="block p-4 bg-blue-500 text-white rounded-lg shadow hover:bg-blue-600">
            Exercício <?php echo $i; ?>
          </a>
        </li>
      <?php endfor; ?>
    </ul>
  </div>
</body>
</html>