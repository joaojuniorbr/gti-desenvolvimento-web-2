<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Exercícios 05</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
  <main class="h-screen bg-slate-100 p-10 text-slate-800">
    <div class="container mx-auto">
      <img src="./pixeltrue.svg" alt="Exercícios 05" class="mx-auto w-full md:w-1/3" />

      <h1 class="text-center text-2xl font-bold mb-10">Exercícios 05</h1>

      <ul class="grid grid-cols-2 md:grid-cols-3 gap-4">
        <?php for ($i = 1; $i <= 9; $i++): ?>
          <li>
            <a href="./<?php echo $i; ?>.php" class="block bg-slate-700 text-white hover:bg-slate-600 text-center py-4 rounded shadow">
              Exercício <?php echo $i; ?>
            </a>
          </li>
        <?php endfor; ?>
      </ul>
    </div>
  </main>
</body>

</html>