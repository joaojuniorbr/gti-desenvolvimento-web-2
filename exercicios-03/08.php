<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Exercício 08</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
  <table class="table-auto border-collapse mx-auto mt-10">
    <thead>
      <tr>
        <th class="border border-slate-200 px-4 py-2 bg-slate-800 text-white">x</th>
        <th class="border border-slate-200 px-4 py-2 bg-slate-800 text-white">x²</th>
      </tr>
    </thead>
    <tbody>
      <?php for ($x = 1; $x <= 30; $x++): ?>
        <tr>
          <td class="border border-slate-200 px-4 py-2 font-bold"><?php echo $x; ?></td>
          <td class="border border-slate-200 px-4 py-2"><?php echo $x * $x; ?></td>
        </tr>
      <?php endfor; ?>
    </tbody>
  </table>
</body>
</html>