<?php
  $content = [
    'code' => $block->code()->value(),
    'isDark' => $block->isDark()->value() === 'true' ? true : false,
  ];

?>
