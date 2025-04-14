<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>01</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
  <div class="max-w-md mx-auto py-10 px-6">
    <form action="" method="POST" class="space-y-4 bg-white p-6 rounded shadow border border-slate-200">
      <div>
        <label for="name" class="block text-sm font-bold text-gray-700">Nome:</label>
        <input type="text" id="name" name="name" class="mt-1 block w-full border border-gray-300 rounded p-4 shadow-sm" required>
      </div>
      <div>
        <label for="password" class="block text-sm font-bold text-gray-700">Senha:</label>
        <input type="password" id="password" name="password" class="mt-1 block w-full border border-gray-300 rounded p-4 shadow-sm" required>
      </div>
      <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">Enviar</button>
    </form>   

    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
      <?php
        $name = htmlspecialchars($_POST['name']);
        $password = htmlspecialchars($_POST['password']);
      ?>
      <div class="bg-slate-50 border border-slate-400 rounded p-6 mt-10">
        <p><strong>Nome:</strong> <?php echo $name; ?></p>
        <p><strong>Senha:</strong> <?php echo $password; ?></p>
      </div>
    <?php endif; ?>
  </div>
</body>
</html>