(function(){

    const generateForm = document.querySelector("#generateForm");
    const generateButton = document.querySelector("#generateButton");



    generateButton.addEventListener("click", event => {
        event.preventDefault();            

        // Generate formData object for use in later POST request
        let formData = buildQuery();

        // Perform query to API and store result  
        let response = sendQuery(formData);

        // Render response result in viewport
        // Store response in user's localstorage for later use in building response history for chat
        // Show error if query incorrect
        //processResponse(response);
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
        let data = await response.json();  
        
        processResponse(data);
             
    }



    function processResponse(data){

        // Send API query message (data[0]) to sessionstorage
        sessionStorage.setItem("VInnInteract_0_q", data[0]);

        // Send API query response (data[1]) to sessionstorage
        sessionStorage.setItem("VInnInteract_0_r", data[1])

        // Initialise message count in sessionStorage
        sessionStorage.setItem("messageCount", 0);

        // DOM elements
        let responseBox = document.querySelector("#response");       
        let responseElement = document.createElement("p");  
        responseElement.classList.add("message-response");

        // Set responseElement text to data[1] (API response)
        responseElement.innerHTML = data[1];
        responseBox.appendChild(responseElement);   
        
    }

}());