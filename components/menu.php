<?php $grid = $configuration['menuGrid'] ?? 5; ?>

<ul class="grid grid-cols-2 md:grid-cols-<?php echo $grid; ?> gap-4">
  <?php for ($i = 1; $i < count($config['menu']); $i++): ?>
    <li>
      <a
        href="<?php echo $config['menu'][$i]['url']; ?>"
        class="block bg-white border border-orange-500 text-orange-500 text-center py-4 rounded shadow text-xs hover:bg-orange-500 hover:text-white transition duration-300 ease-in-out">
        <?php echo $config['menu'][$i]['label']; ?>
      </a>
    </li>
  <?php endfor; ?>
</ul>