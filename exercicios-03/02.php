<?php

$primeiro_nome = "Joao";
$sobrenome = "Junior";
$departamento = "TI";

$email = "{$primeiro_nome}.{$sobrenome}@ifpr.edu.br";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Exercícios - 02</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen">
  <p class="text-2xl font-bold text-slate-600 lowercase"><?php echo $email; ?></p>
</body>
</html>