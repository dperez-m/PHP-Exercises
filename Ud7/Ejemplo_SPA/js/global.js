
const base_url = "http://localhost:63342/controller/FrontController.php";

window.onload = onceLoaded;


function onceLoaded() {

    console.debug("window loaded");
    document.querySelector('#formLogin').onsubmit = loginJSON;
    
    getRoles();
}

