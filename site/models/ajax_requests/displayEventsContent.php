<?php

    require "pdo_connection.php";
    require "../phpUtils.php";
    $pdo = pdo();

    $eventName = htmlentities(htmlspecialchars($_GET['eventName']));

    $getEvent = $pdo->prepare('SELECT * FROM events WHERE name=?');
    $getEvent->execute(array($eventName));

    $getLids = $pdo->query("SELECT * FROM family_lids");

    $getInvites = $pdo->prepare("SELECT invites FROM invites WHERE event_name=?");
    $getInvites->execute(array($eventName));

    $displayInvites = $getInvites->fetch();
    $replace = str_replace(',', ' ', $displayInvites);
    $invites = explode(' ', $replace[0]);


      while($displayEvt = $getEvent->fetch())
      {

         ?>

         <div class="evtDisplayHeader">

           <img src="../mediaServer/public/media/events/eventleft.svg" alt="" id="backToEventsDetails">
           <h2>Event details</h2>
           <h3 id="editEvent">Edit</h3>

         </div>

         <div class="evtDisplayBody">

            <h2><?php echo $displayEvt['name'];?></h2>
            <p><?php echo $displayEvt['location'];?></p>
            <hr class="evtDetailSeparator"/>

            <div class="evtDateTime">

               <p><?php echo str_replace('-', ' ', $displayEvt['start_date']);?></p>
               <p><?php echo 'From '.$displayEvt['start_time'].' to '.$displayEvt['end_time'];?></p>

            </div>

            <div class="alert">

               <div class="alertNotification">

                  <p>Alert</p>
                  <div class="alertParams">

                     <p>None</p>
                     <img src="" alt="">

                  </div>

               </div>

               <hr/>

            </div>

         </div>

         <div class="evtDisplayFooter">

           <div class="evtInvites">

              <div class="lidsCont">

                <?php

                    while ($displayLids = $getLids->fetch()) {

                       ?>

                        <div class="invites">

                           <div class="invitedOrNot" id="<?php echo $displayLids['lid_name'];?>">

                             <?php

                               foreach ($invites as $value) {

                                  if($value == $displayLids['lid_name'])
                                  {

                                     ?>

                                       <img src="../mediaServer/public/media/events/checkMark.svg" alt="" style="width: 15px; height:15px;">

                                     <?php

                                  }

                               }

                              ?>

                           </div>

                           <p><?php echo $displayLids['lid_name'];?></p>

                        </div>

                       <?php

                    }

                 ?>

              </div>

           </div>

           <h4 id="deleteEvt">Delete event</h4>

         </div>

         <?php

      }


 ?>
