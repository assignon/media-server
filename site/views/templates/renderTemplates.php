<?php

function renderDynamicTemplate()
{

     if(isset($_GET['template_name']))
     {

        $template_name = htmlentities(htmlspecialchars($_GET['template_name']));

        require '../mediaServer/site/views/templates/appTemplates/'.$template_name.'.php';

     }else{



     }

}
//renderDynamicTemplate();

 ?>
