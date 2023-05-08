(function(){

    const generateForm = document.querySelector(".generate-form");
    const generateButton = document.querySelector(".generate-form__submit");



    generateButton.addEventListener("click", event => {
      
        event.preventDefault(); 
             
        
        // Hide generate form        
        document.querySelector(".generate-form").classList.add("fade-out");
        setTimeout(()=>{
            document.querySelector(".generate-form").remove();
        } , "600");

        document.querySelector("#npc-container").classList.add("fade-in");
        

        setTimeout(()=>{
            document.querySelector("#response").innerHTML = "Summoning your NPC from the void. This may take a minute...";
        } , "700");
        

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

        document.querySelector("#response").innerHTML = "";

        console.log(data);
        // DOM elements
        let responseBox = document.querySelector("#response");       
        let responseElement = document.createElement("p");  
        responseElement.classList.add("message-response");

        // Set responseElement text to data[1] (API response)
        responseElement.innerHTML = data;
        responseBox.appendChild(responseElement);   
        document.querySelector(".interact-form").classList.add("visible");
        document.querySelector(".interact-form").classList.remove("hidden");
        
    }

}());