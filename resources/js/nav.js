document.addEventListener("DOMContentLoaded", () => {
    const btn = document.getElementById("mobile-menu-button");
    const menu = document.getElementById("mobile-menu");
    let isOpen = false;

    btn.addEventListener("click", () => {
        btn.classList.toggle("hamburger-active");

        if (!isOpen) {
            menu.classList.remove("hidden");
            setTimeout(() => {
                menu.classList.remove("opacity-0", "scale-95", "max-h-0");
                menu.classList.add("opacity-100", "scale-100", "max-h-[500px]");
            }, 10);
        } else {
            menu.classList.remove("opacity-100", "scale-100", "max-h-[500px]");
            menu.classList.add("opacity-0", "scale-95", "max-h-0");
            setTimeout(() => {
                menu.classList.add("hidden");
            }, 400); // ← bisa diganti biar lebih lama
        }

        isOpen = !isOpen;
    });
});

document.addEventListener("DOMContentLoaded", () => {
    const slides = document.querySelectorAll("#slider .slide");
    let current = 0;

    function showSlide(index) {
        slides.forEach((slide, i) => {
            slide.classList.remove("opacity-100");
            slide.classList.add("opacity-0");
            if (i === index) {
                slide.classList.remove("opacity-0");
                slide.classList.add("opacity-100");
            }
        });
    }

    setInterval(() => {
        current = (current + 1) % slides.length;
        showSlide(current);
    }, 5000); // Ganti tiap 5 detik
});

const button = document.getElementById("dropdownButton");
const menu = document.getElementById("dropdownMenu");
const arrow = document.getElementById("dropdownArrow");

let isOpen = false;

button.addEventListener("click", () => {
    isOpen = !isOpen;
    menu.classList.toggle("hidden");
    arrow.classList.toggle("rotate-180");
});

// Optional: klik di luar untuk menutup dropdown
document.addEventListener("click", (e) => {
    if (!button.contains(e.target) && !menu.contains(e.target)) {
        menu.classList.add("hidden");
        arrow.classList.remove("rotate-180");
        isOpen = false;
    }
});

const slider = document.getElementById('sliderContainer');
const nextBtn = document.getElementById('nextBtn');
const prevBtn = document.getElementById('prevBtn');

nextBtn.addEventListener('click', () => {
    slider.scrollBy({ left: 320, behavior: 'smooth' });
});

prevBtn.addEventListener('click', () => {
    slider.scrollBy({ left: -320, behavior: 'smooth' });
});


const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.remove('opacity-0', 'translate-x-10');
            entry.target.classList.add('opacity-100', 'translate-x-0');
        }
    });
}, {
    threshold: 0.2
});

const target = document.getElementById('shortsSection');
if (target) observer.observe(target);

    document.addEventListener('DOMContentLoaded', function () {
        // Event delegation untuk pagination
        document.body.addEventListener('click', function (e) {
            if (e.target.closest('.pagination-link')) {
                e.preventDefault();
                const url = e.target.closest('.pagination-link').getAttribute('href');

                fetch(url, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.text())
                .then(html => {
                    document.querySelector('#articles').innerHTML = html;
                    window.history.pushState({}, '', url);
                });
            }
        });
    });