<?php

$data = [
  'title' => $page->title()->value(),
  'metaTitle' => $page->customTitle()->or($page->title() . ' – ' . $site->title())->value(),
  'landingLink' => page('ueber-uns')->children()->first()->uri(),
  'colors' => page('programm')
           ->children()
           ->filterBy('template', 'year')
           ->children()
           ->map(fn($child) =>[
             'color' => $child->color()->value(),
           ])->values(),
];

echo \Kirby\Data\Json::encode($data);
