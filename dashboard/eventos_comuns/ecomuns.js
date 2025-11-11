window.addEventListener("load", textareaAltura);


function textareaAltura() {
    document.querySelectorAll("textarea").forEach(t => {
    t.style.height = "auto";
    t.style.height = t.scrollHeight + "px";
    })
}