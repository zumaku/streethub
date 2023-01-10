// HUMBERGER MENU | NAVBAR
const check = document.querySelector('#humb #check');
const nav2 = document.querySelector('#nav2');
check.addEventListener('input', function(e){
    if(e.target.checked){
        nav2.setAttribute('style', 'display: flex');
    } else{
        nav2.setAttribute('style', 'display: none');
    }
});


// ARROW DROPDOWN
const arrow = document.querySelector('div#accountDd.account .arrow');
var x = true;
document.body.addEventListener('click', function(e){
    if( e.target == arrow && x == true){
        arrow.parentElement.nextElementSibling.setAttribute('style', 'display: flex');
        x = false;
    } else{
        arrow.parentElement.nextElementSibling.setAttribute('style', 'display: none');
        x = true;
    }
});

// BIG 3 CLICK
const big3Cards = document.querySelector('.big3 .container .cards');
big3Cards.addEventListener('click', function(e){
    if(e.target.classList.contains('img')){
        var imgCard = e.target;
        var anakCard = imgCard.children;
        var icon = imgCard.nextElementSibling.children[0];
        imgCard.classList.toggle('imgSize');
        anakCard[0].classList.toggle('dnone');
        anakCard[1].classList.toggle('dnone');
        icon.classList.toggle('dnone');
    }
});