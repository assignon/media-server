$(function(){

     $("#addEvents").click(function(e)
     {

        let tempName = e.target.id;
        let receiver = document.querySelector('.agenda');
        $('.agendaHeader').hide('slow');

        let xhr = Utils.initXHR();


        xhr.onreadystatechange = function() {

          if (this.readyState == 4 && this.status == 200) {

                receiver.innerHTML = xhr.responseText;

                let addNewEvent = document.querySelector('.agenda #addNewEvent');
                addNewEvent.addEventListener('click', EventsTemplate.addEvents)

                $("#backToEvent").click(backToHome);

             }

          };


         xhr.open('GET','../mediaServer/site/views/templates/appTemplates/'+tempName+'.php',true);
         xhr.send();


     })


     $('.daysNumb').click(function(e){

       let tempName = "displayEvent";
       let receiver = document.querySelector('.agenda');
       let xhr = Utils.initXHR();

       xhr.onreadystatechange = function() {

         if (this.readyState == 4 && this.status == 200) {

               receiver.innerHTML = xhr.responseText;

               let dateNumb = e.currentTarget.childNodes[1].textContent;
               let curMonth = e.currentTarget.childNodes[1].className;

               EventsTemplate.displayEvents(dateNumb, curMonth);


            }

         };


        xhr.open('GET','../mediaServer/site/views/templates/appTemplates/'+tempName+'.php',true);
        xhr.send();

     })


     function backToHome()
     {

        let receiver = document.querySelector('.agenda');
        let tempName = 'eventHome';
        let xhr = Utils.initXHR();


        xhr.onreadystatechange = function() {

          if (this.readyState == 4 && this.status == 200) {

                receiver.innerHTML = xhr.responseText;

              //alert(xhr.responseText);

             }

          };


         xhr.open('GET','../mediaServer/site/models/'+tempName+'.php',true);
         xhr.send();

     }


})
