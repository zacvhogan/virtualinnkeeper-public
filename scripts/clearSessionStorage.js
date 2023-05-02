// Clear session storage on load/reload/refresh/whatever else
// Erases chat log and makes room for new log
// TODO: Refine to only clear sessionStorage for elements related to chat history, leave other keys intact.

addEventListener("load", event => {
    sessionStorage.clear();    
});