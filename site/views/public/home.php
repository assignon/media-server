<!DOCTYPE html>
<html>
    <head>
      <?php require "../mediaServer/site/views/templates/head.php"; ?>
      <?php require "../".$main_map."/site/models/home_model.php"; ?>
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

                  <div class="weatherInfo">

                      <?php renderTemplate("homeWeather");?>

                  </div>

                  <div class="rssFeed">
                    <!-- start feedwind code -->
                    <script type="text/javascript" src="https://feed.mikle.com/js/fw-loader.js" data-fw-param="61452/"></script> <!-- end feedwind code --></iframe>

                  </div>

               </div>

               <div class="calendar">

                  <?php renderTemplate("calendar");?>

               </div>

           </div>

        </header>

        <footer>

        </footer>

    </body>

</html>
