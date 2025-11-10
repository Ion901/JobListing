
document.addEventListener('DOMContentLoaded', () => {

    let passwordTogglers = document.querySelectorAll('[type="checkbox"][data-target]');
    passwordTogglers.forEach(toggle => {
        toggle.addEventListener('click', function (e) {
            const input = document.querySelector(this.dataset.target)
            if (!input) return;

            input.type = input.type === "password" ? "text" : "password";
            e.stopPropagation();
        })
    })

})
