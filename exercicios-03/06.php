<?php $numero = 1; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Exercício 06</title>

  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen">

  <div class="container mx-auto">
    <div class="grid grid-cols-10 gap-4">
    <?php while ($numero <= 100) : ?>
      <div class="bg-fuchsia-800 text-white p-4 rounded text-center text-xs"><?php echo $numero ?></div>
      <?php $numero++; ?>
    <?php endwhile; ?>
    </div>
  </div>

</body>
</html>