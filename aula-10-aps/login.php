<?php
require_once 'config.php';

$configuration = [
  'title' => 'Aula 10 - Atividade Prática Supervisionada (APS)',
  'logo' => 'Aula 10',
];

include '../components/header.php';

if (isset($_SESSION[$SESSION_KEY])) {
  header('Location: ./index.php');
  exit;
}

?>
<article class="container mx-auto py-10">
  <h1 class="text-2xl font-bold mb-2 text-center">Aula 10 - Atividade Prática Supervisionada (APS)</h1>
  <p class="text-center text-sm text-gray-600 mb-4">Para continuar você precisa estar autenticado.</p>

  <?php if (isset($_GET['error'])): ?>
    <div class="text-red-500 text-sm mb-8 text-center flex items-center justify-center gap-2">
      <i class="ri-error-warning-line text-3xl"></i>
      Email ou senha inválidos
    </div>
  <?php endif; ?>

  <form action="valida.php" class="<?php echo $mainStyles->form->container; ?> space-y-4 flex flex-col" method="POST">
    <label>
      <span for="email" class="<?php echo $mainStyles->form->label; ?>">Email</span>
      <input type="email" name="email" required class="<?php echo $mainStyles->form->input; ?>" placeholder="Digite seu email">
    </label>

    <label>
      <span for="senha" class="<?php echo $mainStyles->form->label; ?>">Senha</span>
      <input type="password" id="senha" name="senha" required class="<?php echo $mainStyles->form->input; ?>" placeholder="Digite sua senha">
    </label>

    <button type="submit" class="<?php echo $mainStyles->form->button; ?>">
      Entrar
    </button>
  </form>
</article>

<?php include '../components/footer.php'; ?>