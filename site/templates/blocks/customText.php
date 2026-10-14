<?php
  // $pattern = '/&ind;/gi';
  $text = $block->text()->kirbytext()->value();
  $mod = str_replace('&ind;', '&emsp;&emsp;', $text);
  $content = [
    // 'text' => $mod, // $block->text()->kirbytext()->value(),
    'text' => $block->text()->kirbytext()->value(),
    'size'  => $block->size()->value(),
    'columns' => $block->columns()->value()
  ];
?>
