<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>07</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

  <div class="bg-white p-8 rounded shadow-md w-full max-w-lg">
    <h1 class="text-2xl font-bold text-center mb-6">Cadastro de Usuário</h1>

    <form method="POST" class="space-y-4">
      <div>
        <label class="block text-sm font-medium text-gray-700">Nome:</label>
        <input type="text" name="nome" required class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700">E-mail:</label>
        <input type="email" name="email" required class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700">Senha:</label>
        <input type="password" name="senha" required class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700">Data de Nascimento:</label>
        <input type="date" name="nascimento" required class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
      </div>

      <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600 transition">
        Cadastrar
      </button>
    </form>

    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
      <?php
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $nascimento = $_POST['nascimento'];

        $sql = "INSERT INTO usuarios (nome, email, senha, nascimento) VALUES ('$nome', '$email', '$senha', '$nascimento');";
      ?>
      <div class="mt-6 bg-gray-100 p-4 rounded border border-gray-300 text-sm font-mono text-gray-700">
        <code>
          <?php echo htmlspecialchars($sql) ?>
        </code>
      </div>
    <?php endif; ?>
  </div>

</body>
</html>
