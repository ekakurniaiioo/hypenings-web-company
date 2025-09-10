document.addEventListener("DOMContentLoaded", () => {
    // === MOBILE MENU ===
    const btn = document.getElementById("mobile-menu-button");
    const menu = document.getElementById("mobile-menu");

    if (btn && menu) {
        let isMobileMenuOpen = false;
        btn.addEventListener("click", () => {
            if (!isMobileMenuOpen) {
                menu.classList.remove("hidden");
                requestAnimationFrame(() => {
                    menu.classList.remove("opacity-0", "scale-95", "max-h-0");
                    menu.classList.add("opacity-100", "scale-100", "max-h-96");
                });
            } else {
                menu.classList.remove("opacity-100", "scale-100", "max-h-96");
                menu.classList.add("opacity-0", "scale-95", "max-h-0");
                setTimeout(() => menu.classList.add("hidden"), 300);
            }
            isMobileMenuOpen = !isMobileMenuOpen;
        });
    }

    // === SLIDER AUTO ===
    const slides = document.querySelectorAll("#slider .slide");
    let current = 0;
    const showSlide = (i) => {
        slides.forEach((slide, idx) => {
            slide.classList.toggle("opacity-100", idx === i);
            slide.classList.toggle("pointer-events-auto", idx === i);
            slide.classList.toggle("opacity-0", idx !== i);
            slide.classList.toggle("pointer-events-none", idx !== i);
        });
    };
    if (slides.length) {
        showSlide(current);
        setInterval(() => {
            current = (current + 1) % slides.length;
            showSlide(current);
        }, 8000);
    }

    // === DROPDOWN ===
    function setupDropdown(buttonId, menuId, arrowId) {
        const btn = document.getElementById(buttonId);
        const menu = document.getElementById(menuId);
        const arrow = document.getElementById(arrowId);
        if (btn && menu && arrow) {
            btn.addEventListener("click", (e) => {
                e.stopPropagation();
                menu.classList.toggle("hidden");
                arrow.classList.toggle("rotate-180");
            });
            document.addEventListener("click", (e) => {
                if (!btn.contains(e.target) && !menu.contains(e.target)) {
                    menu.classList.add("hidden");
                    arrow.classList.remove("rotate-180");
                }
            });
        }
    }
    setupDropdown(
        "desktopContentTypeButton",
        "desktopContentTypeMenu",
        "desktopContentTypeArrow"
    );
    setupDropdown(
        "mobileContentTypeButton",
        "mobileContentTypeMenu",
        "mobileContentTypeArrow"
    );

    // === GENERIC DROPDOWN ===
    const buttonDropdown = document.getElementById("dropdownButton");
    const menuDropdown = document.getElementById("dropdownMenu");
    const arrowDropdown = document.getElementById("dropdownArrow");
    if (buttonDropdown && menuDropdown && arrowDropdown) {
        buttonDropdown.addEventListener("click", () => {
            menuDropdown.classList.toggle("hidden");
            arrowDropdown.classList.toggle("rotate-180");
        });
        document.addEventListener("click", (e) => {
            if (
                !buttonDropdown.contains(e.target) &&
                !menuDropdown.contains(e.target)
            ) {
                menuDropdown.classList.add("hidden");
                arrowDropdown.classList.remove("rotate-180");
            }
        });
    }

    // === SLIDER SCROLL BTN ===
    const slider = document.getElementById("sliderContainer");
    const nextBtn = document.getElementById("nextBtn");
    const prevBtn = document.getElementById("prevBtn");
    if (slider && nextBtn && prevBtn) {
        nextBtn.addEventListener("click", () =>
            slider.scrollBy({ left: 320, behavior: "smooth" })
        );
        prevBtn.addEventListener("click", () =>
            slider.scrollBy({ left: -320, behavior: "smooth" })
        );
    }

    // === PAGINATION AJAX ===
    document.body.addEventListener("click", (e) => {
        if (e.target.closest(".pagination-link")) {
            e.preventDefault();
            const url = e.target
                .closest(".pagination-link")
                .getAttribute("href");
            fetch(url)
                .then((res) => res.text())
                .then((html) => {
                    const doc = new DOMParser().parseFromString(
                        html,
                        "text/html"
                    );
                    document.querySelector("#article-container").innerHTML =
                        doc.querySelector("#article-container").innerHTML;
                    window.scrollTo({ top: 0, behavior: "smooth" });
                });
        }
    });

    // === INTERSECTION OBSERVER SHORTS ===
    const shortsObserver = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.remove(
                        "opacity-0",
                        "translate-x-10"
                    );
                    entry.target.classList.add("opacity-100", "translate-x-0");
                }
            });
        },
        { threshold: 0.2 }
    );
    const target = document.getElementById("shortsSection");
    if (target) shortsObserver.observe(target);

    // === NAVBAR HIDE/SHOW ===
    let lastScrollTop = 0;
    const navbar = document.getElementById("navbar");
    if (navbar) {
        window.addEventListener("scroll", () => {
            const scrollTop =
                window.pageYOffset || document.documentElement.scrollTop;
            navbar.style.transform =
                scrollTop > lastScrollTop
                    ? "translateY(-100%)"
                    : "translateY(0)";
            lastScrollTop = Math.max(scrollTop, 0);
        });
    }

    // === SHORTS SLIDER CUSTOM ===
    const shortsSlider = document.getElementById("sliderWrapper");
    const shortsSlides = shortsSlider ? shortsSlider.children : [];
    let currentIndex = 0;
    const totalSlides = shortsSlides.length;
    const nextSlideBtn = document.getElementById("nextSlide");
    const prevSlideBtn = document.getElementById("prevSlide");
    function updateShortsSlider() {
        if (totalSlides === 0) return;
        const width = shortsSlides[0].clientWidth;
        shortsSlider.style.transform = `translateX(-${width * currentIndex}px)`;
    }
    if (shortsSlider && nextSlideBtn && prevSlideBtn) {
        nextSlideBtn.addEventListener("click", () => {
            currentIndex =
                currentIndex < totalSlides - 1 ? currentIndex + 1 : 0;
            updateShortsSlider();
        });
        prevSlideBtn.addEventListener("click", () => {
            currentIndex =
                currentIndex > 0 ? currentIndex - 1 : totalSlides - 1;
            updateShortsSlider();
        });
    }

    // === LOAD MORE ARTICLES  ===
    let offset = 5;
    const loadBtn = document.getElementById("loadMoreArticlesButton");
    const wrapper = document.getElementById("moreArticlesWrapper");

    if (loadBtn && wrapper) {
        const loadUrl = loadBtn.dataset.url;

        loadBtn.addEventListener("click", function () {
            loadBtn.disabled = true;
            loadBtn.textContent = "Loading...";

            fetch(loadUrl + "?offset=" + offset)
                .then((res) => res.json())
                .then((data) => {
                    if (!data.hasMore) {
                        loadBtn.disabled = true;
                        loadBtn.textContent = "No more articles";
                        loadBtn.classList.add(
                            "opacity-60",
                            "cursor-not-allowed"
                        );
                    } else {
                        wrapper.insertAdjacentHTML("beforeend", data.html);
                        offset += 5;
                        loadBtn.disabled = false;
                        loadBtn.textContent = "Load More";
                    }
                });
        });
    }

});
