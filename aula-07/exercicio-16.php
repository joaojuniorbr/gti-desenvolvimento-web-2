<?php
require_once('./config.php');
$configuration = [
  'title' => 'Aula 07 - Exercício 16',
  'menu' => $config['menu']
];

include '../components/header.php';

function validaFormulario()
{
  if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $mensagens = [];

    $usuario = trim($_POST['usuario'] ?? '');
    $senha = $_POST['senha'] ?? '';
    $email = strtolower(trim($_POST['email'] ?? ''));
    $telefone = trim($_POST['telefone'] ?? '');

    if (strlen($usuario) > 45) {
      $mensagens[] = array(
        'label' => "Nome de usuário muito extenso (máximo 45 caracteres).",
        'status' => "error",
      );
    }

    if (preg_match('/\s/', $usuario)) {
      $mensagens[] = array(
        'label' => "O nome de usuário não pode conter espaços (apenas letras e números).",
        'status' => "error",
      );
    }

    if (stripos($senha, $usuario) !== false) {
      $mensagens[] = array(
        'label' => "A senha não pode conter o nome de usuário.",
        'status' => "error",
      );
    }


    $servidorEmail = '';
    if (strpos($email, '@') !== false) {
      $partesEmail = explode('@', $email);
      $servidorEmail = explode('.', $partesEmail[1])[0];
    }

    $telefoneFormatado = preg_replace('/\D/', '', $telefone); // Remove tudo que não for número
    if (strlen($telefoneFormatado) === 11) {
      $telefoneFormatado = '+55' . $telefoneFormatado;
    } else {
      $mensagens[] = array(
        'label' => "Telefone inválido. Deve seguir o formato (99) 99999-9999.",
        'status' => "error",
      );
    }

    return array(
      'mensagens' => $mensagens,
      'usuario' => $usuario,
      'senha' => $senha,
      'email' => $email,
      'telefoneFormatado' => $telefoneFormatado,
      'servidorEmail' => $servidorEmail
    );
  }
}

$dados = validaFormulario();

?>

<div class="container mx-auto py-10">
  <h1 class="text-2xl font-bold mb-6 text-center">Exercício 16</h1>

  <form method="POST" class="max-w-md mx-auto bg-white border border-slate-300 p-6 rounded shadow">
    <label class="text-sm font-medium text-gray-700">Nome de Usuário:</label>
    <input type="text" name="usuario" class="w-full mb-4 border border-gray-300 p-2 rounded" required value="<?php echo $_POST['usuario'] ?? ''; ?>" />

    <label class="text-sm font-medium text-gray-700">Senha:</label>
    <input type="password" name="senha" class="w-full mb-4 border border-gray-300 p-2 rounded" required value="<?php echo $_POST['senha'] ?? ''; ?>" />

    <label class="text-sm font-medium text-gray-700">E-mail:</label>
    <input type="email" name="email" class="w-full mb-4 border border-gray-300 p-2 rounded" required value="<?php echo $_POST['email'] ?? ''; ?>" />

    <label class="text-sm font-medium text-gray-700">Telefone:</label>
    <input type="text" name="telefone" class="w-full border border-gray-300 p-2 rounded" required value="<?php echo $_POST['telefone'] ?? ''; ?>" />
    <span class="text-xs text-slate-400 block mb-10 pt-1 italic">Formato: (99) 99999-9999</span>

    <button type="submit" class="p-4 bg-indigo-600 text-white rounded-md w-full">Validar</button>
  </form>

  <?php if ($_SERVER["REQUEST_METHOD"] === "POST"): ?>
    <div class="max-w-md mx-auto mt-10 p-4 bg-white border border-slate-300 rounded">
      <h2 class="text-xl font-bold mb-4">Resultado:</h2>
      <?php if (!empty($dados['mensagens'])): ?>
        <ul class="space-y-2 text-xs text-red-700">
          <?php foreach ($dados['mensagens'] as $msg): ?>
            <li class="flex items-center gap-1">
              <i class="ri-error-warning-line text-xl"></i>
              <div class="flex-1">
                <?php echo $msg['label']; ?>
              </div>
            </li>
          <?php endforeach; ?>
        </ul>
      <?php else: ?>
        <div class="text-green-600 flex items-center gap-2 text-lg font-semibold mb-2">
          <i class="ri-check-double-line"></i>
          Todos os dados estão válidos!
        </div>
        <div class="space-y-2 text-sm">
          <p><strong>Email em caixa baixa:</strong> <?php echo $dados['email']; ?></p>
          <p><strong>Servidor de email:</strong> <?php echo $dados['servidorEmail']; ?></p>
          <p><strong>Telefone formatado:</strong> <?php echo $dados['telefoneFormatado']; ?></p>
        </div>
      <?php endif; ?>
    </div>
  <?php endif; ?>
</div>

<?php include '../components/footer.php'; ?>