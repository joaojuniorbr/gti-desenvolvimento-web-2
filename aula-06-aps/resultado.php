<?php
$notas = $_GET['nota'];
$alunos = count($notas);
$avaliacoes = count($notas[array_key_first($notas)]);
?>

<section class="container mx-auto mt-10">
  <div class="bg-white rounded shadow p-6">
    <h2 class="text-lg font-bold">Relatório de Notas</h2>
    <p class="text-sm text-slate-400 font-light mb-6">Data do relatório: <?php echo date('d/m/Y'); ?></p>

    <table class="min-w-full bg-white border border-gray-300 text-left mb-10">
      <thead>
        <tr>
          <th class="text-xs py-2 px-4 border-b border-r">Nome</th>
          <?php for ($avaliacao = 1; $avaliacao <= $avaliacoes; $avaliacao++): ?>
            <th class="text-xs py-2 px-4 border-b border-r">Nota <?php echo $avaliacao; ?></th>
          <?php endfor; ?>
          <th class="text-xs py-2 px-4 border-b border-r">Média</th>
          <th class="text-xs py-2 px-4 border-b border-r">Resultado</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($notas as $aluno => $avaliacoes): ?>
          <?php $media = number_format(array_sum($avaliacoes) / count($avaliacoes), 2); ?>
          <tr>
            <td class="py-2 px-4 border-b text-sm border-r whitespace-nowrap"><?php echo $_GET['aluno'][$aluno]; ?></td>
            <?php foreach ($avaliacoes as $nota): ?>
              <td class="py-2 px-4 border-b border-r">
                <?php echo $nota; ?>
              </td>
            <?php endforeach; ?>
            <td class="py-2 px-4 border-b border-r">
              <?php echo $media; ?>
            </td>
            <td class="py-2 px-4 border-b border-r">
              <div class="text-xs p-4 rounded font-bold <?php echo ($media >= 7) ? 'bg-green-50 text-green-600' : 'bg-red-50 text-red-600'; ?>">
                <?php echo ($media >= 7) ? 'Aprovado' : 'Reprovado'; ?>
              </div>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

    <div class="flex justify-center">
      <a href="./aula-06-aps" class="border-2 border-indigo-500 text-indigo-500 py-3 px-8 rounded uppercase text-sm font-bold">Voltar ao Inicio</a>
    </div>
  </div>
</section>