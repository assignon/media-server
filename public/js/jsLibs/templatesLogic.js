EventsTemplate = {


  checkBoxs: function(target)
  {

     let boxs = document.querySelectorAll('.'+target);
     let boxsArr = [];
     for (var i = 0; i < boxs.length; i++) {

        let boxArr = boxs[i];

        let boxValue = boxArr.value;
        if(boxArr.checked)
        {

          boxsArr.push(boxValue);

        }else{

            boxsArr.slice(boxsArr.indexOf(boxValue), 1);

        }

     }
     return boxsArr;

  },


   addEvents: function()
   {

       let eventName = document.getElementById("eventName").value;
       let eventLocation = document.getElementById("eventLocation").value;
       let eventStart = document.getElementById("eventStart").value;
       let eventEnd = document.getElementById("eventEnd").value;
       let eventTimeStart = document.getElementById("eventTimeStart").value;
       let eventTimeEnd = document.getElementById("eventTimeEnd").value;
       let allDay = document.getElementById("allDay");
       let allDayVal ;

       //let dayStart = eventStartD.slice(0,2);
       //let dayEnd = eventEndD.slice(0,2);

       //let curYearStart = eventStartD.slice(6,10);
       //let curYearEnd = eventEndD.slice(6,10);


      // let eventStartS = Utils.parse_month(Utils.singleNumber(eventStartD));
       //let eventEndS = Utils.parse_month(Utils.singleNumber(eventEndD));

       //let = eventStart = dayStart+'-'+eventStartS+'-'+curYearStart;
       //let = eventEnd = dayEnd+'-'+eventEndS+'-'+curYearEnd;


      if(allDay.checked)
      {

          allDayVal = allDay.value;

      }else{

        allDayVal = "";

      }

      let invites = EventsTemplate.checkBoxs('invitedCheckbox');

      let xhr = Utils.initXHR();


      xhr.onreadystatechange = function() {

        if (this.readyState == 4 && this.status == 200) {

              //receiver.innerHTML = xhr.responseText;
              alert(xhr.responseText);
              Utils.goHomeEvent();

           }

        };


       if(eventName != "" && eventLocation != "" && eventStart != "" && eventEnd != "" && eventTimeStart != "" && eventTimeEnd != "")
       {

         xhr.open('GET','../mediaServer/site/models/ajax_requests/addEvent.php?eventName='+eventName+'&eventLocation='+eventLocation+'&eventStart='+eventStart+'&eventEnd='+eventEnd+'&eventTimeStart='+eventTimeStart+'&eventTimeEnd='+eventTimeEnd+'&allDayVal='+allDayVal+'&invites='+invites,true);
         xhr.send();

       }else{

         alert("You have to fill all the fields...");

       }



   },


   displayEvents: function(dateNumb, curMonth)
   {

     let xhr = Utils.initXHR();
     let months_name = ['','January','Februari','March','April','May','June','July','August','September','Oktober','November','December'];
     let parsedCurMonth;

     if(months_name.indexOf(curMonth) < 10)
     {

        parsedCurMonth = '0'+months_name.indexOf(curMonth);

     }else{

        parsedCurMonth = months_name.indexOf(curMonth);

     }


     xhr.onreadystatechange = function() {

       if (this.readyState == 4 && this.status == 200) {

             let results = xhr.responseText;
             let evtDetails = document.querySelector('.evtDetails');

             evtDetails.innerHTML = results;


             let evtCont = document.querySelectorAll('.evtCont');

             for (var i = 0; i < evtCont.length; i++) {

                 let evtContArr = evtCont[i];

                 evtContArr.addEventListener('click', function(e){

                    let eventName = e.currentTarget.childNodes[1].textContent;
                    EventsTemplate.displayEventTemplate(eventName);

                 })

               }

          }

       };

       xhr.open('GET','../mediaServer/site/models/ajax_requests/displayEvents.php?dateNumb='+dateNumb+'&curMonth='+parsedCurMonth,true);
       xhr.send();

   },




   displayEventTemplate: function(eventName)
   {

      let xhr = Utils.initXHR();
      let tempName = "eventsDetails";
      let receiver = document.querySelector('.agenda');

      xhr.onreadystatechange = function() {

        if (this.readyState == 4 && this.status == 200) {

              receiver.innerHTML = xhr.responseText;


              EventsTemplate.displayEventContent(eventName);


           }

        };


       xhr.open('GET','../mediaServer/site/views/templates/appTemplates/'+tempName+'.php',true);
       xhr.send();

   },




   displayEventContent: function(eventName)
   {

     let xhr = Utils.initXHR();

     xhr.onreadystatechange = function() {

       if (this.readyState == 4 && this.status == 200) {

             let evtContent = document.querySelector('.evtContent');
             evtContent.innerHTML = xhr.responseText;

             EventsTemplate.editEvent();
             EventsTemplate.deleteEvent(eventName);

          }

       };

       xhr.open('GET','../mediaServer/site/models/ajax_requests/displayEventsContent.php?eventName='+eventName,true);
       xhr.send();

   },



   editEvent: function()
   {

       $("#editEvent").click(function(e){

         let tempName = "editEvent";
         let receiver = document.querySelector('.agenda');
         let xhr = Utils.initXHR();

          let curEvtName = e.currentTarget.parentNode.parentNode.childNodes[3].childNodes[1].textContent;

         xhr.onreadystatechange = function() {

           if (this.readyState == 4 && this.status == 200) {

                 receiver.innerHTML = xhr.responseText;

                 EventsTemplate.eventNewData();// update function

              }

           };


          xhr.open('GET','../mediaServer/site/views/templates/appTemplates/'+tempName+'.php?curEvtName='+curEvtName,true);
          xhr.send();

       })

     },


     eventNewData: function()
     {


        $('#editNewEvent').click(function()
        {

            let eventName = document.getElementById("eventName").value;
            let eventLocation = document.getElementById("eventLocation").value;
            let eventStart = document.getElementById("eventStart").value;
            let eventEnd = document.getElementById("eventEnd").value;
            let eventTimeStart = document.getElementById("eventTimeStart").value;
            let eventTimeEnd = document.getElementById("eventTimeEnd").value;
            let allDay = document.getElementById("allDay");
            let allDayVal ;

            if(allDay.checked)
            {

                allDayVal = allDay.value;

            }else{

              allDayVal = "";

            }


            let invites = EventsTemplate.checkBoxs('invitedCheckbox');

            let xhr = Utils.initXHR();


            xhr.onreadystatechange = function() {

              if (this.readyState == 4 && this.status == 200) {

                    //receiver.innerHTML = xhr.responseText;
                    alert(xhr.responseText);
                   // Utils.goHomeEvent();

                 }

              };


             if(eventName != "" && eventLocation != "" && eventStart != "" && eventEnd != "" && eventTimeStart != "" && eventTimeEnd != "")
             {

               xhr.open('GET','../mediaServer/site/models/ajax_requests/updateEvent.php?eventName='+eventName+'&eventLocation='+eventLocation+'&eventStart='+eventStart+'&eventEnd='+eventEnd+'&eventTimeStart='+eventTimeStart+'&eventTimeEnd='+eventTimeEnd+'&allDayVal='+allDayVal+'&invites='+invites,true);
               xhr.send();

             }else{

               alert("You have to fill all the fields...");

             }

        })

     },



    deleteEvent: function(evtName)
    {

        $("#deleteEvt").click(function(){

          let xhr = Utils.initXHR();

          xhr.onreadystatechange = function() {

            if (this.readyState == 4 && this.status == 200) {

                  alert(xhr.responseText);

               }

            };


           xhr.open('GET','../mediaServer/site/models/ajax_requests/deleteEvent.php?curEvtName='+evtName,true);
           xhr.send();

        })

    }

}
