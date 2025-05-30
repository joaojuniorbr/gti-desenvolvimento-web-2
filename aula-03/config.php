<?php

$menu = [];

for ($i = 0; $i < 11; $i++) {
  $item = str_pad($i + 1, 2, '0', STR_PAD_LEFT);
  $menu[] = [
    'label' => 'Exercício ' . $item,
    'url' => './' . $item . '.php'
  ];
}

$config = array(
  'menu' => [
    [
      'label' => 'Inicio',
      'url' => 'index.php'
    ],
    ...$menu
  ]
);
