<?php

$menu = [];

for ($i = 0; $i < 4; $i++) {
  $menu[] = [
    'label' => 'Exercício ' . ($i + 1),
    'url' => './exercicio-' . ($i + 1) . '.php'
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
