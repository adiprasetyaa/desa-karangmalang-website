import "./bootstrap";
import TTL from "./TTL";
import showToast from "./showToast";
import "quill/dist/quill.snow.css";
import Alpine from "alpinejs";

window.Alpine = Alpine;
window.showToast = showToast;
window.TTL = TTL;
Alpine.start();

console.log("App Start");
