<?php date_default_timezone_set('America/Sao_Paulo'); ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <title><?php echo $configuration['title']; ?></title>

  <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css"
    rel="stylesheet" />

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet" />

  <?php if (isset($configuration['hasBootstrap'])): ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
  <?php endif; ?>

  <script src="https://cdn.tailwindcss.com"></script>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            sans: ['"IBM Plex Sans"', 'sans-serif'],
          },
        },
      },
    }
  </script>
  <style>
    body {
      @apply font-sans;
    }
  </style>
</head>

<body>
  <main class="min-h-screen bg-slate-100 text-slate-800 flex flex-col">
    <div id="main-menu" class="fixed right-0 top-0 z-10 bg-black/80 z-10 w-full h-full flex justify-end hidden">
      <nav class="relative bg-white shadow-lg z-10 w-full h-full rounded-br-lg p-8 overflow-y-scroll md:w-1/2">
        <button class="toggleMenu flex items-center justify-center w-8 h-8 bg-black text-white text-xl rounded-full absolute top-4 right-4">
          <i class="ri-close-line"></i>
        </button>

        <div class="text-xl font-bold uppercase border-b border-slate-200 pb-4"><?php echo $configuration['logo'] ?? $configuration['title']; ?></div>

        <?php if (isset($configuration['menu'])): ?>
          <ul>
            <?php foreach ($configuration['menu'] as $item): ?>
              <?php
              $activeClass = (basename($_SERVER['REQUEST_URI']) === basename($item['url'])) ? 'text-orange-500 bg-orange-50 font-bold' : 'text-slate-800';
              ?>
              <li class="text-xs p-3 border-b border-slate-200 <?php echo $activeClass; ?>">
                <a href="<?php echo $item['url']; ?>">
                  <?php echo $item['label']; ?>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
        <?php endif; ?>
      </nav>
    </div>

    <header class="bg-orange-500 text-white py-4 px-6 md:py-8">
      <div class="container mx-auto flex items-center justify-between">
        <h1 class="text-xl font-bold uppercase "><?php echo $configuration['logo'] ?? $configuration['title']; ?></h1>
        <?php if (isset($configuration['menu'])): ?>
          <nav class="flex-1 flex justify-end">
            <?php if (count($configuration['menu']) > 6): ?>
              <button class="toggleMenu text-orange-500 bg-white text-lg rounded p-0 flex items-center justify-center w-8 h-8" type="button">
                <i class="ri-menu-line"></i>
              </button>
            <?php else: ?>
              <ul class="flex gap-2 flex-wrap justify-end">
                <?php foreach ($configuration['menu'] as $item): ?>
                  <?php
                  $activeClass = (basename($_SERVER['REQUEST_URI']) === basename($item['url'])) ? 'text-orange-500 bg-white' : 'text-white hover:bg-white/10';
                  ?>
                  <li class="text-xs">
                    <a href="<?php echo $item['url']; ?>" class="<?php echo $activeClass; ?> flex py-1 px-2 rounded duration-300 ease-in-out">
                      <?php echo $item['label']; ?>
                    </a>
                  </li>
                <?php endforeach; ?>
              </ul>
            <?php endif; ?>
          </nav>
        <?php endif; ?>
      </div>
    </header>
    <article class="flex-1 px-6 md:px-0">