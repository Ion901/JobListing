
//password visibility toggle
document.addEventListener('DOMContentLoaded', () => {

    let passwordTogglers = document.querySelectorAll('i[data-target]');

    passwordTogglers.forEach(toggle => {
        toggle.addEventListener('click', function (e) {
            const input = document.querySelector(this.dataset.target)
            if (!input) return;

            toggle.classList.toggle('fa-eye');
            input.type = input.type === "password" ? "text" : "password";
            e.stopPropagation();
        })

    })

    //employer/resume toggle
    let typeOfAcc = document.querySelectorAll("[type='radio'][data-target]");
    let employerData = document.querySelector('#employer-data');

    function toggleEmployer() {
        let selected = document.querySelector("[type = 'radio'][name = 'role']:checked");

        if (!selected)
            return;

        if (selected.dataset.target === "#employer-data") {
            employerData.classList.remove('hidden')
        } else {
            employerData.classList.add('hidden')
        }

    }

    toggleEmployer()

    typeOfAcc.forEach(Acc => {
        Acc.addEventListener('change', toggleEmployer)
    })
})



