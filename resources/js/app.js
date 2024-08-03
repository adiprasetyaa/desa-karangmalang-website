import "./bootstrap";
import "quill/dist/quill.snow.css";
import Alpine from "alpinejs";

window.Alpine = Alpine;
import Quill from "quill";

let quill = new Quill("#editor", {
    theme: "snow",
});
Alpine.start();
