<?php

 include_once(__DIR__ . "/_findCurrent.php");


  $content = [
      'events' => findCurrentEvents(
        page('programm')
        ->children()
        ->filterBy('template', 'year')
        ->filterBy('year', date("Y"))
        ->children()
        ->filterBy('isEvent', 'true')
        ->sortBy('start', 'asc')
        ->map(fn($child) => [
            'title' => $child->title()->value(),
            'subtitle' => $child->subtitle()->value(),
            'headline' =>  $child->headlineBlocks()
                            ->toBlocks()
                            ->map(fn($block) => [
                                'identifier' => $block->type(),
                                'content' => content($block->type(), $block)
                            ])
                            ->values()[0],
            'slug' => $child->slug(),
            'uri' =>$child->parent()->slug(),
            'start' => $child->start()->toDate('Y-m-d'),
            'end' => $child->end()->toDate('Y-m-d'),
            'times' => site()->times()->value(),
            'color' => $child->color()->value(),
            'category' => $child->category()->value(),
            'description' => $child->description()->kt()->value(),
            'images' => $child
                        ->gallery()
                        ->toFiles()
                        ->map(fn($image) => [
                          'src' => $image->url(),
                          'srcset' => $image->srcset([
                            '900w' => ['width' => 900],
                            '1800w' => ['width' => 900],
                            '2700w' => ['width' => 1350],
                            '3600w' => ['width' => 1800]
                          ]),
                          'width' => $image->ratio() * 100,
                          'height' => (1 / $image->ratio()) * 100,
                          'alt' => $image->alt()->value(),
                        ])->values(),
        ])->values()
      ),
  ];
?>
