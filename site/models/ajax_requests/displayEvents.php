<?php

    require "pdo_connection.php";
    $pdo = pdo();

    $dateNumb = htmlentities(htmlspecialchars($_GET['dateNumb']));
    $curMonth = htmlentities(htmlspecialchars($_GET['curMonth']));
    $curYear = date('Y');

    $date = $dateNumb.'-'.$curMonth.'-'.$curYear;

    /*function curDate()
    {

      $dateNumb = htmlentities(htmlspecialchars($_GET['dateNumb']));
      $curMonth = htmlentities(htmlspecialchars($_GET['curMonth']));
      $curYear = date('Y');

      $date_now = $dateNumb.'-'.$curMonth.'-'.$curYear;
      $date = new DateTime($date_now);
      $calendar = array();

      while($dateNumb <= 5)
      {

         $year = $date->format('Y');
         $months = $curMonth;
         $days = $date->format('j');
        // $weeks = str_replace(0, 7, $this->days_name[$date->format('w')]);

        //$calendar[$year][$months][$days];
        array_push($calendar, $days);

         $date->add(new DateInterval('P1D'));

      }

      return $calendar;

    }*/


    $getEvent = $pdo->prepare('SELECT * FROM events WHERE start_date=?');
    $getEvent->execute(array($date));

    if($getEvent->rowCount() > 0)
    {

      while($displayEvt = $getEvent->fetch())
      {

         ?>

           <div class="evtCont">

              <h3><?php echo $displayEvt['name'];?></h3>
              <div class="evtDateTime">

                 <p><?php echo $displayEvt['start_date'];?></p>
                 <p><?php echo $displayEvt['start_time'].' - '.$displayEvt['end_time'];?></p>

              </div>

           </div>


           <!--<div class="evtGrid">

               <div class="hoursGrid">

               </div>

               <div class="dateGrid">

               </div>

           </div>-->

         <?php

      }

    }else{

       echo "No event available...!";

    }


 ?>
