<?php
  $content = [
    'downloads' => $block->download()->toFiles()->sortBy('sort')->map(fn($image) => [
      'url' => $image->url(),
      'filename' => $image->filename(),
    ])->values(),
    'title' => $block->title()->value()
  ];
?>
