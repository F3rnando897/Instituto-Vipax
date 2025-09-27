const eventos = document.querySelectorAll("#eventos .eventos")
for(let i =0; i<eventos.length; i++){
const btn = eventos[i].querySelector("button")
const modal = eventos[i].querySelector("dialog")

btn.onclick = function (){

modal.showModal()
}

}