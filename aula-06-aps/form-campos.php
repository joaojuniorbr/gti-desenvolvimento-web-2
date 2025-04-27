<form method="get" class="py-10">
  <div class="container mx-auto">
    <div class="bg-white p-6 rounded shadow-lg">
      <div class="grid grid-cols-2 gap-8 mb-4">
        <dl>
          <dt class="font-bold text-stone-800 text-sm uppercase mb-2">Quantos Alunos</dt>
          <dd>
            <input type="number" required class="border border-gray-200 rounded py-2 px-4 w-full text-sm" name="alunos" value="<?php echo $_GET["alunos"] ?? 0; ?>" />
          </dd>
        </dl>

        <dl>
          <dt class="font-bold text-stone-800 text-sm uppercase mb-2">Quantos Avaliações</dt>
          <dd>
            <input type="number" required class="border border-gray-200 rounded py-2 px-4 w-full text-sm" name="avaliacoes" value="<?php echo $_GET["avaliacoes"] ?? 0; ?>" />
          </dd>
        </dl>
      </div>
      <button type="submit" class="py-2 bg-indigo-600 text-white rounded w-full text-sm uppercase font-bold">Gerar Campos</button>
    </div>
  </div>
</form>