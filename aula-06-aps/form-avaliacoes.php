<?php
$campoAlunos = $_GET['alunos'] ?? 0;
$campoAvaliacoes = $_GET['avaliacoes'] ?? 0;
?>

<div class="container mx-auto">
  <div class="bg-white shadow-md rounded-lg overflow-hidden">
    <h2 class="text-sm font-bold bg-stone-600 text-white py-4 px-6">Notas Cadastradas</h2>
    <form class="p-6" method="get">
      <table class="min-w-full bg-white border border-gray-300 text-left">
        <thead>
          <tr>
            <th class="text-xs py-2 px-4 border-b border-r">Nome</th>
            <?php for ($avaliacao = 1; $avaliacao <= $campoAvaliacoes; $avaliacao++): ?>
              <th class="text-xs py-2 px-4 border-b border-r">Nota <?php echo $avaliacao; ?></th>
            <?php endfor; ?>
            <th class="text-xs border-b"></th>
          </tr>
        </thead>
        <tbody>
          <?php for ($aluno = 1; $aluno <= $campoAlunos; $aluno++): ?>
            <tr>
              <td class="py-2 px-4 border-b text-sm border-r whitespace-nowrap">
                <input type="text" name="aluno[aluno_<?php echo $aluno; ?>]" class="border rounded w-full p-2" placeholder="Nome do Aluno <?php echo $aluno; ?>" required />
              </td>
              <?php for ($avaliacao = 1; $avaliacao <= $campoAvaliacoes; $avaliacao++): ?>
                <td class="py-2 px-4 border-b border-r">
                  <input type="number" name="nota[aluno_<?php echo $aluno; ?>][<?php echo $avaliacao; ?>]" class="border rounded w-full p-2" min="0" max="10" required />
                </td>
              <?php endfor; ?>
              <td class="py-2 px-4 border-b w-10">
                <button class="bg-red-500 text-white py-1 px-3 rounded text-xs remove" type="button">Remover</button>
              </td>
            </tr>
          <?php endfor; ?>
        </tbody>
      </table>

      <div class="text-center mt-8">
        <button type="submit" class="bg-indigo-500 text-white py-2 px-4 rounded text-sm font-bold uppercase">Ver Resultados</button>
      </div>
    </form>
  </div>
</div>

<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('.remove').click(function() {
      $(this).closest('tr').remove();
    });
  });
</script>