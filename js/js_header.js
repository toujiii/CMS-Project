let menuBurger = document.getElementById("menuBurger");

function openMenuBurger(){
    menuBurger.style.visibility = "visible";
    menuBurger.style.opacity = "1";
    document.body.style.overflow = 'hidden';
}

function closeMenuBurger(){
    menuBurger.style.visibility = "hidden";
    menuBurger.style.opacity = "0";
    document.body.style.overflow = '';
}