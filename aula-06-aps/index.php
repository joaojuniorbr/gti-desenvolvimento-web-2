<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Aula 06 - APS</title>

  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet" />

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet" />

  <style>
    * {
      font-family: 'Raleway', sans-serif;
    }
  </style>
</head>

<body class="bg-gray-100">
  <main class="flex w-full flex-col min-h-screen">
    <header class="bg-stone-600 text-white py-6">
      <div class="container mx-auto">
        <h1 class="text-2xl font-bold">Controle de Notas</h1>
      </div>
    </header>

    <div class="relative flex-1">
      <?php

      if (!isset($_GET['nota'])) {
        include 'form-campos.php';
      }

      if (!isset($_GET['nota']) && isset($_GET['alunos']) && isset($_GET['avaliacoes'])) {
        include 'form-avaliacoes.php';
      }

      if (isset($_GET['nota'])) {
        include 'resultado.php';
      }

      ?>
    </div>

    <footer class="bg-stone-600 text-white py-6 mt-10">
      <div class="container mx-auto text-center">
        <p>João Luiz Vicente Junior &copy; 2025 Controle de Notas.</p>
      </div>
    </footer>
  </main>

</body>

</html>