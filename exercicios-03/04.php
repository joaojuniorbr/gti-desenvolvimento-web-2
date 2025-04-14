<?php
  $a = 4.10;
  $b = 3.90;

  $style = "text-2xl font-bold text-indigo-800 border-indigo-800 border-4 rounded p-4 mb-4 bg-indigo-200";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Exercício 04</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen gap-8">

  <p class="<?php echo $style; ?>">
    <?php
      $soma = $a + $b;
      echo (int)$soma;
    ?>
  </p>

  <p class="<?php echo $style; ?>">
    <?php
      $soma = ($a + $b) - 0.1;
      echo number_format($soma, 1)
    ?>
  </p>

  <p class="<?php echo $style; ?>">
    <?php
      $soma = ($a + $b) - 0.9;
      echo number_format($soma, 1)
    ?>
  </p>

  <p class="<?php echo $style; ?>">
    <?php
      $soma = ($a + $b) - 1;
      echo (int)$soma
    ?>
  </p>
</body>
</html>