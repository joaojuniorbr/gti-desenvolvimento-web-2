<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Exercício 09</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
  <div class="container mx-auto p-4">
    <div class="grid grid-cols-5 gap-4">
      <?php for ($i = 1; $i <= 10; $i++): ?>
          <div class="p-4 border border-slate-200 rounded">
            <h2 class="text-lg font-semibold mb-2">Tabuada do <?= $i ?></h2>
            <?php for ($j = 1; $j <= 10; $j++): ?>
                <p><?= $i ?> * <?= $j ?> = <?= $i * $j ?></p>
            <?php endfor; ?>
          </div>
      <?php endfor; ?>
    </div>
  </div>
</body>
</html>