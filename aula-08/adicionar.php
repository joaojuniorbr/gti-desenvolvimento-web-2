<?php

require_once 'config.php';
require_once 'class/Pessoas.php';

$configuration = [
  'title' => 'Aula 08 - Adicionar Pessoa',
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

?>
<article class="container mx-auto py-10">
  <h1 class="text-2xl font-bold mb-6 text-center">Aula 08 - Adicionar Pessoa</h1>

  <?php include './form-pessoa.php'; ?>

</article>

<script>
  window.pessoaData = {
    nome: '',
    email: '',
    senha: '',
    cpf: '',
    nascimento: ''
  };

  document.addEventListener('alpine:init', () => {
    Alpine.data('formHandler', () => ({
      form: null,
      async submitForm() {
        try {
          const response = await fetch('./api/salvar-pessoa.php', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json'
            },
            body: JSON.stringify(this.form)
          });

          const result = await response.json();

          if (response.ok) {
            alert('Pessoa adicionada com sucesso!');
            this.form = {
              nome: '',
              email: '',
              senha: '',
              cpf: '',
              nascimento: ''
            };
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