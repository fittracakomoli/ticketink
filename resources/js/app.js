import "./bootstrap";
import "flowbite";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

document.addEventListener("DOMContentLoaded", function () {
    const carouselWrapper = document.getElementById("carousel-wrapper");
    const prevBtn = document.getElementById("prev-btn");
    const nextBtn = document.getElementById("next-btn");
    const indicatorsContainer = document.getElementById("indicators");

    // Dapatkan semua slide
    const slides = Array.from(carouselWrapper.children);
    const slideCount = slides.length;
    let currentIndex = 0;

    // Buat indikator dots
    for (let i = 0; i < slideCount; i++) {
        const dot = document.createElement("button");
        dot.classList.add(
            "w-3",
            "h-3",
            "rounded-full",
            "transition-colors",
            "duration-300"
        );
        if (i === 0) {
            dot.classList.add("bg-white");
        } else {
            dot.classList.add("bg-white/50");
        }
        dot.addEventListener("click", () => {
            goToSlide(i);
        });
        indicatorsContainer.appendChild(dot);
    }

    const indicators = Array.from(indicatorsContainer.children);

    // Fungsi untuk pindah ke slide tertentu
    function goToSlide(index) {
        // Pastikan index berada dalam rentang yang valid
        if (index < 0) {
            index = slideCount - 1; // Loop ke slide terakhir
        } else if (index >= slideCount) {
            index = 0; // Loop ke slide pertama
        }

        // Geser wrapper
        carouselWrapper.style.transform = `translateX(-${index * 100}%)`;
        currentIndex = index;
        updateIndicators();
    }

    // Fungsi untuk update indikator aktif
    function updateIndicators() {
        indicators.forEach((dot, index) => {
            if (index === currentIndex) {
                dot.classList.add("bg-white");
                dot.classList.remove("bg-white/50");
            } else {
                dot.classList.add("bg-white/50");
                dot.classList.remove("bg-white");
            }
        });
    }

    // Event listener untuk tombol
    prevBtn.addEventListener("click", () => {
        goToSlide(currentIndex - 1);
    });

    nextBtn.addEventListener("click", () => {
        goToSlide(currentIndex + 1);
    });

    // Bonus: Auto-play
    setInterval(() => {
        goToSlide(currentIndex + 1);
    }, 5000); // Ganti slide setiap 5 detik

    // Inisialisasi awal
    updateIndicators();
});
