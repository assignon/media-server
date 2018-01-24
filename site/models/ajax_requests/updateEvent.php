<?php
require 'pdo_connection.php';

$pdo = pdo();

$eventNameForUpdate = htmlentities(htmlspecialchars($_GET['curEvtName']));
$eventName = htmlentities(htmlspecialchars($_GET['eventName']));
$eventLocation = htmlentities(htmlspecialchars($_GET['eventLocation']));
$eventStart = htmlentities(htmlspecialchars($_GET['eventStart']));
$eventEnd = htmlentities(htmlspecialchars($_GET['eventEnd']));
$eventTimeStart = htmlentities(htmlspecialchars($_GET['eventTimeStart']));
$eventTimeEnd = htmlentities(htmlspecialchars($_GET['eventTimeEnd']));
$allDayVal = htmlentities(htmlspecialchars($_GET['allDayVal']));
$invites = htmlentities(htmlspecialchars($_GET['invites']));

$invitesArr = array();
array_push($invitesArr, $invites);


    if(!empty($allDayVal) AND !empty($invites))
    {

      $insertEvt = $pdo->prepare('UPDATE events SET name=?, location=?, start_date=?, start_time=?, end_date=?, end_time=?, all_day=? WHERE name=?');
      $insertEvt->execute(array($eventName, $eventLocation, $eventStart, $eventTimeStart, $eventEnd, $eventTimeEnd, $allDayVal, $eventNameForUpdate));

      foreach ($invitesArr as $invite)
    {

        $insert_invites = $pdo->prepare("UPDATE invites SET event_name=?, invites=? WHERE event_name=?");
        $insert_invites->execute(array($eventName, $invite, $eventNameForUpdate));

      }

      echo "Event succesful updated ";

    }else if(empty($allDayVal) AND !empty($invites)){

      $insertEvt = $pdo->prepare('UPDATE events SET name=?, location=?, start_date=?, start_time=?, end_date=?, end_time=?, all_day=? WHERE name=?');
      $insertEvt->execute(array($eventName, $eventLocation, $eventStart, $eventTimeStart, $eventEnd, $eventTimeEnd, "Not allday", $eventNameForUpdate));

      foreach ($invitesArr as $invite)
     {

        $insert_invites = $pdo->prepare("UPDATE invites SET event_name=?, invites=? WHERE event_name=?");
        $insert_invites->execute(array($eventName, $invite, $eventNameForUpdate));

      }

      echo "Event succesful updated ";

    }else if(!empty($allDayVal) AND empty($invites))
    {

      $insertEvt = $pdo->prepare('UPDATE events SET name=?, location=?, start_date=?, start_time=?, end_date=?, end_time=?, all_day=? WHERE name=?');
      $insertEvt->execute(array($eventName, $eventLocation, $eventStart, $eventTimeStart, $eventEnd, $eventTimeEnd, $allDayVal, $eventNameForUpdate));


      $insert_invites = $pdo->prepare("UPDATE invites SET event_name=?, invites=? WHERE event_name=?");
      $insert_invites->execute(array($eventName, "No invite", $eventNameForUpdate));

      echo "Event succesful updated ";

    }else{

      $insertEvt = $pdo->prepare('UPDATE events SET name=?, location=?, start_date=?, start_time=?, end_date=?, end_time=?, all_day=? WHERE name=?');
      $insertEvt->execute(array($eventName, $eventLocation, $eventStart, $eventTimeStart, $eventEnd, $eventTimeEnd, "Not allday", $eventNameForUpdate));


      $insert_invites = $pdo->prepare("UPDATE invites SET event_name=?, invites=? WHERE event_name=?");
      $insert_invites->execute(array($eventName, "No invite", $eventNameForUpdate));

      echo "Event succesful updated ";

    }


 ?>
