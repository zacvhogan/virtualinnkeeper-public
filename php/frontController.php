<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// send request to backend
// expect to recieve back 1x image, and 1x chat message

// Check for request type
// then...


// Temporary - just handle requests as though GENERATE requests

$name = $_POST['name'];
$species = $_POST['species'];
$job = $_POST['job'];
$description = $_POST['description'];
$personality = $_POST['personality'];

$generate_npc_message = "
    All responses should be made as though spoken by the following character.
    You are $name, a $job of the species $species. 
    Your visual description is $description, and your personality is $personality.
";




?>



