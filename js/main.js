const menu = document.querySelector("header ul");
const sandwich = document.querySelector("header .sandwich i");

sandwich.addEventListener("click", e => {
    menu.classList.toggle("open");
})