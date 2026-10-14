<?php
  $content = [
    'text' => $block->text()->kirbytext()->value(),
    'isOutnow' => $block->outNow()->value()=== 'true' ? true : false,
    'size'  => $block->size()->value(),
  ];
?>
