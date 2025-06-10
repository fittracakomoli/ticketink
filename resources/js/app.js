import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

document.addEventListener("DOMContentLoaded", function () {
    const navbar = document.getElementById("navbar");
    window.addEventListener("scroll", function () {
        if (window.scrollY > 50) {
            navbar.classList.add(
                "bg-white",
                "shadow",
                "backdrop-blur",
                "text-gray-900"
            );
            navbar.classList.remove("bg-transparent", "text-gray-50");
        } else {
            navbar.classList.remove(
                "bg-white",
                "shadow",
                "backdrop-blur",
                "text-gray-900"
            );
            navbar.classList.add("bg-transparent", "text-gray-50");
        }
    });
});
