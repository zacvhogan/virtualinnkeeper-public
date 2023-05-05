(function(){

    const generateForm = document.querySelector("#generateForm");
    const generateButton = document.querySelector("#generateButton");



    generateButton.addEventListener("click", event => {
      
        event.preventDefault(); 
             
        
        // Hide generate form        
        document.querySelector("#generateForm").classList.add("hidden");
        document.querySelector("#response").innerHTML = "Summoning your NPC from the void. This may take a minute...";

        // Generate formData object for use in later POST request
        let formData = buildQuery();

        // Perform query to API and store result  
        sendQuery(formData);

        
    });


    function buildQuery(){
        let form = generateForm;
        let formData = new FormData(form);        
        formData.append("queryType", "generate");        
        return formData;
    }

    async function sendQuery(formData){
        console.log("send");

        // Fetch data from backend via FEController
            // Note: Fetch + POST uses a FormData object rather than a GET query string URL
        let response = await fetch("./php/frontController.php", {method: 'POST', body: formData});
        let data = await response.text();  
        
        processResponse(data);
             
    }



    function processResponse(data){

        
        console.log(data);
        // DOM elements
        let responseBox = document.querySelector("#response");       
        let responseElement = document.createElement("p");  
        responseElement.classList.add("message-response");

        // Set responseElement text to data[1] (API response)
        responseElement.innerHTML = data;
        responseBox.appendChild(responseElement);   
        document.querySelector("#interactForm").classList.add("visible");
        document.querySelector("#interactForm").classList.remove("hidden");
        
    }

}());