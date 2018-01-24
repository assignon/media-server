<?php

   $dateTime = new DateTime();
   $dayNow = $dateTime->format('j').'-'.date('m').'-'.$dateTime->format('Y');
   $timeNow = $dateTime->format('H').":".$dateTime->format('i');

 ?>

<div class="addEventCont">

   <div class="addEventHeader">

      <img src="../mediaServer/public/media/events/eventleft.svg" alt="" id="backToEvent">
      <h2>New Event</h2>
      <h3 id="addNewEvent">Add</h3>

   </div>

   <div class="addEventBody">

       <form class="addEventForm" action="" method="">

         <div class="inputsCont">

            <label for="">Name</label>
            <input type="text" name="" id="eventName" placeholder="Type something">

         </div>


         <div class="inputsCont">

            <label for="">Location</label>
            <input type="text" name="" id="eventLocation" placeholder="">

         </div>

         <div class="inputsCont dateTime" id="space">

            <label for="">Starts</label>
            <input type="text" name="" id="eventStart" placeholder="" value="<?php echo $dayNow;?>">
            <input type="text" name="" id="eventTimeStart" placeholder="" value="<?php echo $timeNow;?>">

         </div>

         <div class="inputsCont dateTime">

            <label for="">Ends</label>
            <input type="text" name="" id="eventEnd" placeholder="" value="<?php echo $dayNow;?>">
            <input type="text" name="" id="eventTimeEnd" placeholder="End time" value="<?php //echo $curretDteTime['timeNow'];?>">

         </div>

         <div class="inputsCont" id="allDays">

            <input type="checkbox" name="" id="allDay" placeholder="" value="allday">
            <label for="">All day</label>

         </div>


         <div class="inputsCont">

            <label for="">Alert</label>
            <input type="text" name="" id="alert" placeholder="">

         </div>

       </form>

   </div>

   <div class="addEventFooter">

      <p>Invite</p>
      <div class="invited">

        <div class="inputsInvited">

           <input type="checkbox" name="" class="invitedCheckbox" value="Sanne">
           <p>Sanne</p>

        </div>

        <div class="inputsInvited">

           <input type="checkbox" name="" class="invitedCheckbox" value="Everyone">
           <p>Everyone</p>

        </div>

        <div class="inputsInvited">

           <input type="checkbox" name="" class="invitedCheckbox" value="Alberto">
           <p>Alberto</p>

        </div>

      </div>

   </div>

</div>


<style media="screen">

  .addEventCont
  {

    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-around;
    align-items: center;
    border: 1px solid gray;
    border-radius: 5px;

  }


  .addEventHeader
  {

     width: 90%;
     height: 15%;
     display: flex;
     flex-direction: row;
     justify-content: space-between;
     align-items: center;

  }


  .addEventHeader img
  {

     width: 20px;
     height: 20px;
     cursor: pointer;

  }


  .addEventHeader img:hover
  {

    transition: transform 0.2s linear 0s;
    transform: scale(1.2,1.2);

  }


  .addEventHeader h2
  {

      text-align: center;
      color: #F65F59;

  }


  #addNewEvent
  {

     text-align: center;
     color: #F65F59;
     cursor: pointer;

  }


  #addNewEvent:hover
  {

    transition: transform 0.2s linear 0s;
    transform: scale(1.2,1.2);

  }


  .addEventBody
  {

     width: 100%;
     height: 55%;
     display: flex;
     justify-content: flex-end;
     align-items: flex-end;

  }


  .addEventForm
  {

    width: 95%;
    height: 90%;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: center;

  }


  .inputsCont
  {

      display: flex;
      flex-direction: row;
      justify-content: center;
      align-items: center;
      width: 100%;
      height: auto;
      margin-bottom: 10px;
      border-bottom: 1px solid #2D3C77;

  }


  #space
  {

    margin-top: 30px;

  }


  .inputsCont label
  {

     text-align: left;
     color: #2D3C77;
     font-size: 16px;
     width: 15%;

  }


  .inputsCont input
  {

     border: 1px solid white;
     text-align: left;
     font-size: 16px;
     color: #2D3C77;
     width: 85%;

  }


  .dateTime input
  {

     width: 47%;

  }


  #allDays
  {

     margin-top: 0px;
     margin-bottom: 30px;
     border: 0px;
     justify-content: flex-start;
     align-items: flex-start;

  }


  #allDays input
  {

     padding: 20px;

  }


  #allDays input, #allDays label
  {

    width: auto;
    height: auto;

  }


  .addEventFooter
  {

   width: 90%;
   height: 30%;
   display: flex;
   flex-direction: column;
   justify-content: flex-start;
   align-items: flex-start;

  }


  .addEventFooter p
  {

   font-size: 16px;
   text-align: left;
   color: #2D3C77;
   margin-bottom: 5px;
   width: 50%;
   height: auto;

  }


  .invited
  {

    width: 300px;
    height: 100%;
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: flex-start;
    align-content: flex-start;

  }


  .inputsInvited
  {

     width: 150px;
     height: auto;
     display: flex;
     justify-content: flex-start;
     align-content: flex-start;
     align-items: center;

  }


  .inputsInvited p
  {

     margin-left: 5px;
     color: #2D3C77;
     font-size: 17px;
     position: relative;
     bottom: 5px;

  }

</style>
