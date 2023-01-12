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


// SCROOLDOWN NAVBAR HIDE
const body = document.body;
let lastScroll = 0;
window.addEventListener('scroll', () => {
    const curScroll = window.pageYOffset;

    if(curScroll <= 0){
        body.classList.remove('scroll-up')
    }

    if(curScroll > lastScroll && !body.classList.contains('scroll-down')){
        body.classList.remove('scroll-up')
        body.classList.add('scroll-down')
    }
    
    if(curScroll < lastScroll && body.classList.contains('scroll-down')){
        body.classList.add('scroll-up')
        body.classList.remove('scroll-down')
    }
    
    lastScroll = curScroll
});


// ARROW DROPDOWN
const arrow = document.querySelector('div#accountDd.account .arrow');
var x = true;
document.body.addEventListener('click', (e) =>{
    if( e.target == arrow && x == true){
        arrow.parentElement.nextElementSibling.setAttribute('style', 'display: flex');
        x = false;
    } else{
        arrow.parentElement.nextElementSibling.setAttribute('style', 'display: none');
        x = true;
    }
});