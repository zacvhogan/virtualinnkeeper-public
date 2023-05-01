(function (){

    const interactForm = document.querySelector("#interactForm");
    const interactButton = document.querySelector("#interactButton");
    const responseBox = document.querySelector("#response"); 
    const form = document.querySelector("#interactForm");
    const userInput = document.querySelector("#userInput");


    // On Click
    interactButton.addEventListener("click", event => {
        event.preventDefault();   
        
        // Generate formData object for use in later POST request
        let formData = buildQuery();

        // Render query to DOM
        let responseElement = document.createElement("p");     
        responseElement.classList.add("message-query");   
        responseElement.innerHTML = document.querySelector("#userInput").value;
        responseBox.appendChild(responseElement);  

        // Clear user input
        userInput.value = "";

        // Send query to API and store result  
        let response = sendQuery(formData);

        // TODO: Render response result in viewport
        // Store response in user's localstorage for later use in building response history for chat
        // Show error if query incorrect
        processResponse(response);
    });


    function buildQuery(){    
        
        userInput.value = `"${userInput.value}"`;
        let formData = new FormData(form);        
        formData.append("queryType", "interact");
        return formData;
    }


    async function sendQuery(formData){
        // Fetch data from backend via FEController
            // Note: Fetch + POST uses a FormData object rather than a GET query string URL
        let response = await fetch("./php/frontController.php", {method: 'POST', body: formData});
        let data = await response.text();  
        
        // Append returned data response to DOM #response object
              
        let responseElement = document.createElement("p");     
        responseElement.classList.add("message-response");   
        responseElement.innerHTML = data;
        responseBox.appendChild(responseElement);  
        console.log(data);
    }
        


    function processResponse(response){

        
    }



}());