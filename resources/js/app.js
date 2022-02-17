
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

window.onload = () => {

    const menuBtn = document.querySelector("#menuBtn");

    if (!menuBtn) return;

    menuBtn.onclick = ()=>{
            const navToolBar = document.querySelector("#navToolBar");

            if (navToolBar.classList.contains("h-0")){
                navToolBar.classList.remove("h-0");
                navToolBar.classList.add("h-fit");
            } else {
                navToolBar.classList.remove("h-fit");
                navToolBar.classList.add("h-0");
            }
        }
}