
<div class="editEventCont">

   

</div>


<style media="screen">

  .editEventCont
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


  .editEventHeader
  {

     width: 90%;
     height: 15%;
     display: flex;
     flex-direction: row;
     justify-content: space-between;
     align-items: center;

  }


  .editEventHeader img
  {

     width: 20px;
     height: 20px;
     cursor: pointer;

  }


  .editEventHeader img:hover
  {

    transition: transform 0.2s linear 0s;
    transform: scale(1.2,1.2);

  }


  .editEventHeader h2
  {

      text-align: center;
      color: #F65F59;

  }


  #editNewEvent
  {

     text-align: center;
     color: #F65F59;
     cursor: pointer;

  }


  #editNewEvent:hover
  {

    transition: transform 0.2s linear 0s;
    transform: scale(1.2,1.2);

  }


  .editEventBody
  {

     width: 100%;
     height: 55%;
     display: flex;
     justify-content: flex-end;
     align-items: flex-end;

  }


  .editEventForm
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

     pediting: 20px;

  }


  #allDays input, #allDays label
  {

    width: auto;
    height: auto;

  }


  .editEventFooter
  {

   width: 90%;
   height: 30%;
   display: flex;
   flex-direction: column;
   justify-content: flex-start;
   align-items: flex-start;

  }


  .editEventFooter p
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
