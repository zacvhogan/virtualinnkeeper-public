(function (){

    const interactForm = document.querySelector("#interactForm");
    const interactButton = document.querySelector("#interactButton");
    const responseBox = document.querySelector("#response"); 
    const form = document.querySelector("#interactForm");
    const userInput = document.querySelector("#userInput");


    // On Click
    interactButton.addEventListener("click", event => {
        event.preventDefault();   
        
        
        // Render query input to DOM
        let responseElement = document.createElement("p");     
        responseElement.classList.add("message-query");   
        responseElement.innerHTML = document.querySelector("#userInput").value;
        responseBox.appendChild(responseElement);  

        // Clear user input
        userInput.value = "";

        // Build formData object for use in later POST request
        let formData = buildQuery();
    

        // Send query to API and store result  
        let response = sendQuery(formData);

        // TODO: Render response result in viewport
        // Store response in user's localstorage for later use in building response history for chat
        // Show error if query incorrect
     
    });


    function buildQuery(){    

        // Add quote marks to userInput
        userInput.value = `"${userInput.value}"`;
        // Create formData object and pass in submitted form results
        let formData = new FormData(form);        
        // Add query type identifier to formData
        formData.append("queryType", "interact");    
        
        // send input to sessionStorage
        sessionStorage.setItem("VInnInteract_" + sessionStorage.getItem("messageCount") + "_q" ,formData.get('userInput'));
        
        // Increment messageCount in sessionStorage
        let messageCount = sessionStorage.getItem("messageCount");
        messageCount++;
        sessionStorage.setItem("messageCount", messageCount);        

        // sessionStorage to array and sorted
        let messageHistory = []
        for(let i = 0; i < sessionStorage.length; i++){                               
            messageHistory.push([sessionStorage.key(i), sessionStorage.getItem(sessionStorage.key(i))]);  
        }
        messageHistory.sort();

        // compile ALL sessionStorage to send in query        
        for(let i = 0; i < messageHistory.length; i++){                               
            formData.append(messageHistory[i, 0], messageHistory[i, 1]);  
        }        
        formData.append("messageHistory", messageHistory);
        console.log(messageHistory);

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