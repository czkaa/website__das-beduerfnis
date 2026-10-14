<?php

$data = [
  'title' => $page->title()->value(),
  'metaTitle' => $page->customTitle()->or($page->title() . ' – ' . $site->title())->value(),
  'text' => $page->text()->kt()->value(),
];

echo \Kirby\Data\Json::encode($data);
