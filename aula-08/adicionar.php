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

  <div class="bg-white border border-slate-200 p-6 rounded shadow-md max-w-md mx-auto">
    <form x-data="formHandler" @submit.prevent="submitForm" class="space-y-4">
      <label for="nome" class="block">
        <span class="block mb-1 font-semibold text-gray-700 text-sm">Nome:</span>
        <input x-model="form.nome" type="text" name="nome" id="nome" class="w-full border border-gray-300 p-2 rounded" required />
      </label>

      <label for="email" class="block">
        <span class="block mb-1 font-semibold text-gray-700 text-sm">Email:</span>
        <input x-model="form.email" type="email" name="email" id="email" class="w-full border border-gray-300 p-2 rounded" required />
      </label>

      <label for="senha" class="block" x-data="{ show: false }">
        <span class="block mb-1 font-semibold text-gray-700 text-sm">Senha:</span>
        <div class="relative">
          <input x-model="form.senha" :type="show ? 'text' : 'password'" name="senha" id="senha" class="w-full border border-gray-300 p-2 rounded pr-10" required />
          <button type="button" @click="show = !show" class="absolute right-2 top-1/2 transform -translate-y-1/2 text-gray-500">
            <i x-show="show" class="ri-eye-line"></i>
            <i x-show="!show" class="ri-eye-off-line"></i>
          </button>
        </div>
      </label>

      <label for="cpf" class="block">
        <span class="block mb-1 font-semibold text-gray-700 text-sm">CPF:</span>
        <input type="text" name="cpf" id="cpf" class="w-full border border-gray-300 p-2 rounded" required x-model="form.cpf" @input="formatCPF" maxlength="14" placeholder="000.000.000-00" />
      </label>

      <label for="nascimento" class="block">
        <span class="block mb-1 font-semibold text-gray-700 text-sm">Data de Nascimento:</span>
        <input x-model="form.nascimento" type="date" name="nascimento" id="nascimento" class="w-full border border-gray-300 p-2 rounded" required />
      </label>

      <button type="submit" class="p-4 bg-indigo-600 text-white rounded-md w-full">Salvar Dados</button>

    </form>
  </div>

</article>

<script>
  document.addEventListener('alpine:init', () => {
    Alpine.data('formHandler', () => ({
      form: {
        nome: '',
        email: '',
        senha: '',
        cpf: '',
        nascimento: ''
      },
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