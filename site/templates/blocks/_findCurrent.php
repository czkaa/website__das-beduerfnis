<?php
function findCurrentExhibition ($exhibitions)
{
  $now = strtotime('now');
  $exhibitionArray = array();


  foreach ($exhibitions as $exhibition) {
    $start = strtotime($exhibition['start'] . "-5 days");
    $end = strtotime($exhibition['end'] . "+2 days");

    if (($end) >= $now) {
      $exhibitionArray[] = $exhibition;
    }
  }
  return $exhibitionArray;
}

function findCurrentEvents($events)
{
  $eventArray = array();
  foreach ($events as $event) {
    if (strtotime($event['start']) < strtotime('+31 days') && strtotime($event['end']) >= strtotime('-1 days')) {
      $eventArray[] = $event;
    }
  };

  return $eventArray;
}
?>
