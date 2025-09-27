import { Slide } from "./Entities.js";

const galeria = document.querySelector('#carrossel div');
const mainSlide = new Slide(galeria, 3000, true);
galeria.addEventListener('click', mainSlide.pause);