import './bootstrap';

import.meta.glob([
    '../images/**'
]); // importa dinamic fisiele cand avem nevoie


document.documentElement.classList.toggle(
    "dark",
    localStorage.theme === "dark" ||
    (!("theme" in localStorage) && window.matchMedia("(prefers-color-scheme: dark)").matches),
);
// Whenever the user explicitly chooses light mode
localStorage.theme = "light";
// Whenever the user explicitly chooses dark mode
localStorage.theme = "dark";
// Whenever the user explicitly chooses to respect the OS preference
localStorage.removeItem("theme");



const navbar = document.getElementById('navbar');
let lastScroll = window.pageYOffset;


window.addEventListener('scroll', () => {
    const currentScroll = window.pageYOffset;

    if (currentScroll <= navbar.offsetHeight) {
        navbar.classList.remove('-translate-y-full');
    }else if(currentScroll < lastScroll){
        navbar.classList.remove('-translate-y-full');
    } else {
        navbar.classList.add('-translate-y-full');

    }

    lastScroll = currentScroll;
});


