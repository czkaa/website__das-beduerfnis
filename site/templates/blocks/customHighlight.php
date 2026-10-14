<?php
  $content = [
    'textTop' => $block->textTop()->kirbytext()->value(),
    'textCenter' => $block->textCenter()->kirbytext()->value(),
    'textBottom' => $block->textBottom()->kirbytext()->value(),
    'animate' => $block->animate()->value() === 'true' ? true : false,
  ];
?>
