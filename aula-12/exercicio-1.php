<?php
require_once('./config.php');
$configuration = [
  'logo' => 'Aula 12',
  'title' => 'Aula 12 - Exercício 1',
  'menu' => $config['menu'],
  'hasAlpineJS' => true,
];

include '../components/header.php';

define('OPENWEATHER_API_KEY', '4aba702e93efe06daf7c8e2373453709');
?>

<div class="container mx-auto py-10" x-data="weatherApp()">
  <h1 class="text-center text-2xl font-bold mb-10">
    Exercício 1
  </h1>


  <form @submit.prevent="buscarTempo" class="flex justify-center gap-3 mb-10 max-w-sm mx-auto w-full">
    <select x-model="cidade" class="border border-gray-300 rounded p-4 w-full" required>
      <option value="" disabled>Escolha uma cidade</option>
      <option value="Pinhais,BR">Pinhais</option>
      <option value="Curitiba,BR">Curitiba</option>
      <option value="São Paulo,BR">São Paulo</option>
      <option value="Rio de Janeiro,BR">Rio de Janeiro</option>
      <option value="Belo Horizonte,BR">Belo Horizonte</option>
    </select>
    <button type="submit" class="px-6 py-4 bg-indigo-600 text-white rounded" :disabled="isLoading">Buscar</button>
  </form>

  <template x-if="isLoading">
    <div class="flex justify-center items-center h-12">
      <div class="animate-spin rounded-full h-20 w-20 border-b-2 border-orange-500"></div>
    </div>
  </template>

  <template x-if="tempo">
    <div class="bg-white rounded-lg shadow-md p-6 max-w-sm mx-auto text-center space-y-3">
      <h2 class="text-xl font-semibold" x-text="tempo.name"></h2>
      <img :src="`https://openweathermap.org/img/wn/${tempo.weather[0].icon}@2x.png`" class="mx-auto" />
      <p class="text-lg font-bold" x-text="`${tempo.main.temp.toFixed(1)}°C — ${tempo.weather[0].description}`"></p>
      <p>Sensação térmica: <span x-text="tempo.main.feels_like.toFixed(1) + '°C'"></span></p>
      <p>Umidade: <span x-text="tempo.main.humidity + '%'"></span></p>
      <p>Vento: <span x-text="(tempo.wind.speed * 3.6).toFixed(1) + ' km/h'"></span></p>
      <p>Pressão: <span x-text="tempo.main.pressure + ' hPa'"></span></p>
      <p>Nascer do sol: <span x-text="formatarHora(tempo.sys.sunrise)"></span></p>
      <p>Pôr do sol: <span x-text="formatarHora(tempo.sys.sunset)"></span></p>
    </div>
  </template>

  <template x-if="erro">
    <p class="text-red-600 text-center mt-5" x-text="erro"></p>
  </template>
</div>

<script>
function weatherApp() {
  return {
    cidade: '',
    tempo: null,
    erro: '',
    isLoading: false,

    buscarTempo() {
      this.erro = '';
      this.tempo = null;
      this.isLoading = true;

      if (!this.cidade) {
        this.erro = 'Por favor, selecione uma cidade.';
        this.isLoading = false;
        return;
      }

      const apiKey = '<?php echo OPENWEATHER_API_KEY; ?>';
      const url = `https://api.openweathermap.org/data/2.5/weather?q=${this.cidade}&appid=${apiKey}&units=metric&lang=pt_br`;

      fetch(url)
        .then(response => {
          if (!response.ok) {
            throw new Error('Erro ao buscar dados do tempo.');
          }
          return response.json();
        })
        .then(data => {
          this.tempo = data;
        })
        .catch(err => {
          this.erro = err.message;
        })
        .finally(() => {
          this.isLoading = false;
        });
    },

    formatarHora(timestamp) {
      if (!timestamp) return '';
      const date = new Date(timestamp * 1000);
      return date.toLocaleTimeString('pt-BR', { hour: '2-digit', minute: '2-digit', second: '2-digit' });
    }
  }
}
</script>

<?php include '../components/footer.php'; ?>
