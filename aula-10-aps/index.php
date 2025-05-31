<?php
require_once 'config.php';

$auth = new Authentication();
if (!$auth->isLoggedIn()) {
  header('Location: ./login.php');
  exit;
}

$configuration = [
  'title' => 'Aula 10 - Atividade Prática Supervisionada (APS)',
  'logo' => 'Aula 10 - APS',
];

include '../components/header.php';




$user = $auth->getUser();

?>
<article class="container mx-auto py-10">
  <h1 class="text-2xl font-bold mb-6 text-center">Aula 10 - Atividade Prática Supervisionada (APS)</h1>

  <div class="flex items-center max-w-md mx-auto bg-white border border-gray-200 p-6 rounded shadow-md">
    <img src="https://robohash.org/200.140.230.13.png" class="w-20 h-20 rounded-full border border-gray-300 bg-white" />
    <div class="flex-1 pl-4">
      <h2 class="text-xl font-semibold"><?php echo $user->nome; ?></h2>
      <p class="text-gray-600"><?php echo $user->email; ?></p>
    </div>
  </div>

  <div class="mt-10 text-center">
    <a href="./logout.php" class="text-red-600 uppercase text-xs hover:underline">Sair</a>
  </div>

</article>

<?php include '../components/footer.php'; ?>