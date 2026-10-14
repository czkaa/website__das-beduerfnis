<?php
  $content = [
    'logos' => $block->logos()->toFiles()->sortBy('sort')->map(fn($logo) => [
      'url' => $logo->url(),
      'alt' => $logo->alt()->value(),
    ])->values()
  ];
?>
