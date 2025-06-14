<?php
require_once('./config.php');
$configuration = [
  'logo' => 'Aula 12',
  'title' => 'Aula 12 - Exercício 2',
  'menu' => $config['menu'],
  'hasAlpineJS' => true,
];

include '../components/header.php';

?>

<div class="container mx-auto py-10" x-data="cidadesApp()" x-init="buscarEstados()">
  <h1 class="text-center text-2xl font-bold mb-10">
    Exercício 2
  </h1>

  <div class="flex flex-col md:flex-row justify-center gap-3 mb-10 max-w-md mx-auto w-full ">
    <select x-model="estado" class="border border-gray-300 rounded p-4 w-full" required @change="buscarCidades()">
      <option value="">Selecione um estado</option>
      <template x-for="estadoLoop in estados">
        <option :value="estadoLoop.uf" x-text="estadoLoop.estado"></option>
      </template>
    </select>
    <select x-model="cidade" class="border border-gray-300 rounded p-4 w-full" required>
      <option value="">Selecione uma cidade</option>
      <template x-for="cidadeLoop in cidades">
        <option :value="cidadeLoop.cidade" x-text="cidadeLoop.cidade"></option>
      </template>
    </select>
  </div>

  <template x-if="cidade">
    <div class="flex items-center justify-center gap-2">
      <i class="ri-map-pin-line text-3xl text-slate-400"></i>
      <span x-text="cidade" class="font-bold"></span>
    </div>
  </template>

  <template x-if="isLoading">
    <div class="flex justify-center items-center h-12">
      <div class="animate-spin rounded-full h-20 w-20 border-b-2 border-orange-500"></div>
    </div>
  </template>
</div>

<script>
function cidadesApp() {
  return {
    estados: [],
    cidades: [],
    isLoading: false,
    estado: '',
    cidade: '',

    buscarEstados() {
      this.isLoading = true;

      fetch('/aula-12/api.php')
        .then(response => {
          if (!response.ok) {
            throw new Error('Erro ao buscar estados.');
          }
          return response.json();
        })
        .then(data => {
          this.cidade = '';
          this.estados = data.data;
        })
        .catch(err => {
          console.error(err);
        })
        .finally(() => {
          this.isLoading = false;
        });
    },

    buscarCidades() {
      this.isLoading = true;

      fetch('/aula-12/api.php?estado=' + this.estado)
        .then(response => {
          if (!response.ok) {
            throw new Error('Erro ao buscar cidades.');
          }
          return response.json();
        })
        .then(data => {
          this.cidades = data.data;
        })
        .catch(err => {
          console.error(err);
        })
        .finally(() => {
          this.isLoading = false;
        });
    }
  }
}
</script>

<?php include '../components/footer.php'; ?>
