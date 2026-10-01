//slider cst
const track = document.querySelector('.slider-track');
const prevBtn = document.querySelector('.slider-prev');
const nextBtn = document.querySelector('.slider-next');

const card = track.querySelector('.testimonial-card');
const step = () => card.offsetWidth + 20;
let counter = 0;

const cards = Array.from(track.querySelectorAll('.testimonial-card'));
const realCount = cards.length;
cards.forEach( card => {
    track.appendChild(card.cloneNode(true))
});

const wrapper = document.querySelector('.testimonial-wrapper');
//const maxCounter = Math.ceil(track.children.length - wrapper.clientWidth / step());

function moveTo(smooth = true){
     track.style.transition = smooth ? 'transform 0.4s ease' : 'none'; 
     const move = counter * step();
      track.style.transform = `translateX(-${move}px)`;
      updateDots();
}
function nextSlide() {
    if (counter >= realCount) {
        counter=0;
        moveTo(false);
        void track.offsetWidth;
    }
    counter++;
    moveTo();
    
}
function prevSlide(){
 if (counter <= 0) {
        counter =realCount;
        moveTo(false);
         void track.offsetWidth;
    }
    counter--;
    moveTo();
}

nextBtn.addEventListener('click',nextSlide);
prevBtn.addEventListener('click', prevSlide);

let autoTimer = setInterval(nextSlide, 6000);   

wrapper.addEventListener('mouseenter',() => clearInterval(autoTimer) );
wrapper.addEventListener('mouseleave', () => {
    autoTimer = setInterval(nextSlide,6000);
});

const dotsContainer = document.querySelector('.slider-dots');

for(let i = 0; i < realCount; i++){
    const dot = document.createElement('button');
    dot.classList.add('dot');
    if(i==0) dot.classList.add('active');
    dot.addEventListener('click', () =>{
       // counter = i;
       const targets=[i, i + realCount, i-realCount];
       const valid = targets.filter(t => t >= 0 && t< realCount*2);
       const closest = valid.reduce((best,t) =>{
            return Math.abs(t-counter) < Math.abs(best-counter) ? t:best;
       });
       counter = closest;
        moveTo();
    });
    dotsContainer.appendChild(dot);
}
function updateDots(){
    const dots = dotsContainer.querySelectorAll('.dot');
    dots.forEach((dot, i) => {
            dot.classList.toggle('active', i === counter % realCount);
    } );
}



let startX=0;
wrapper.addEventListener('touchstart',(e)=>{
    startX = e.touches[0].clientX;
    clearInterval(autoTimer);
   
});
wrapper.addEventListener('touchend',(e)=>{
    const diff = startX - e.changedTouches[0].clientX;
    if(diff>50) nextSlide();
    else if (diff<-50) prevSlide();
     autoTimer = setInterval(nextSlide, 6000);
});

window.addEventListener('resize', () => {
    moveTo(false);   // 0.4s animation kyon nahi — resize me jump smooth nahi hona chahiye
});

//slidr custom