<?php

//  require '../mediaServer/site/models/ajax_requests/pdo_connection.php';
  require "pdo_connection.php";
  $pdo = pdo();
  // $dateTime = new DateTime();
  // $dayNow = $dateTime->format('j').'-'.date('m').'-'.$dateTime->format('Y');
   //$timeNow = $dateTime->format('H').":".$dateTime->format('i');

   if(isset($_GET['curEvtName']))
   {

      $curEvtName = htmlentities(htmlspecialchars($_GET['curEvtName']));

      $getCurEvt = $pdo->prepare("SELECT * FROM events WHERE name=?");
      $getCurEvt->execute(array($curEvtName));
      $getEvtData = $getCurEvt->fetch();


      function invitesStatus($status)
      {

         $pdo = pdo();
         $curEvtName = htmlentities(htmlspecialchars($_GET['curEvtName']));


          $getInvites = $pdo->prepare('SELECT * FROM invites WHERE event_name=?');
          $getInvites->execute(array($curEvtName));
          $getInvitesData = $getInvites->fetch();

          $replace = str_replace(',' ," ", $getInvitesData['invites']);

          $invitesObj = explode(" ",$replace);

          $count_invitesObj = count($invitesObj);

          $invitesStatus = 'checked';

         for ($i=0; $i < $count_invitesObj; $i++)
         {

             if($_POST[$status] == $invitesObj[$i])
             {

                 $invitesStatus = "checked";

             }else{

               $invitesStatus = "";

             }

         }

          return $invitesStatus;

      }

      ?>

      <div class="editEventHeader">

         <img src="../mediaServer/public/media/events/eventleft.svg" alt="" id="editBackToEvent">
         <h2>Edit Event</h2>
         <h3 id="editNewEvent">Edit</h3>

      </div>

      <div class="editEventBody">

          <form class="editEventForm" action="" method="">

            <div class="inputsCont">

               <label for="">Name</label>
               <input type="text" name="" id="eventNameUpdate" placeholder="" value="<?php echo $curEvtName;?>">

            </div>


            <div class="inputsCont">

               <label for="">Location</label>
               <input type="text" name="" id="eventLocationUpdate" placeholder="" value="<?php echo $getEvtData['location'];?>">

            </div>

            <div class="inputsCont dateTime" id="space">

               <label for="">Starts</label>
               <input type="text" name="" id="eventStartUpdate" placeholder="" value="<?php echo $getEvtData['start_date'];?>">
               <input type="text" name="" id="eventTimeStartUpdate" placeholder="" value="<?php echo $getEvtData['start_time'];?>">

            </div>

            <div class="inputsCont dateTime">

               <label for="">Ends</label>
               <input type="text" name="" id="eventEndUpdate" placeholder="" value="<?php echo $getEvtData['end_date'];?>">
               <input type="text" name="" id="eventTimeEndUpdate" placeholder="End time" value="<?php echo $getEvtData['end_time'];?>">

            </div>

            <div class="inputsCont" id="allDays">

              <?php

                   if($getEvtData['all_day'] == "allday")
                   {

                      ?>

                      <input type="checkbox" name="" id="allDayUpdate" placeholder="" value="allday" checked>
                      <label for="">All day</label>

                      <?php

                   }else{

                     {

                        ?>

                        <input type="checkbox" name="" id="allDayUpdate" placeholder="" value="allday">
                        <label for="">All day</label>

                        <?php

                     }

                   }

               ?>

            </div>


            <div class="inputsCont">

               <label for="">Alert</label>
               <input type="text" name="" id="alert" placeholder="">

            </div>

          </form>

      </div>

      <div class="editEventFooter">

         <p>Invite</p>
         <form action="" method="post" class="invited">

           <div class="inputsInvited">

              <input type="checkbox" name="sanne" class="invitedCheckbox" value="Sanne" id="sanne">
              <p>Sanne</p>

           </div>

           <div class="inputsInvited">

              <input type="checkbox" name="everyone" class="invitedCheckbox" value="Everyone" id="everyone">
              <p>Everyone</p>

           </div>

           <div class="inputsInvited">

              <input type="checkbox" name="alberto" class="invitedCheckbox" value="Alberto" id="alberto">
              <p>Alberto</p>

           </div>

         </form>

      </div>

      <?php

  }

   ?>
