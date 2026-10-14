<?php
include_once(__DIR__ . "/blocks/_content.php");


function calcMonths($start, $end)
{
  $months = array();

  $start    = (new DateTime($start))->modify('first day of this month');
  $end      = (new DateTime($end))->modify('first day of next month');
  $interval = DateInterval::createFromDateString('1 month');
  $period   = new DatePeriod($start, $interval, $end);

  foreach ($period as $dt) {
      $months[] = ltrim($dt->format("m"), '0');
  }
  return $months;
}

function isCurrent($exhibition)
{
  $now = strtotime('now');
  $start = strtotime($exhibition['start'] . "-5 days");
  $end = strtotime($exhibition['end'] . "+1 days");

  if (($end) >= $now) {
    return true;
  } else {
    return false;
  }
}

$data = [
  'title' => $page->title()->value(),
  'metaTitle' => $page->customTitle()->or($page->title() . ' – ' . $site->title())->value(),
  'year' => $page->year()->value(),
  'subheading' => $page->subheading()->value(),
  'description' => $page->description()->value(),
  'exhibitions' => $page
                    ->children()
                    ->sortBy('end', 'asc')
                    ->map(fn($child) => [
                        'title' => $child->title()->value(),
                        'isEvent' => $child->isEvent()->value() === 'true' ? true : false,
                        'headline' =>  $child->headlineBlocks()
                                        ->toBlocks()
                                        ->map(fn($block) => [
                                            'identifier' => $block->type(),
                                            'content' => content($block->type(), $block)
                                        ])
                                        ->values(),
                        'subtitle' => $child->subtitle()->value(),
                        'slug' => $child->slug(),
                        'start' => $child->start()->toDate('Y-m-d'),
                        'end' => $child->end()->toDate('Y-m-d'),
                        'months' => calcMonths($child->start()->toDate('y-m-d'), $child->end()->toDate('y-m-d')),
                        'color' => $child->color()->value(),
                        'category' => $child->category()->value(),
                        'description' => $child->description()->kt()->value(),
                        'isLeft' => $child->isLeft()->value() === 'false' || $child->isLeft()->value() === null ? true : false,
                        'isCurrent' => isCurrent(
                                        [
                                          'start' => $child->start()->toDate('Y-m-d'),
                                          'end' => $child->end()->toDate('Y-m-d'),
                                        ]
                        ),
                        'images' => $child
                                    ->gallery()
                                    ->toFiles()
                                    ->map(fn($image) => [
                                      'src' => $image->url(),
                                      'ratio' => $image->ratio(),
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
                    ])->values(),
  

];

echo \Kirby\Data\Json::encode($data);
