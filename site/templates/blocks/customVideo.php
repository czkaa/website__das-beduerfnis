<?php
  $content = [
    'video' => [
      'url'=> $block->customVideo()->toFile()->url(),
      'alt' => $block->customVideo()->toFile()->alt()->value(),
      'subtitle' => $block->customVideo()->toFile()->subtitle()->value()
    ]
  ];
?>
