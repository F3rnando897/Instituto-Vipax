const sidebar = document.querySelector("aside");
const sandwich = document.querySelector("aside .sandwich i");

sandwich.addEventListener("click", e => {
    sidebar.classList.toggle("open");
})