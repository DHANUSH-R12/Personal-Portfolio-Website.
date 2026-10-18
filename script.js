const menuBtn = document.getElementById("menuBtn");
const navMenu = document.getElementById("navMenu");

menuBtn.addEventListener("click", () => {
    navMenu.classList.toggle("show");
});

document.querySelectorAll("#navMenu a").forEach(link => {
    link.addEventListener("click", () => navMenu.classList.remove("show"));
});
