<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// send request to backend
// expect to recieve back 1x image, and 1x chat message

// Check for request type ($_POST['queryType'])
// then...
// Temporary - just handle requests as though GENERATE requests

// TODO: convert this into a POST request using CURL or similar - this will avoid any
// conflicting variable/function names, etc.
//include "../../../private/virtualinnkeeper/php/generateNPC.php";

include "../../../private/virtualinnkeeper/php/generateNPC.php";

?>