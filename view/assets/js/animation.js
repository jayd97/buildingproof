const contain=document.querySelector('.container1'); 
             
for (var i=0; i<=20; i++){
const blocks=document.createElement('div');
blocks.classList.add('block');
contain.appendChild(blocks);
}
function animateBlocks(){
    anime({
        targets: '.block', 
        translateX: function(){
            return anime.random (-600, 600)
        },
        translateY: function(){
            return anime.random (-220, 220)
        },
        scale: function(){
            return anime.random (1, 3)
        },
        easing: 'linear',
        duration: 3000,
        delay:anime.stagger(10),
        complete:animateBlocks,

    })
}
animateBlocks();

let next = document.querySelector('.next')
let prev = document.querySelector('.prev')

next.addEventListener('click', function(){
    let items = document.querySelectorAll('.item')
    document.querySelector('.slide').appendChild(items[0])
})

prev.addEventListener('click', function(){
    let items = document.querySelectorAll('.item')
    document.querySelector('.slide').prepend(items[items.length - 1]) // here the length of items = 6
})