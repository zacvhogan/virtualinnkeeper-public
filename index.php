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

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Quantico:wght@700&display=swap" rel="stylesheet">


  </head>


  <body>
    <div class="nav_parent">
      <nav>      
          <h1 class="nav__title"><a href="/virtualinnkeeper"><span class="title__virtual">Virtual</span>Innkeeper&nbsp;<span class="title__version">Alpha</span></a></h1>
          <ul class="nav__nav-list">
            <li class="nav-list__item"><a href="https://github.com/users/zacvhogan/projects/3/views/2" target="_blank">Future</a></li>
            <li class="nav-list__item"><a href="https://github.com/zacvhogan/virtualinnkeeper-public" target="_blank">Github</a></li>
          </ul>     
      </nav>  
    </div>

    <div id="app"> 
      <!-- Form managed by npcGenerate.js -->

      <h2>Introduce your players to...</h2>
      <form name="generate" class="generate-form" method="post"> 
        <div class="generate-form__field-container">  

          <div>
            <label for="firstname">First Name</label><br>
            <div class="field-container__input">
              <input type="text" name="firstname" id="firstname" autocomplete="off" placeholder="Eg, Bilbo" required>
              <button type="button" class="generate-form__button-random"><img src="assets/icon/dice-three-solid.svg"></button>
            </div>
          </div>

          <div>
            <label for="lastname">Last Name</label><br>
            <div class="field-container__input">
              <input type="text" name="lastname" id="lastname" autocomplete="off" placeholder="Eg, Weasley">
              <button type="button" class="generate-form__button-random"><img src="assets/icon/dice-three-solid.svg"></button><br>
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
            <label for="job">Job</label><br>
            <div class="field-container__input">
              <input type="text" name="job" id="job" autocomplete="off" placeholder="Eg, Ranger" required>
              <button type="button" class="generate-form__button-random"><img src="assets/icon/dice-three-solid.svg"></button><br>
            </div>
          </div>

          <div>
            <label for="gamerole">Game role</label><br>
            <div class="field-container__input">
              <input type="text" name="gamerole" id="gamerole" autocomplete="off" placeholder="Eg, to sell a cursed artifact." required>            
            </div>
          </div>

          <div>
            <label for="description">Visual Description</label><br>
            <textarea type="text" name="description" id="description" autocomplete="off" placeholder="Eg, tall, muscular. Wears steel plate armour."rows="6"></textarea><br>
          </div>
          <div>
            <label for="personality"> Personality</label><br>
            <textarea type="text" name="personality" id="personality" autocomplete="off" placeholder="Eg, honourable. Scared of spiders." rows="6"></textarea><br>   
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
          <div class="field-container__input">
              <input type="text" name="userInput" class="interact-form__input" placeholder='Eg, I shout "surprise!" and attack the troll with my nasty knife.'>
              <input type="submit" value="Interact" class="interact-form__submit">
          </div>
          </form>
      </div>      
    
    </div> <!-- /app -->
    

  </body>

  <script src="scripts/buttonCreateNPC.js" type="application/javascript"></script>
  <script src="scripts/buttonInteractNPC.js" type="application/javascript"></script>
  <script src="scripts/buttonRandomizeAttribute.js" type="application/javascript"></script>
</html>