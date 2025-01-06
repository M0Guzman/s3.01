const modal_aide = document.getElementById("modal_aide")
const Button_Aide = document.getElementById("Button_Aide")


Button_Aide.onclick = Open_Close_Modal;


function Open_Close_Modal() {
    if (modal_aide.classList.contains('hidden')) {
        modal_aide.classList.remove("hidden");
        Button_Aide.textContent = "X";
    }
    else {
        modal_aide.classList.add("hidden");
        Button_Aide.textContent = "?";
    }    
}
