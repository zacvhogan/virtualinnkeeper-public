// Script finds all 'Randomize' buttons and configures them to fetch
// pick at random an option from a .txt file and assign that option
// to the relevant input field.
//
// HTML should be organised:
//  
//  <input type="text" name="FIELDNAME">
//  <button type="button" class="generate-form__button-random">Randomise</button>
//
// .txt file containing option list should be located at ROOT/data/character_generation/FIELDNAME.txt



let buttonsArray = document.querySelectorAll(".generate-form__button-random");

// Get button input field identifier using buttonsArray[0].previousElementSibling.name

buttonsArray.forEach(button => buttonInit(button));

function buttonInit(button){   
    button.addEventListener("click", event => buttonClick(button));
}


async function buttonClick(button){
    
    let field = button.previousElementSibling;

    // Open file that contains list of options        
    let response = await fetch(`data/character_generation/${field.name}.txt`);
    let optionList = await response.text();
    console.log(response);

    // Option list to array
    optionList = optionList.split("\n");   
    console.log(optionList);
    
    // Pick an option at random
    // TODO: rewrite this to ensure previous value changes EVERY time - no duplicates. Will result in better UX.
    let index = Math.round(Math.random() * (optionList.length - 1));
    let option = optionList[index];   
   
    // Assign option to input field
    field.value = option;
       
}