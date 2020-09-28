<?php

  date_default_timezone_set('Asia/Jerusalem');

  include('simple_html_dom.php');
  $html = file_get_html('https://www.telesport.co.il/%D7%A9%D7%99%D7%93%D7%95%D7%A8%D7%99%20%D7%A1%D7%A4%D7%95%D7%A8%D7%98?fbclid=IwAR0ZHpk4lc8teZ6185ts_lKhjIv5k5R0-UcgivXtd-J-4mAUqpjBlg7Z1fU');
  $event_array = array();
  $list = $html->find('div[class="css-pane"]', 0);
  $i = 0;

  foreach ($list->find('[style="float:right;width:100px;height:30px;  border-left: solid 2px #aeaeae;text-align:center;font-size:14px; font-weight:bold; "]') as $hour) {
    $event_array[$i]['hour'] = $hour->plaintext;
    $i++;
  }
  $i = 0;

  foreach ($list->find('[style="overflow:hidden; white-space:nowrap; float:right;width:298px; height:30px;  border-left: solid 2px #aeaeae; font-size:14px; padding-right:10px; "]') as $playersAndType) {
    if(strpos($playersAndType->plaintext, ':')){
      $arr = explode(":", $playersAndType->plaintext, 2);
      $event_array[$i]['type'] = $arr[0];
      $event_array[$i]['players'] = $arr[1];
    }
    else{
      $event_array[$i]['type'] = $playersAndType->plaintext;
      $event_array[$i]['players'] = " ";
    }

    $i++;
  }

  $i = 0;
  foreach ($event_array as $event) {

    $date = date('Y-m-d H:i:s', strtotime($event['hour']));

    include_once "../DB/events.php";
    $objectEvent = new Event();
    $objectEvent->setType($event['type']);
    $objectEvent->setDate($date);
    $objectEvent->setPlayers($event['players']);
    $objectEvent->addFromAPI();
  }

    header("Location: events_page.php");

 ?>
