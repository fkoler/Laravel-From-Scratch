const hamburger = document.querySelector("#hamburger");
const menu = document.querySelector("#mobile-menu");

if (hamburger && menu) {
    hamburger.addEventListener("click", () => {
        menu.classList.toggle("hidden");
    });
}
