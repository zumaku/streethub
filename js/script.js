// BIG 3 CLICK
const big3Cards = document.querySelector('.big3 .container .cards');
big3Cards.addEventListener('click', function(e){
    if(e.target.classList.contains('btnArrow')){
        var btnInfo = e.target;
        var streeterName = btnInfo.previousElementSibling;
        var imgCard = btnInfo.parentElement;
        var icon = imgCard.nextElementSibling.children[0];

        btnInfo.classList.add('dnone');
        streeterName.classList.add('dnone');
        imgCard.classList.add('imgSize');
        icon.classList.remove('dnone');
    }
});


// SLIDE PRODAK
const slider = document.querySelector('div.slider');
var x = 0, y = 1;
slider.addEventListener('click', (e)=>{
    var cards = slider.querySelector('div.cards');
    if(e.target.classList.contains('next')){
        if( x!=4 && y!=5 ){
            cards.children[x+2].classList.remove('dnone');
            cards.children[y+2].classList.remove('dnone');
            cards.children[x].classList.add('dnone');
            cards.children[y].classList.add('dnone');
            x = x + 2;
            y = y + 2;
        } else{
            cards.children[x].classList.add('dnone');
            cards.children[y].classList.add('dnone');
            x = 0; y = 1;
            cards.children[x].classList.remove('dnone');
            cards.children[y].classList.remove('dnone');
        }
    }
    if(e.target.classList.contains('previous')){
        if( x!=0 && y!=1 ){
            cards.children[x-2].classList.remove('dnone');
            cards.children[y-2].classList.remove('dnone');
            cards.children[x].classList.add('dnone');
            cards.children[y].classList.add('dnone');
            x = x - 2;
            y = y - 2;
        } else{
            cards.children[x].classList.add('dnone');
            cards.children[y].classList.add('dnone');
            x = 4; y = 5;
            cards.children[x].classList.remove('dnone');
            cards.children[y].classList.remove('dnone');
        }
    }
});