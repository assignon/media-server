$(function(){

     $("#addEvents").click(function(e)
     {

        let tempName = e.target.id;
        let receiver = document.querySelector('.agenda');
      //  $('.agendaHeader').hide('slow');
        Utils.hideTemplate("calendarTemplate .agenda");
        Utils.loadTemplate('addEventTemplate');

     })

     let addNewEvent = document.querySelector('#addNewEvent');
     addNewEvent.addEventListener('click', EventsTemplate.addEvents)

     $("#backToEvent").click(function(){

       Utils.hideTemplate('addEventTemplate');
       Utils.loadTemplate('calendarTemplate .agenda');

     });



     $('.daysNumb').click(function(e){

       let tempName = "displayEvent";
       let receiver = document.querySelector('.agenda');
       let xhr = Utils.initXHR();

       Utils.hideTemplate('calendarTemplate .agenda');
       Utils.loadTemplate('displayEventTemplate');

       let dateNumb = e.currentTarget.childNodes[1].textContent;
       let curMonth = e.currentTarget.childNodes[1].className;

       EventsTemplate.displayEvents(dateNumb, curMonth);


     })


})
