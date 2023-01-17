const inpImg = document.querySelector('#upGallery');
const preImage = document.querySelector('#preImage');
const iconBtn = document.querySelector('#iconBtn');


inpImg.addEventListener('change', (e)=>{
    if(e.target.files.length > 0){
        var src = URL.createObjectURL(e.target.files[0]);
        iconBtn.setAttribute('style', 'diaplay: none;');
        preImage.removeAttribute('hidden');
        preImage.src = src;
    }
});

iconBtn.addEventListener('click', ()=>{
    inpImg.click();
    console.log('ke klik');
})