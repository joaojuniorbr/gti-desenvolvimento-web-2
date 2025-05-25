<?php

$menu = [];

for ($i = 0; $i < 9; $i++) {
  $menu[] = [
    'label' => 'Exercício ' . str_pad($i + 1, 2, '0', STR_PAD_LEFT),
    'url' => './' . ($i + 1) . '.php'
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
