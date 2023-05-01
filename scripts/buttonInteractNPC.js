(function (){

    const interactForm = document.querySelector("#interactForm");
    const interactButton = document.querySelector("#interactButton");


    interactButton.addEventListener("click", event => {
        event.preventDefault();   
        
        // Generate formData object for use in later POST request
        let formData = buildQuery();

        // Perform query to API and store result  
        let response = sendQuery(formData);

        // Render response result in viewport
        // Store response in user's localstorage for later use in building response history for chat
        // Show error if query incorrect
        processResponse(response);
    });


    function buildQuery(){    
        let form = document.querySelector("#interactForm");
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
        let responseBox = document.querySelector("#response");       
        let responseElement = document.createElement("p");        
        responseElement.innerHTML = data;
        responseBox.appendChild(responseElement);  
    }
        


    function processResponse(response){

        
    }
}());