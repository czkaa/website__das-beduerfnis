<?php

  $content = [
    'links' => $block->links()->toPages()->map(fn ($p) => [
      'url' => '/' . $p->uri(),
      'headline' => $p->headline()->kt()->or($p->title())->value(),
    ])->values(),
  ];
?>
