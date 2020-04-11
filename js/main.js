let flag = true;

$('.burger').click(function () {
    if(flag === true) {
        $(this).toggleClass('visible');
        $(".menu_mobile").fadeToggle(300, 'swing', function () {
            flag = true;
        });
        flag = false;
    }
});

let slides = document.getElementsByClassName('slider-item');
let dots = document.querySelectorAll('.circles_box > div');
let count = 0;
for (let el of document.getElementsByClassName('arrow')) {
    el.addEventListener('click', function () {
        if (this.classList.contains('left')) {
            if (count === 0) {
                slides[count].classList.toggle('show');
                dots[count].classList.toggle('checked')
                count = 2;
                slides[count].classList.toggle('show');
                dots[count].classList.toggle('checked')
            } else {
                slides[count].classList.toggle('show');
                dots[count].classList.toggle('checked')
                slides[count-1].classList.toggle('show');
                dots[count-1].classList.toggle('checked')
                count--;
            }
        } else if (this.classList.contains('right')) {
            if (count === 2) {
                slides[count].classList.toggle('show');
                dots[count].classList.toggle('checked')
                count = 0;
                slides[count].classList.toggle('show');
                dots[count].classList.toggle('checked')
            } else {
                slides[count].classList.toggle('show');
                dots[count].classList.toggle('checked')
                slides[count+1].classList.toggle('show');
                dots[count+1].classList.toggle('checked')
                count++;
            }
        }
    });
}

var radio = document.getElementsByName('attraction');
for (let i = 0; i < radio.length; i++) {
    radio[i].addEventListener("click", function () {
        var svg = document.getElementById(radio[i].value);
        for (let i = 0; i < radio.length; i++) {
            document.getElementById(radio[i].value).classList.remove('new-svg');
        }
        svg.classList.add('new-svg');
    });
}

for (let el of document.querySelectorAll('div.request table td label')) {
    el.addEventListener('click', function () {
        this.parentElement.parentElement.classList.toggle('checked');
    });
}