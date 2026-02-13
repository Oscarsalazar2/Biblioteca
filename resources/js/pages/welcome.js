document.addEventListener("DOMContentLoaded", () => {
    const menuToggle = document.getElementById("menu-toggle");
    const mobileMenu = document.getElementById("mobile-menu");
    const header = document.querySelector("header");

    if (menuToggle && mobileMenu) {
        menuToggle.addEventListener("click", () => {
            mobileMenu.classList.toggle("hidden");

            const icon = menuToggle.querySelector("i");
            if (!icon) return;

            if (mobileMenu.classList.contains("hidden")) {
                icon.classList.remove("fa-times");
                icon.classList.add("fa-bars");
            } else {
                icon.classList.remove("fa-bars");
                icon.classList.add("fa-times");
            }
        });

        const mobileLinks = mobileMenu.querySelectorAll("a");
        mobileLinks.forEach((link) => {
            link.addEventListener("click", () => {
                if (window.innerWidth < 768) {
                    mobileMenu.classList.add("hidden");
                    const icon = menuToggle.querySelector("i");
                    if (!icon) return;
                    icon.classList.remove("fa-times");
                    icon.classList.add("fa-bars");
                }
            });
        });
    }

    const currentYear = document.getElementById("current-year");
    if (currentYear)
        currentYear.textContent = new Date().getFullYear().toString();

    document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
        anchor.addEventListener("click", (event) => {
            const href = anchor.getAttribute("href");
            if (!href) return;
            const targetId = href.substring(1);
            const targetElement = document.getElementById(targetId);
            if (targetElement) {
                event.preventDefault();
                window.scrollTo({
                    top: targetElement.offsetTop - 80,
                    behavior: "smooth",
                });
            }
        });
    });

    if (header) {
        window.addEventListener("scroll", () => {
            if (window.scrollY > 100) header.classList.add("shadow-lg");
            else header.classList.remove("shadow-lg");
        });
    }
});
