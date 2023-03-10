// UPLOAD IMAGE GALLERY
const inpImg = document.querySelector('#upInput');
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


// UPLOAD IMAGE MAGAZINE
const previewImg = document.querySelector('.previewImg');
const clonePreviewImg = previewImg.cloneNode();
const img = document.createElement('img');
// console.log(clonePreviewImg);

const h3 = document.querySelector('#h3UpGallery');
const form = document.querySelector('.rightSect');
// console.log(clonePreviewImg);

const inputMagazine = document.querySelector('.inputMagazine#upInput');
inputMagazine.addEventListener('change', (e)=>{
    for(let i=0; i<inputMagazine.files.length; i++){
        var src = URL.createObjectURL(e.target.files[i+1]);
        var clonePreviewImg = previewImg.cloneNode();
        var img = document.createElement('img');

        img.src = src;
        clonePreviewImg.appendChild(img);
        form.insertBefore(clonePreviewImg, h3)
    }
});


iconBtn.addEventListener('click', ()=>{
    inpImg.click();
    console.log('ke klik');
})