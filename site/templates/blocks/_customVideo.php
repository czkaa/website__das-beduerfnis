<?php

if (!function_exists('renderVideo')) {
  function renderVideo($url) {
    $out = "";

    $parse = (parse_url($url));
    if (strpos($parse['host'], 'youtube') !== false){
      parse_str( parse_url( $url, PHP_URL_QUERY ), $urlVars );

      $out .= "<div class='iframe-holder'>";
        $out .= "<iframe class='youtubeiframe' src='https://www.youtube-nocookie.com/embed/{$urlVars['v']}?rel=0&amp;controls=2&amp;showinfo=0&amp;color=white&amp;theme=light' frameborder='0' allowfullscreen></iframe>";
      $out .= "</div>";
    }
    if (strpos($parse['host'], 'vimeo') !== false){
      $urlVar = substr(parse_url($url, PHP_URL_PATH),1);

      $out .= "<div class='iframe-holder'>";
        $out .= "<iframe class='vimeoiframe' src='https://player.vimeo.com/video/{$urlVar}?color=cfcfcf&title=0&byline=0&portrait=0' frameborder='0' webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>";
      $out .= "</div>";
    }

    return $out;
  }
}



  $content = [
    'url' => $block->url()->value(),
    'iframe' => renderVideo($block->url()->value()),
    'subtitle' => $block->subtitle()->value()
  ];
?>
