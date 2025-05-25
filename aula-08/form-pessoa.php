<div class="bg-white border border-slate-200 p-6 rounded shadow-md max-w-md mx-auto">
  <form x-data="formHandler" @submit.prevent="submitForm" class="space-y-4" x-init="form = window.pessoaData">
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