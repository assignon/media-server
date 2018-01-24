<!DOCTYPE html>
<html>
    <head>
      <?php require "../mediaServer/site/views/templates/head.php"; ?>
      <?php  require "../mediaServer/site/models/home_model.php"; ?>
      <link rel="stylesheet" type="text/css" href="../<?php echo $main_map; ?>/public/css/home.css"/>
      <link href="https://fonts.googleapis.com/css?family=Amita" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Arbutus+Slab" rel="stylesheet">
      <script type="text/javascript" src="../<?php echo $main_map; ?>/public/js/home.js"></script>
      <title>Home</title>
    </head>
    <body>

        <header>

           <div class="homeCore">

               <div class="nieuws">

                  <div class="weatherInfo gsapAnim">

                    <?php renderTemplate("homeWeather");?>

                  </div>

                  <div class="rssFeed gsapAnim">
                    <!-- start feedwind code -->
                    <script type="text/javascript" src="https://feed.mikle.com/js/fw-loader.js" data-fw-param="61452/"></script> <!-- end feedwind code --></iframe>

                  </div>

               </div>

               <div class="calendar">

                 <div class="calendarHeaders">

                   <div class="templateContainers" id="addEventTemplate"><?php renderTemplate("addEvents");?></div>
                   <div class="templateContainers" id="displayEventTemplate"><?php renderTemplate("displayEvent");?></div>
                   <div class="templateContainers" id="eventDetailTemplate"><?php renderTemplate("eventsDetails");?></div>
                   <div class="templateContainers" id="editEventTemplate"><?php renderTemplate("editEvent");?></div>
                   <div class="templateContainers" id="calendarTemplate"><?php renderTemplate("calendar");?></div>

                 </div>

                 <?php renderTemplate("tools");?>

               </div>

           </div>

        </header>

        <footer>

        </footer>

    </body>

</html>
