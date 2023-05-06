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
    <script src="https://kit.fontawesome.com/a53c6f17ad.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles/style.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

  </head>


  <body>
    <h1>Virtual Innkeeper Alpha</h1>

    <!-- Form managed by npcGenerate.js -->
    <form name="generate" class="generate-form" method="post"> 
      <div class="generate-form__field-container">       
        <div>
          <label for="firstname">First Name</label><br>
          <div class="field-container__input">
            <input type="text" name="firstname" id="firstname" placeholder="Eg, Bilbo" required>
            <button type="button" class="generate-form__button-random"><i class="fa fa-dice-three"></i></button>
          </div>
        </div>
        <div>
          <label for="lastname">Last Name</label><br>
          <div class="field-container__input">
            <input type="text" name="lastname" id="lastname" placeholder="Eg, Weasley">
            <button type="button" class="generate-form__button-random"><i class="fa fa-dice-three"></i></button><br>
          </div>
        </div>
        <div>
          <label for="species">Species</label><br>
          <div class="field-container__input">
            <select name="species" id="species">
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
          </div>     
        </div>

        <div>
          <label for="gender">Gender</label><br>
          <div class="field-container__input">
            <select name="gender" id="gender">
              <option value="nonbinary">Non-binary</option>
              <option value="female">Female</option>
              <option value="male">Male</option>             
            </select><br>   
          </div>     
        </div>

        <div>
          <label for="job">Job</label><br>
          <div class="field-container__input">
            <input type="text" name="job" id="job" placeholder="Eg, Ranger" required>
            <button type="button" class="generate-form__button-random"><i class="fa fa-dice-three"></i></button><br>
          </div>
        </div>

        <div>
          <label for="gamerole">Game role</label><br>
          <div class="field-container__input">
            <input type="text" name="gamerole" id="gamerole" placeholder="Eg, to trick the player into buying a cursed artifact." required>            
          </div>
        </div>

        <div>
          <label for="description">Visual Description</label><br>
          <textarea type="text" name="description" id="description" placeholder="Eg, Tall, muscular, with a big beard. Wears shorts and a big brown jacket."rows="6"></textarea><br>
        </div>
        <div>
          <label for="personality"> Personality</label><br>
          <textarea type="text" name="personality" id="personality" placeholder="Eg, determined, but easily scared. Quick to anger at the mention of their employer." rows="6"></textarea><br>   
        </div>  
      </div>
        <input type="submit" value="Generate" class="generate-form__submit">
    </form>

    <!-- Initial contents managed by npcGenerate.js -->
    <div id="npc-container">
        <!-- Content changes managed by npcInteract.js -->
        <div id="response"></div>
    </div>
        <!-- NPC image and interactions rendered here -->

        <!-- Form managed by npcInteract.js -->
        <form name="interact" method="post" class="interact-form hidden">
            <input type="text" name="userInput" class="interact-form__input" placeholder='Eg, I shout "surprise!" and attack the troll with my nasty knife.'>
            <input type="submit" value="Interact" class="interact-form__submit">
        </form>
    </div>      
    

    

</body>

  <script src="scripts/buttonCreateNPC.js" type="application/javascript"></script>
  <script src="scripts/buttonInteractNPC.js" type="application/javascript"></script>
  <script src="scripts/buttonRandomizeAttribute.js" type="application/javascript"></script>
</html>