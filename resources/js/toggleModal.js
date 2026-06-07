document.addEventListener('DOMContentLoaded', () => {

    let sendCV = document.querySelector('button[data-target]')

    sendCV.addEventListener('click', function (e) {
        const input = document.querySelector(this.dataset.target)
        if (!input) return;

        if (input.id === "modal-send") {
            input.classList.remove('hidden')
            document.body.classList.add('overflow-hidden')
        }
        e.stopPropagation();
    })

    const myDiv = document.getElementById('modal-send');
    document.body.addEventListener('click', function (e) {
        

        if (!myDiv.contains(e.target) || e.target.id === "close-modal") {
            this.querySelector('#modal-send').classList.add('hidden');
            document.body.classList.remove('overflow-hidden')
        };
    })
})
