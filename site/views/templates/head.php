<?php

   function mainMap()
   {

     return "mediaServer";

   }

   $main_map = mainMap();


   function renderTemplate($default)
   {

      require '../mediaServer/site/views/templates/appTemplates/'.$default.'.php';

   }


 ?>


<meta charset="utf-8" />
<meta name="keywords" content=""/>
<meta name="description" content=""/>
<meta name="author" content="Yanick 007"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="../<?php echo $main_map; ?>/public/css/templates.css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.3/TweenMax.min.js"></script>
<script src="../<?php echo $main_map; ?>/public/js/jsLibs/utils.js"></script>
<script src="../<?php echo $main_map; ?>/public/js/jsLibs/templatesLogic.js"></script>
<!--<script src="public/js/jquery.js"></script>
<script src="public/js/jquery-ui/jquery-ui.js"></script>-->
