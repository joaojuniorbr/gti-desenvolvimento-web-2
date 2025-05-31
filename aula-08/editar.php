<?php

require_once 'config.php';

$configuration = [
  'title' => 'Aula 08 - Editar Pessoa',
  'logo' => 'Aula 08 - CRUD',
  'hasAlpineJS' => true,
  'menu' => array(
    array(
      'label' => 'Inicio',
      'url' => './index.php'
    ),
    array(
      'label' => 'Adicionar',
      'url' => './adicionar.php'
    )
  ),
];

include '../components/header.php';

$pessoas = new Pessoas($mysqli);
$pessoa = null;

if (isset($_GET['id'])) {
  $pessoa = $pessoas->findById($_GET['id']);
}

?>

<article class="container mx-auto py-10">
  <h1 class="text-2xl font-bold mb-6 text-center">Aula 08 - Editar Pessoa</h1>

  <?php if ($pessoa): ?>
    <?php include './form-pessoa.php'; ?>
  <?php else: ?>
    <div class="mx-auto max-w-sm">
      <img src="../assets/images/pixeltrue-newsletter-1.svg" class="h-auto max-w-full" />
      <h2 class="text-lg mb-6 text-center">Pessoa não encontrada</h2>
      <a href="./index.php" class="flex justify-center border border-indigo-600 text-indigo-600 p-2 uppercase rounded">Voltar</a>
    </div>
  <?php endif; ?>
</article>

<script>
  window.pessoaData = <?php echo json_encode($pessoa); ?>;

  document.addEventListener('alpine:init', () => {
    Alpine.data('formHandler', () => ({
      form: null,
      async submitForm() {
        try {
          const response = await fetch('./api/atualiza-pessoa.php', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json'
            },
            body: JSON.stringify(this.form)
          });

          const result = await response.json();

          if (response.ok) {
            alert('Pessoa atualizada com sucesso!');
          } else {
            alert('Erro: ' + result.message);
          }
        } catch (error) {
          console.error(error);
          alert('Erro ao enviar o formulário');
        }
      },

      formatCPF() {
        let digits = this.form.cpf.replace(/\D/g, '');

        if (digits.length > 11) digits = digits.slice(0, 11);

        digits = digits.replace(/(\d{3})(\d)/, '$1.$2');
        digits = digits.replace(/(\d{3})(\d)/, '$1.$2');
        digits = digits.replace(/(\d{3})(\d{1,2})$/, '$1-$2');

        this.form.cpf = digits;
      }
    }));
  });
</script>

<?php include '../components/footer.php'; ?>