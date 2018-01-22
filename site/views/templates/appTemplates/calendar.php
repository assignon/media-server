<?php

   $calendar = new Calendar();
   //$calendar->display_calendar();
   $main_map = mainMap();

 ?>


<div class="agenda">

   <div class="agendaHeader">

      <h3><?php echo $calendar->currentMonth();?></h3>
      <img src="../<?php echo $main_map;?>/public/media/events/addevent.svg" alt="" id="addEvents">

   </div>

   <div class="agengaBody">

      <?php $calendar->display_calendar();?>

   </div>

   <div class="agendaFooter">

      <div class="eventsOwner">

      </div>

      <button id="bored">I am bored</button>

   </div>

</div>

<div class="tools">

    <img src="" alt="" id="addNote">

    <div class="toolsHeader">

      <div class="modes">

         <h3>Where would you like to go?</h3>
         <p>"Collective mode"</p>
         <p>"Private mode"</p>

      </div>

      <img src="" alt="" id="micro">

    </div>

</div>
