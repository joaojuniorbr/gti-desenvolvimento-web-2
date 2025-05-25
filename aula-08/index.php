<?php

require_once 'config.php';
require_once 'class/Pessoas.php';

$configuration = [
  'title' => 'Aula 08 - Linguagem PHP: Persistência de Dados (MySQL)',
  'logo' => 'Aula 08 - CRUD',
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

$limitPages = $_GET["limit"] ?? 10;

$pessoasList = $pessoas->list($_GET['page'] ?? 1, $limitPages);
$totalPaginas = $pessoasList->pages;
$paginaAtual = $pessoasList->page;

?>
<article class="container mx-auto py-10">
  <h1 class="text-2xl font-bold mb-6 text-center">Aula 08 - Linguagem PHP: Persistência de Dados (MySQL)</h1>

  <?php if ($pessoasList && count($pessoasList->data)): ?>
    <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md text-left">
      <thead>
        <tr class="text-xs font-semibold text-gray-700 border-b border-gray-200">
          <th class="py-2 px-4">ID</th>
          <th class="py-2 px-4">Nome</th>
          <th class="py-2 px-4">Email</th>
          <th class="py-2 px-4">CPF</th>
          <th class="py-2 px-4">Nascimento</th>
          <th class="py-2 px-4">Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($pessoasList->data as $pessoa): ?>
          <tr class="text-sm text-gray-700 border-b border-gray-200 hover:bg-gray-50">
            <td class="py-2 px-4 w-4">
              <span class="text-xs p-1 bg-green-600 text-white rounded truncate"><?php echo htmlspecialchars($pessoa->id); ?></span>
            </td>
            <td class="p-4 font-bold">
              <a href="./editar.php?id=<?php echo $pessoa->id; ?>" class="hover:underline hover:text-indigo-600">
                <?php echo htmlspecialchars($pessoa->nome); ?>
              </a>
            </td>
            <td class="p-4"><?php echo $pessoa->email; ?></td>
            <td class="p-4 text-slate-400"><?php echo $pessoas->maskCpf($pessoa->cpf); ?></td>
            <td class="p-4"><?php echo $pessoas->maskNascimento($pessoa->nascimento); ?></td>
            <td class="p-4">
              <a href="./api/excluir-pessoa.php?id=<?php echo $pessoa->id; ?>" class="text-red-600 hover:underline">Excluir</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

  <?php else: ?>
    <div class="mx-auto max-w-sm">
      <img src="../assets/images/humaaans-friend-meeting.png" class="h-auto max-w-full" />
      <p class="text-center text-gray-600 uppercase font-bold">Nenhum registro encontrado.</p>
    </div>
  <?php endif; ?>


  <?php if ($totalPaginas > 1): ?>
    <div class="flex justify-center mt-6 border-t pt-4 border-slate-200">
      <ul class="inline-flex items-center space-x-2">
        <?php if ($paginaAtual > 1): ?>
          <li>
            <a href="?page=<?php echo $paginaAtual - 1; ?>&limit=<?php echo $limitPages; ?>" class="text-xl w-8 h-8 flex items-center justify-center text-white bg-indigo-600 rounded mr-2">
              <i class="ri-arrow-left-s-line"></i>
            </a>
          </li>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
          <li>
            <a href="?page=<?php echo $i; ?>&limit=<?php echo $limitPages; ?>" class="flex items-center justify-center rounded border leading-tight w-8 h-8 <?php echo ($i == $paginaAtual) ? 'border-indigo-600 text-indigo-600' : 'text-gray-800 border-transparent'; ?>">
              <?php echo $i; ?>
            </a>
          </li>
        <?php endfor; ?>

        <?php if ($paginaAtual < $totalPaginas): ?>
          <li>
            <a href="?page=<?php echo $paginaAtual + 1; ?>&limit=<?php echo $limitPages; ?>" class="text-xl w-8 h-8 flex items-center justify-center text-white bg-indigo-600 rounded ml-2">
              <i class="ri-arrow-right-s-line"></i>
            </a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  <?php endif; ?>

</article>

<?php include '../components/footer.php'; ?>