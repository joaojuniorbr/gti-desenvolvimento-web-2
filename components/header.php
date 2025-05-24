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

  <script src="https://cdn.tailwindcss.com"></script>

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
    <header class="bg-orange-500 text-white py-8">
      <div class="container mx-auto flex items-center justify-between">
        <h1 class="text-xl font-bold uppercase"><?php echo $configuration['logo'] ?? $configuration['title']; ?></h1>
        <?php if (isset($configuration['menu'])): ?>
          <nav class="flex-1">
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
          </nav>
        <?php endif; ?>
      </div>
    </header>
    <article class="flex-1">