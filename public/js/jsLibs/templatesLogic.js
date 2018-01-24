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
              Utils.hideTemplate('addEventTemplate');
              Utils.loadTemplate('calendarTemplate .agenda');

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
                    Utils.hideTemplate('displayEventTemplate');
                    Utils.loadTemplate('eventDetailTemplate');

                    EventsTemplate.displayEventContent(eventName);

                 })

               }

          }

       };

       xhr.open('GET','../mediaServer/site/models/ajax_requests/displayEvents.php?dateNumb='+dateNumb+'&curMonth='+parsedCurMonth,true);
       xhr.send();

   },




   displayEventContent: function(eventName)
   {

     let xhr = Utils.initXHR();

     xhr.onreadystatechange = function() {

       if (this.readyState == 4 && this.status == 200) {

             let evtContent = document.querySelector('.evtContent');
             evtContent.innerHTML = xhr.responseText;
             let response = xhr.responseText;

             EventsTemplate.editEvent();
             EventsTemplate.deleteEvent(eventName);

             $("#backToEventsDetails").click(Route.backToEvents);

             console.log(response);

          }

       };

       xhr.open('GET','../mediaServer/site/models/ajax_requests/displayEventsContent.php?eventName='+eventName,true);
       xhr.send();

   },



   editEvent: function()
   {

       $("#editEvent").click(function(e){

             Route.goToEditEvent();

             let editEventCont = document.querySelector('.editEventCont');

             let xhr = Utils.initXHR();

              let curEvtName = e.currentTarget.parentNode.parentNode.childNodes[3].childNodes[1].textContent;

             xhr.onreadystatechange = function() {

               if (this.readyState == 4 && this.status == 200) {

                     editEventCont.innerHTML = xhr.responseText;

                     EventsTemplate.eventNewData(curEvtName);// update function

                     $("#editBackToEvent").click(function(){

                          Route.backToEventContent('editEventTemplate');

                      })

                  }

               };


              xhr.open('GET','../mediaServer/site/models/ajax_requests/editEvent.php?curEvtName='+curEvtName,true);
              xhr.send();

        })

     },


     eventNewData: function(curEvtName)
     {


        $('#editNewEvent').click(function()
        {

            let eventName = document.getElementById("eventNameUpdate").value;
            let eventLocation = document.getElementById("eventLocationUpdate").value;
            let eventStart = document.getElementById("eventStartUpdate").value;
            let eventEnd = document.getElementById("eventEndUpdate").value;
            let eventTimeStart = document.getElementById("eventTimeStartUpdate").value;
            let eventTimeEnd = document.getElementById("eventTimeEndUpdate").value;
            let allDay = document.getElementById("allDayUpdate");
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
                    Route.backToEventContent('editEventTemplate');
                    EventsTemplate.displayEventContent(curEvtName);

                 }

              };


             if(eventName != "" || eventLocation != "" || eventStart != "" || eventEnd != "" || eventTimeStart != "" || eventTimeEnd != "")
             {

               xhr.open('GET','../mediaServer/site/models/ajax_requests/updateEvent.php?eventName='+eventName+'&eventLocation='+eventLocation+'&eventStart='+eventStart+'&eventEnd='+eventEnd+'&eventTimeStart='+eventTimeStart+'&eventTimeEnd='+eventTimeEnd+'&allDayVal='+allDayVal+'&invites='+invites+'&curEvtName='+curEvtName,true);
               xhr.send();

             }else{

               alert("One of many of the fields is empty...");

             }

        })

     },



    deleteEvent: function(evtName)
    {

        $("#deleteEvt").click(function(e){

          let xhr = Utils.initXHR();

          xhr.onreadystatechange = function() {

            if (this.readyState == 4 && this.status == 200) {

                  alert(xhr.responseText);
                  let deletedEvent = e.currentTarget.parentNode.parentNode;
                  //$(deletedEvent).toggle('explode');

                  Utils.hideTemplate('eventDetailTemplate');
                  Utils.loadTemplate('displayEventTemplate');

                  $(".evtDetails").html('No event available...!');

               }

            };


           xhr.open('GET','../mediaServer/site/models/ajax_requests/deleteEvent.php?curEvtName='+evtName,true);
           xhr.send();

        })

    }

}
