<?php
  $pulgas = 2; 
  $dias = 0;
  $antipulgas = 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Exercício 11</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
  <div class="container mx-auto py-10">
    <?php while ($pulgas > 0) : ?>
      <?php
        $dias++;

        $dias++;
          
        $pulgas += floor($pulgas / 2) * 6;

        if ($dias % 3 == 0) {
            $pulgas -= 2;
        }

        $pulgas -= $antipulgas;
        $antipulgas *= 4;

        if ($pulgas < 0) {
          $pulgas = 0;
        }
      ?>
      <div class="my-4 border border-gray-400 rounded p-4 text-xs">Dia <?php echo $dias; ?>: Restam <?php echo $pulgas; ?> pulgas</div>
    <?php endwhile; ?>

    <div class="font-bold p-4 border border-green-800 bg-green-50 mt-10 text-center rounded">PHP estará livre das pulgas em <?php echo $dias; ?> dias!</div>
  </div>
</body>
</html>