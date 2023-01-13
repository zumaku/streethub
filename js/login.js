const body = document.body;
const signh3 = document.querySelectorAll('.sign h3');
const option = signh3[0].parentElement.parentElement;
const signForm = document.querySelectorAll('.sectionLeft .signForm');
const sectionRight = document.querySelector('.sectionRight');
console.log(signForm);
body.addEventListener('click', (e) => {
    if(e.target == signh3[0] || e.target == signh3[0].lastChild){
        option.setAttribute('style', 'align-items: flex-start');
        signForm[0].classList.remove('dnone');
        signForm[1].classList.add('dnone');
        sectionRight.setAttribute('style', 'background-image: url(../img/login/signin.jpg)')
    } else if(e.target == signh3[1] || e.target == signh3[1].lastChild){
        option.setAttribute('style', 'align-items: flex-end');
        signForm[0].classList.add('dnone');
        signForm[1].classList.remove('dnone');
        sectionRight.setAttribute('style', 'background-image: url(../img/login/singup.jpg)')
    }
});
