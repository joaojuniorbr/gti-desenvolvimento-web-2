<?php

require_once('./config.php');
$configuration = [
  'logo' => 'Aula 05',
  'title' => 'Aula 05 - Exercício 9',
  'menu' => $config['menu'],
  'hasBootstrap' => true,
];

include '../components/header.php';

$campos = [
  "name" => "Nome",
  "email" => "Email",
  "aval_geral" => "Avaliação Geral",
  "aval_filiais" => "Avaliação Filiais",
  "aval_problema" => "Avaliação Problemas",
  "comentario" => "Comentário"
];

$validacao = [];

$isResposta = $_SERVER["REQUEST_METHOD"] == "POST";

if ($isResposta) {
  foreach (array_keys($campos) as $campo) {
    if (!isset($_POST[$campo]) || empty($_POST[$campo])) {
      $validacao[$campo] = "Campo não preenchidos";
    }
  }
}

?>

<div class="container mx-auto py-10">

  <h1 class="text-center text-2xl font-bold mb-4">
    Exercício 8 - Feedback do cliente
  </h1>

  <?php if ($isResposta): ?>
    <div class="mb-10">
      <?php if (empty($validacao)): ?>
        <?php foreach ($campos as $key => $value): ?>
          <div class="py-2 px-4 bg-green-50 rounded border !border-green-600 text-success my-2">
            <i class="ri-check-double-fill text-green-600"></i>

            Campo <?php echo $value; ?>:
            <strong>
              <?php if (is_array($_POST[$key])): ?>
                <?php echo implode(", ", $_POST[$key]); ?>
              <?php else: ?>
                <?php echo $_POST[$key]; ?>
              <?php endif; ?>
            </strong>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <?php foreach (array_keys($validacao) as $campo) : ?>
          <div class="py-2 px-4 bg-red-50 rounded border !border-red-600 text-danger my-2">
            <i class="ri-close-circle-fill text-red-600"></i>

            Campo <?php echo $campos[$campo]; ?>, <?php echo $validacao[$campo]; ?>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  <?php endif; ?>

  <div class="bg-white p-8 rounded shadow-lg border border-slate-200">
    <form class="form-horizontal" method="post">
      <div class="form-group mb-2">
        <label class="control-label col-sm-2" for="name">Nome:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="name" placeholder="Seu nome" name="name" value="<?php echo $isResposta ? $_POST["name"] : "" ?>" />
        </div>
      </div>
      <div class="form-group mb-4">
        <label class="control-label col-sm-2" for="email">Email:</label>
        <div class="col-sm-10">
          <input type="email" class="form-control" id="email" placeholder="Seu email" name="email" value="<?php echo $isResposta ? $_POST["email"] : "" ?>" />
        </div>
      </div>

      <p>Qual avaliação geral você possui sobre a nossa empresa?</p>

      <div class="form-check">
        <input type="radio" class="form-check-input" id="aval_geral_radio5" name="aval_geral" value="5">
        <label class="form-check-label" for="aval_geral_radio5">Excelente</label>
      </div>
      <div class="form-check">
        <input type="radio" class="form-check-input" id="aval_geral_radio4" name="aval_geral" value="4">
        <label class="form-check-label" for="aval_geral_radio4">Ótima</label>
      </div>
      <div class="form-check">
        <input type="radio" class="form-check-input" id="aval_geral_radio3" name="aval_geral" value="3">
        <label class="form-check-label" for="aval_geral_radio3">Neutra</label>
      </div>
      <div class="form-check">
        <input type="radio" class="form-check-input" id="aval_geral_radio2" name="aval_geral" value="2">
        <label class="form-check-label" for="aval_geral_radio2">Ruim</label>
      </div>
      <div class="form-check">
        <input type="radio" class="form-check-input" id="aval_geral_radio1" name="aval_geral" value="1">
        <label class="form-check-label" for="aval_geral_radio1">Péssima</label>
      </div>

      <p class="mt-4">Qual de nossas filiais é alvo do seu feedback?</p>

      <select name="aval_filiais" class="form-select">
        <option value="Todas as Filiais">Todas as filiais</option>
        <option value="Curitiba">Curitiba</option>
        <option value="São José dos Pinhais">São José dos Pinhais</option>
      </select>


      <p class="mt-4">Qual(is) tipo(s) de problema(s) você encontrou durante nosso contato?</p>

      <div class="form-check">
        <input type="checkbox" class="form-check-input" id="aval_geral_checkbox1" name="aval_problema[]" value="Anúncios e/ou ofertas">
        <label class="form-check-label" for="aval_geral_checkbox1">Anúncios e/ou ofertas</label>
      </div>
      <div class="form-check">
        <input type="checkbox" class="form-check-input" id="aval_geral_checkbox2" name="aval_problema[]" value="Preços">
        <label class="form-check-label" for="aval_geral_checkbox2">Preços</label>
      </div>
      <div class="form-check">
        <input type="checkbox" class="form-check-input" id="aval_geral_checkbox3" name="aval_problema[]" value="Entrega e/ou frete">
        <label class="form-check-label" for="aval_geral_checkbox3">Entrega e/ou frete</label>
      </div>
      <div class="form-check">
        <input type="checkbox" class="form-check-input" id="aval_geral_checkbox4" name="aval_problema[]" value="Produtos">
        <label class="form-check-label" for="aval_geral_checkbox4">Produtos</label>
      </div>
      <div class="form-check">
        <input type="checkbox" class="form-check-input" id="aval_geral_checkbox5" name="aval_problema[]" value="Atendimento e/ou suporte">
        <label class="form-check-label" for="aval_geral_checkbox5">Atendimento e/ou suporte</label>
      </div>


      <div class="form-group mt-4 mb-8">
        <label for="comentario">Você possui alguma informação que pode nos ajudar a adiantar a resolução do problema?</label>
        <textarea class="form-control" rows="5" id="comentario" name="comentario"></textarea>
      </div>

      <button class="btn btn-secondary" type="submit">
        Enviar
      </button>

    </form>
  </div>
</div>

<?php include('../components/footer.php'); ?>