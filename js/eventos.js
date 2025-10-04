const eventos = document.querySelectorAll("#eventos .eventos")
for (let i = 0; i < eventos.length; i++) {
  const btn = eventos[i].querySelector(".btn-saiba-mais")
  const modal = eventos[i].querySelector("dialog")

  btn.onclick = function () {
    modal.showModal()
  }
}

document.addEventListener("keyup", e => {
  console.log(e);
  if (e.key == "Escape" && window.location.search != "") {
    window.location.search = "";
  }
})