<?php /** @var \Kirby\Cms\Page $page */ ?>
<!DOCTYPE html>
<html class="h-full" lang="<?= $kirby->languageCode() ?? 'en' ?>">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?php snippet('meta', compact('page', 'site')) ?>

  <?= vite()->preloadJson($page->uri()) ?>
  <?= vite()->preloadModule($page->intendedTemplate()->name()) ?>

  <?= vite()->client() ?>
  <?= vite()->css() ?>

</head>
<body class="">

  <div id="app" class="h-full"></div>
  <script id="site-data" type="application/json">
    <?= \Kirby\Data\Json::encode(vite()->useSite()) ?>
  </script>

  <?= vite()->js() ?>

</body>
</html>
