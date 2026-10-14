<?php

return [
    // (1)
    // The following data is mandatory for the frontend router to initialize:
    'title' => site()->title()->value(),
    'logotype' => site()
                  ->logotype()
                  ->gallery()
                  ->first()
                  ->toFile()
                  ->url(),
    'children' => site()
        ->children()
        ->published()
        ->map(fn($child) => [
            'uri' => $child->uri(),
            'title' => $child->title()->value(),
            'isListed' => $child->isListed(),
            'template' => $child->intendedTemplate()->name(),
            'childTemplate' => $child->hasChildren() ? $child->children()->first()->intendedTemplate()->name() : null
        ])
        ->values(),
    'mail' => site()->mail()->value(),
    'social' => site()
        ->social()
        ->toStructure()
        ->map(fn($social) => [
            'link' => $social->type()->value() === 'link' ? $social->url()->value()
                                                          : 'mailto:' . $social->mail()->value(),
            'icon' => $social->icon()->toFile()->url()
        ])
        ->values(),
    'colors' => page('programm')
             ->children()
             ->filterBy('template', 'year')
             ->children()
             ->map(fn($child) =>[
               'color' => $child->color()->value(),
             ])->values(),
    // 'privacy' => site()->privacy() ? site()->privacy()->toPages()->first()->uri() : null,
    'menu' => [
      'topleft' => [
            'title' => page('ueber-uns')->title()->value(),
            'slug' => page('ueber-uns')->slug(),
            'children' => page('ueber-uns')->children()->map(fn($child) => ['title' => $child->title()->value(),'uri' => $child->uri()])->values()],
      'bottomleft' => [
            'title' => page('teilhaben')->title()->value(),
            'slug' => page('teilhaben')->slug(),
            'children' => page('teilhaben')->children()->map(fn($child) => ['title' => $child->title()->value(),'uri' => $child->uri()])->values()],
      // page programm special case due to sorting and different title displays
      'topright' => [
            'title' => page('programm')->title()->value(),
            'slug' => page('programm')->slug(),
            'children' => page('programm')->children()->sortBy('year', 'desc')->map(fn($child) => ['title' => $child->year()->value(),'uri' => $child->uri()])->values()],
      'bottomright' => [
            'title' => page('archiv')->title()->value(),
            'slug' => page('archiv')->slug(),
            'children' => page('archiv')->children()->map(fn($child) => ['title' => $child->title()->value(),'uri' => $child->uri()])->values()]
      ],
];
