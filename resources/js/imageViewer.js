//selectez toate imaginile din pagina
//le adaug src-urile intr-un array de img
//indexul current in care ma aflu

let photos = document.querySelectorAll('[data-name="imgGallery"]')
let nextbtn = document.querySelector('#next');
let prevbtn = document.querySelector('#prev');
let imgContainer = document.getElementById('modal-container');
let thumbnail = document.querySelector('.thumbnail');
let close = document.querySelector('#close')


let current = 0;

photos.forEach(function (photo, index) {
    createThumbnail(photo, index);
    photo.addEventListener('click', function () {
        goTo(index);
    })
})

function goTo(index) {

    current = index;
    arata();
}

function prev() {
    current = current - 1;

    if (current < 0) {
        current = photos.length - 1;
    }
    arata();
}

function next() {
    current = current + 1;

    if (current === photos.length) {
        current = 0;
    }
    arata();
}
//next btn
nextbtn.addEventListener('click', function () {
    next();
})
//prev btn
prevbtn.addEventListener('click', function () {
    prev();
})

function createThumbnail(photo, index) {
    let div = document.createElement('div');
    div.classList.add('w-12','h-12')
    let img = document.createElement('img');
    img.dataset.name = 'imgGallery';
    img.classList.add('w-full','h-full','object-cover')
    img.src = photo.src;
    div.appendChild(img);
    thumbnail.appendChild(div);

    div.addEventListener('click', () => goTo(index))
}

//esc key to exit
document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape') {
        imgContainer.classList.add('hidden');
        document.body.classList.remove('overflow-hidden')
    }
})

//close buton
close.addEventListener('click', function () {
    imgContainer.classList.add('hidden');
    document.body.classList.remove('overflow-hidden');
})

function arata() {
    imgContainer.classList.remove('hidden');
    document.body.classList.add('overflow-hidden');

    let image = document.getElementById('img-modal');

    image.classList.remove('opacity-100', 'scale-100');
    image.classList.add('opacity-0', 'scale-95');

    image.src = photos[current].src;

    image.onload = () => {

        setTimeout(() => {
            image.classList.remove('opacity-90', 'scale-97');
            image.classList.add('opacity-100', 'scale-100');
        },200)
    };

}

imgContainer.addEventListener('click', function (e) {
    if (e.target === imgContainer) {
        imgContainer.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    };
});


