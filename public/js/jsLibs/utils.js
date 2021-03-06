Utils = {

  initXHR: function()
  {

    let xhr;
    if (window.XMLHttpRequest) {
         // code for IE7+, Firefox, Chrome, Opera, Safari
          xhr = new XMLHttpRequest();
      } else {
         // code for IE6, IE5
           xhr = new ActiveXObject("Microsoft.XMLHTTP");
      }

      return xhr;

  },


   sendTemplateName: function(tempName, receiver)
   {

        let xhr = Utils.initXHR();


        xhr.onreadystatechange = function() {

          if (this.readyState == 4 && this.status == 200) {

                receiver.innerHTML = xhr.responseText;

              //alert(xhr.responseText);

             }

          };


         xhr.open('GET','../mediaServer/site/models/'+tempName+'.php',true);
         xhr.send();

   },


   loadTemplate: function(templateName)
   {

      $('#'+templateName).show('slow');
      $('#'+templateName).css('zIndex',5);

   },


   hideTemplate: function(templateName)
   {

      $('#'+templateName).hide("slow");
      $('#'+templateName).css('zIndex',1);
   },


   goHomeEvent: function()
   {

      Utils.sendTemplateName('calendar', 'calendar');

   },


   weatherApi: function()
   {

       let xhr = Utils.initXHR();
       let tempDateInfo = document.querySelector('.weatherInfo');
       let temperatureDeg = document.querySelector('.temperature h1');
       let temperatureName = document.querySelector('.tempName');

       xhr.onreadystatechange = function() {

         if (this.readyState == 4 && this.status == 200) {

              let result = JSON.parse(xhr.responseText);
              temperatureDeg.innerHTML = result.current.temp_c+'°';
              temperatureName.innerHTML = result.current.condition.text;
              tempDateInfo.style.backgroundImage = "url("+result.current.condition.icon+")";

            }

         };


        xhr.open('GET','https://api.apixu.com/v1/current.json?key=6e0a9a8f2fd144aaa11105306181801&q=Amsterdam',true);
        xhr.send();


   },


   parse_month:function(month)
   {

       monthArr = ['','January','Februari','March','April','May','June','July','August','September','Oktober','November','December'];

       return monthArr[month];

   },


   singleNumber:function(month)
   {
      let getMonth = month.slice(3,5);
      if(getMonth == '01')
      {

        getMonth = '1';

      }else if (getMonth == '02') {

        getMonth = '2';

      }else if (getMonth == '03') {

         getMonth = '3';

      }else if (getMonth == '04') {

        getMonth = '4';

      }else if (getMonth == '05') {

         getMonth = '5';

      }else if (getMonth == '06') {

         getMonth = '6';

      }else if (getMonth == '07') {

         getMonth = '7';

      }else if (getMonth == '08') {

         getMonth = '8';

      }else if (getMonth == '09') {

         getMonth = '9';

      }

      return getMonth;

   }


}
