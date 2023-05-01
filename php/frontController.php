<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


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