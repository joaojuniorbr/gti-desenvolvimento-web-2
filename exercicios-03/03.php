<?php

$tecnicoA = "notebook";
$tecnicoB = "tablet";

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Exercício 03</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen">
 <div class="mx-auto max-w-md py-10 w-full">
  <div class="border border-red-600 bg-red-50 p-8 rounded mb-10">
    <h1 class="text-sm font-bold uppercase">Antes da Troca</h1>
    <p>Técnico A: <?php echo $tecnicoA; ?></p>
    <p>Técnico B: <?php echo $tecnicoB; ?></p>
  </div>
    
  <?php
    $temp = $tecnicoA;
    $tecnicoA = $tecnicoB;
    $tecnicoB = $temp;
  ?>

  <div class="border border-green-600 bg-green-50 p-8 rounded mt-10">
    <h1 class="text-sm font-bold uppercase">Resultado Final</h1>
    <p>Técnico A: <?php echo $tecnicoA; ?></p>
    <p>Técnico B: <?php echo $tecnicoB; ?></p>
  </div>
 </div>
</body>
</html>