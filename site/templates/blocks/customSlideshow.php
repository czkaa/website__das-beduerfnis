<?php
  $content = [
    'images' => $block->customSlideshow()->toFiles()->sortBy('sort')->map(fn($image) => [
      'url' => $image->url(),
      'srcset' => $image->srcset([
        '900w' => ['width' => 900],
        '1800w' => ['width' => 900],
        '2700w' => ['width' => 1350],
        '3600w' => ['width' => 1800]
      ]),
      'width' => $image->ratio() * 100,
      'height' => (1 / $image->ratio()) * 100,
      'alt' => $image->alt()->value(),
      'subtitle' => $image->subtitle()->value()
    ])->values()
  ];
?>
