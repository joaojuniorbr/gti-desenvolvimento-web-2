<?php
session_start();
require_once('./config.php');

$configuration = [
  'logo' => 'Aula 09',
  'title' => 'Exercício 4 - Etapa 1',
  'menu' => $config['menu'],
  'hasAlpineJS' => true,
];

include '../components/header.php';
?>

<div class="container mx-auto py-10 max-w-md">
  <h1 class="text-2xl font-bold mb-6 text-center">Exercício 4 - Etapa 1</h1>
  <form action="./exercicio-4-cadastro.php" method="POST" class="space-y-6 text-left bg-white p-6 rounded shadow">
    <label class="block text-sm font-bold">
      Nome:
      <input type="text" name="nome" required class="w-full px-4 py-2 border rounded mt-1" />
    </label>
    <label class="block text-sm font-bold" x-data="cpfMask()">
      CPF:
      <input type="text" name="cpf" required class="w-full px-4 py-2 border rounded mt-1" maxlength="14" placeholder="000.000.000-00" x-model="cpf" @input="formatCPF" />
    </label>
    <label class="block text-sm font-bold">
      Email:
      <input type="email" name="email" required class="w-full px-4 py-2 border rounded mt-1" />
    </label>
    <label class="block text-sm font-bold">
      Nascimento:
      <input type="date" name="nascimento" required class="w-full px-4 py-2 border rounded mt-1" />
    </label>
    <button type="submit" class="w-full bg-indigo-600 text-white py-2 rounded">Próxima Etapa</button>
  </form>
</div>

<script>
  function cpfMask() {
    return {
      cpf: '',
      formatCPF() {
        this.cpf = this.cpf
          .replace(/\D/g, '')
          .replace(/(\d{3})(\d)/, '$1.$2')
          .replace(/(\d{3})(\d)/, '$1.$2')
          .replace(/(\d{3})(\d{1,2})$/, '$1-$2');
      }
    }
  }
</script>

<?php include '../components/footer.php'; ?>