(function (){

    const interactForm = document.querySelector(".interact-form");
    const interactButton = document.querySelector(".interact-form__submit");
    const responseBox = document.querySelector("#response"); 
    const form = document.querySelector(".interact-form");
    const userInput = document.querySelector(".interact-form__input");


    // On Click
    interactButton.addEventListener("click", event => {
        event.preventDefault();   
        
        
        // Render query input to DOM
        let responseElement = document.createElement("p");     
        responseElement.classList.add("message-query");   
        responseElement.innerHTML = document.querySelector(".interact-form__input").value;
        responseBox.appendChild(responseElement);  
        
        // Build formData object for use in later POST request
        let formData = buildQuery();
    
        // Send query to API and store result  
        sendQuery(formData);

        // TODO: Render response result in viewport
        // Store response in user's localstorage for later use in building response history for chat
        // Show error if query incorrect
     
    });


    function buildQuery(){    

        // Add quote marks to userInput
        userInput.value = `"${userInput.value}"`;
        // Create formData object and pass in submitted form results
        let formData = new FormData(form);        
        userInput.value = "";

        // Add query type identifier to formData
        formData.append("queryType", "interact");    
        
        return formData;
       
    }


    async function sendQuery(formData){

        

        // Fetch data from backend via FEController
        
        let response = await fetch("./php/frontController.php", {method: 'POST', body: formData});
        let data = await response.text();  
        
        // Append returned data response to DOM #response object
        processResponse(data);
        
    }
        


    function processResponse(data){       

        let responseElement = document.createElement("p");     
        responseElement.classList.add("message-response");   
        responseElement.innerHTML = data;
        responseBox.appendChild(responseElement);  
        console.log(data);
        // add response to sessionStorage

    }



}());