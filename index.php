<?php 
// Clear all cookie every time website launched
// TODO: Rework cookie system
//  Maybe try assigning a session ID to each cookie for this session to diff between prev. session cookies?
  if (isset($_SERVER['HTTP_COOKIE'])) {
    $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
    foreach($cookies as $cookie) {
        $parts = explode('=', $cookie);
        $name = trim($parts[0]);
        setcookie($name, '', time()-1000);
        setcookie($name, '', time()-1000, '/');
    }
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Virtual Innkeeper - an AI NPC tool for tabletop games</title>
    <link rel="stylesheet" href="styles/style.css">
  </head>


  <body>
    <h1>Virtual Innkeeper Alpha</h1>

    <!-- Form managed by npcGenerate.js -->
    <form name="generate" id="generateForm" method="post">        
        First Name
        <input type="text" name="firstname" required>
        <button type="button" class="generate-form__button-random">Randomise</button><br>
        Last Name
        <input type="text" name="lastname">
        <button type="button" class="generate-form__button-random">Randomise</button><br>
        Species
        <select name="species">
          <option value="human">Human</option>
          <option value="elf">Elf</option>
          <option value="dwarf">Dwarf</option>
          <option value="gnome">Gnome</option>
          <option value="halfelf">Half Elf</option>
          <option value="halfling">Halfling</option>
          <option value="dragonborn">Dragonborn</option>
          <option value="halforc">Half-Orc</option>
          <option value="tiefling">Tiefling</option>
          <option value="orc">Orc</option>
          <option value="goblin">Goblin</option>
        </select><br>        
        Job
        <input type="text" name="job" required>
        <button type="button" class="generate-form__button-random">Randomise</button><br>
        Visual Description:<br>
        <textarea type="text" name="description" rows="6"></textarea><br>
        Personality<br>
        <textarea type="text" name="personality" rows="6"></textarea><br>   
        <input type="submit" value="Generate" id="generateButton">
    </form>

    <!-- Initial contents managed by npcGenerate.js -->
    <div id="npc-container">
        <!-- Content changes managed by npcInteract.js -->
        <div id="response"><p></p></div>
    </div>
        <!-- NPC image and interactions rendered here -->

        <!-- Form managed by npcInteract.js -->
        <form name="interact" id="interactForm" method="post" class="hidden">
            <input type="text" name="userInput" id="userInput" placeholder="Say something">
            <input type="submit" value="Speak" id="interactButton">
        </form>
    </div>      
    

</body>

<script src="scripts/buttonCreateNPC.js" type="application/javascript"></script>
<script src="scripts/buttonInteractNPC.js" type="application/javascript"></script>
<script src="scripts/buttonRandomizeAttribute.js" type="application/javascript"></script>
<script src="scripts/getPHPSessionVars.js" type="application/javascript"></script>


</html>