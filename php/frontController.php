<?php

foreach($_POST as $key=>$value){
    $_POST[$key] = htmlspecialchars($value);    
}



switch ($_POST['queryType']) {
    case 'generate':
        include "../../../private/virtualinnkeeper/php/generateNPC.php";
        break;

    case 'interact':
        include "../../../private/virtualinnkeeper/php/interactNPC.php";
        break;
    
    default:
        echo "Invalid queryType";
}





?>