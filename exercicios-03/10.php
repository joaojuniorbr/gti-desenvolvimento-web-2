<?php
  $aguaMagica = 10;
  $poCristal = 4;
  $essenciaFogo = 15;
  $sementeTerra = 6;

  $validaAguaMagica = $aguaMagica >= 2 * $poCristal;
  $validaEssenciaFogo = $essenciaFogo > ($aguaMagica + $poCristal) && $essenciaFogo <= 20;
  $validaSementeTerra = $sementeTerra > 5 && $sementeTerra < $essenciaFogo;

  $styleDefault = "border-2 p-4 text-center font-bold uppercase";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Exercício 10</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
  <div class="container mx-auto py-10">
    <table class="table border-collapse mt-10 text-left border-slate-200 border-t mb-10">
      <tr>
        <th class="p-4 border-b">
          Água Mágica: 
        </th>
        <td class="p-4 border-b">
          <?php echo $aguaMagica; ?>
        </td>
      </tr>
      <tr>
        <th class="p-4 border-b">
          Pó de Cristal: 
        </th>
        <td class="p-4 border-b">
          <?php echo $poCristal; ?>
        </td>
      </tr>
      <tr>
        <th class="p-4 border-b">
          Essência de Fogo: 
        </th>
        <td class="p-4 border-b">
          <?php echo $essenciaFogo; ?>
        </td>
      </tr>
      <tr>
        <th class="p-4 border-b">
          Semente da Terra: 
        </th>
        <td class="p-4 border-b">
          <?php echo $sementeTerra; ?>
        </td>
      </tr>
    </table>

    <?php if ($validaAguaMagica && $validaEssenciaFogo && $validaSementeTerra): ?>
      <div class="<?php echo $styleDefault; ?> border-green-600">
        A poção foi criada com sucesso!
      </div>
    <?php else: ?>
      <div class="<?php echo $styleDefault; ?> border-red-800">
        A poção não pôde ser criada. Verifique os ingredientes.
      </div>
    <?php endif; ?>
  </div>
</body>
</html>