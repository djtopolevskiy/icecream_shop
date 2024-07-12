/*----------testimonial----------*/
const btn = document.getElementsByClassName('btn1');
const slide = document.getElementById('slide');


btn[0].onclick = function(){
    slide.style.transform = 'translateX(0px)';
    for(var i = 0; i < 4; i++){
        btn[i].classList.remove('active');
    }
    this.classList.add('active');
}

btn[1].onclick = function() {
    slide.style.transform = 'translateX(-800px)';
    for(var i = 0; i < 4; i++){
        btn[i].classList.remove('active');
    }
    this.classList.add('active');
}

btn[2].onclick = function() {
    slide.style.transform = 'translateX(-1600px)';
    for(var i = 0; i < 4; i++){
        btn[i].classList.remove('active');
    }
    this.classList.add('active');
}

btn[3].onclick = function() {
    slide.style.transform = 'translateX(-2400px)';
    for(var i = 0; i < 4; i++){
        btn[i].classList.remove('active');
    }
    this.classList.add('active');
}