<?php
include_once(__DIR__ . "/blocks/_content.php");

$data = [
  'title' => $page->title()->value(),
  'metaTitle' => $page->customTitle()->or($page->title() . ' – ' . $site->title())->value(),
  'main' => $page->main()->toLayouts()->map(fn($layout) => [
    'id' => $layout->id(),
    'columns' => $layout->columns()->map(fn($column) => [
      'width' => $column->width(),
      'id' => $column->id(),
      'blocks' => $column->blocks() != null ? $column->blocks()->map(function($block) {
        return [
          'identifier' => $block->type(),
          'content' => content($block->type(), $block)
        ];
      })->values() : 'noooooooo'
    ])->values(),
  ])->values(),
];

echo \Kirby\Data\Json::encode($data);
