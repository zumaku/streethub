function indexFunction(){
    const body = document.body;
    const signh3 = document.querySelectorAll('.sign h3');
    const option = signh3[0].parentElement.parentElement;
    const signForm = document.querySelectorAll('.sectionLeft .signForm');
    // console.log(signForm);
    body.addEventListener('click', (e) => {
        if(e.target == signh3[0] || e.target == signh3[0].lastChild){
            option.setAttribute('style', 'align-items: flex-start');
            signForm[0].classList.remove('dnone');
            signForm[1].classList.add('dnone');
        } else if(e.target == signh3[1] || e.target == signh3[1].lastChild){
            option.setAttribute('style', 'align-items: flex-end');
            signForm[0].classList.add('dnone');
            signForm[1].classList.remove('dnone');
        }
    });
}

function insertBio(){
    const insertBio = document.querySelector('.insertBio');
    insertBio.addEventListener('click', (e)=>{
        if( e.target.classList.contains('imgFileInput')){
            // console.log('yea');
            e.target.addEventListener('change', ()=>{
                var src = URL.createObjectURL(e.target.files[0]);
                var iconBtn = e.target.nextElementSibling.children[0];
                var preImage = iconBtn.nextElementSibling;
                iconBtn.setAttribute('style', 'diaplay: none;');
                preImage.removeAttribute('hidden');
                preImage.src = src;
            });
        }
        // if( e.target.classList.contains('iconImg') ){
        //     e.target.parentElement.previousElementSibling.click();
        // }
    });
}