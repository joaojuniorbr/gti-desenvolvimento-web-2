<?php
require_once('./config.php');
$configuration = [
  'logo' => 'Aula 04',
  'title' => 'Aula 04 - Exercício 7',
  'menu' => $config['menu']
];

include '../components/header.php';

?>
<div class="container mx-auto py-10 max-w-md">
  <h1 class="text-center text-2xl font-bold mb-10">
    Exercício 7
  </h1>

  <form method="POST" class="space-y-4 bg-white p-6 rounded shadow border border-slate-200">
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
    <div class="mt-6 bg-white border border-slate-200 shadow rounded p-6  text-sm font-mono text-gray-700">
      <code>
        <?php echo htmlspecialchars($sql) ?>
      </code>
    </div>
  <?php endif; ?>
</div>

<?php include '../components/footer.php'; ?>