document.addEventListener("DOMContentLoaded", () => {
    // === MOBILE MENU ===
    const btn = document.getElementById("mobile-menu-button");
    const menu = document.getElementById("mobile-menu");

    if (!btn || !menu) return;

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

            setTimeout(() => {
                menu.classList.add("hidden");
            }, 300);
        }

        isMobileMenuOpen = !isMobileMenuOpen;
    });

    const slides = document.querySelectorAll("#slider .slide");
    let current = 0;

    function showSlide(index) {
        slides.forEach((slide, i) => {
            if (i === index) {
                slide.classList.add("opacity-100", "pointer-events-auto");
                slide.classList.remove("opacity-0", "pointer-events-none");
            } else {
                slide.classList.remove("opacity-100", "pointer-events-auto");
                slide.classList.add("opacity-0", "pointer-events-none");
            }
        });
    }

    if (slides.length > 0) {
        showSlide(current);
        setInterval(() => {
            current = (current + 1) % slides.length;
            showSlide(current);
        }, 8000);
    }

    console.log("Slider JS aktif, jumlah slide:", slides.length);

    function setupDropdown(buttonId, menuId, arrowId) {
        const btn = document.getElementById(buttonId);
        const menu = document.getElementById(menuId);
        const arrow = document.getElementById(arrowId);

        if (btn && menu && arrow) {
            btn.addEventListener("click", function (e) {
                e.stopPropagation();
                menu.classList.toggle("hidden");
                arrow.classList.toggle("rotate-180");
            });

            document.addEventListener("click", function (e) {
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

    const button = document.getElementById("dropdownButton");
    const menuDropdown = document.getElementById("dropdownMenu");
    const arrow = document.getElementById("dropdownArrow");

    let isOpen = false; // <- Tambahan penting!

    if (button && menuDropdown && arrow) {
        button.addEventListener("click", () => {
            isOpen = !isOpen;
            menuDropdown.classList.toggle("hidden");
            arrow.classList.toggle("rotate-180");
        });

        document.addEventListener("click", (e) => {
            if (
                !button.contains(e.target) &&
                !menuDropdown.contains(e.target)
            ) {
                menuDropdown.classList.add("hidden");
                arrow.classList.remove("rotate-180");
                isOpen = false;
            }
        });
    }

    // === SLIDER SCROLL ===
    const slider = document.getElementById("sliderContainer");
    const nextBtn = document.getElementById("nextBtn");
    const prevBtn = document.getElementById("prevBtn");

    if (slider && nextBtn && prevBtn) {
        nextBtn.addEventListener("click", () => {
            slider.scrollBy({ left: 320, behavior: "smooth" });
        });

        prevBtn.addEventListener("click", () => {
            slider.scrollBy({ left: -320, behavior: "smooth" });
        });
    }

    // === PAGINATION ===
    document.body.addEventListener("click", (e) => {
        if (e.target.closest(".pagination-link")) {
            e.preventDefault();
            const url = e.target
                .closest(".pagination-link")
                .getAttribute("href");

            fetch(url)
                .then((res) => res.text())
                .then((html) => {
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, "text/html");
                    const newContent = doc.querySelector("#article-container");

                    // Ganti konten, BUKAN ditambah
                    document.querySelector("#article-container").innerHTML =
                        newContent.innerHTML;

                    // Scroll to top (opsional)
                    window.scrollTo({ top: 0, behavior: "smooth" });
                });
        }
    });

    // === INTERSECTION OBSERVER ===
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
        {
            threshold: 0.2,
        }
    );

    const target = document.getElementById("shortsSection");
    if (target) shortsObserver.observe(target);

    // === NAVBAR SHOW/HIDE ON SCROLL ===
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
            lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
        });
    }

    // === SHORTS SLIDER CUSTOM ===
    const shortsSlider = document.getElementById("sliderWrapper");
    const shortsSlides = shortsSlider ? shortsSlider.children : [];
    const totalSlides = shortsSlides.length;
    let currentIndex = 0;

    const nextSlideBtn = document.getElementById("nextSlide");
    const prevSlideBtn = document.getElementById("prevSlide");

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

    function updateShortsSlider() {
        if (totalSlides === 0) return;
        const width = shortsSlides[0].clientWidth;
        shortsSlider.style.transform = `translateX(-${width * currentIndex}px)`;
    }

    let page = 2;
    let loading = false;

    document
        .getElementById("loadMoreArticlesButton")
        .addEventListener("click", function () {
            loadMoreArticles(); 
        });

    async function loadMoreArticles() {
        if (loading) return;
        loading = true;

        const res = await fetch(`/articles/topic/load-more?page=${page}`, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector(
                    'meta[name="csrf-token"]'
                ).content,
            },
            body: JSON.stringify({
                exclude_ids: shownArticleIds,
            }),
        });

        const html = await res.text();
        document
            .querySelector("#moreArticlesWrapper")
            .insertAdjacentHTML("beforeend", html);

        page++;
        loading = false;
    }
});
