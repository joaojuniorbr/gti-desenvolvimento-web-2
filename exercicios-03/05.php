<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Exercício 05</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex  items-center justify-center min-h-screen">
  <form method="POST" class="mx-auto max-w-md w-full bg-white rounded border border-slate-200 p-6">
    <label for="numero" class="block font-bold text-xs uppercase">Digite um número:</label>
    <input type="number" id="numero" name="numero" required class="border border-gray-300 rounded p-2 block w-full mb-4 mt-2" />
    <button type="submit" class="bg-indigo-600 text-white rounded py-3 px-8">Verificar</button>

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

  
</body>
</html>