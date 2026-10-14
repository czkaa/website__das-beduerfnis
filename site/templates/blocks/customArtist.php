<?php
  $content = [
    'headline' => $block->headline()->toStructure()->map(fn($item) => [
        'text' => $item->text()->value(),
        'align' => $item->align()->value()
    ])->values(),
    'url' => $block->url()->value()

  ];
?>
