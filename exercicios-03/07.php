<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Exercício 07</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen">
  <div class="container mx-auto py-10">
    <div class="grid grid-cols-10 gap-4">
      <?php for ($i = 1; $i <= 100; $i++): ?>
      <div class="bg-<?php echo ($i % 2 == 0) ? 'purple' : 'indigo'; ?>-700 text-white p-4 rounded text-center text-xs uppercase">

        <?php echo $i; ?> - <?php echo ($i % 2 == 0) ? 'Par' : 'Ímpar'; ?> 

      </div>
      <?php endfor; ?>
    </div>
  </div>
</body>
</html>