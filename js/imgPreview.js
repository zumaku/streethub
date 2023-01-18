const galeri = document.querySelector('.galeri');
const preViewImgGallery = document.querySelector('.preViewImgGallery');

galeri.addEventListener('click', (e)=>{

    if( e.target.classList.contains('imgGallery') ){
        let imgSrc = e.target.src;
        let imgName = e.target.alt;
        let idImg = e.target.getAttribute('data-id');
        let tglUpload = e.target.getAttribute('data-tglUpload');
        let body = document.body;
        let inputId = preViewImgGallery.querySelector('input#inputId');
        let inputImgName = preViewImgGallery.querySelector('input#inputImgName');
        let img = preViewImgGallery.querySelector('img');
        let close = preViewImgGallery.querySelector('.close');
        let btnDownload = preViewImgGallery.querySelector('.btn.unduh');
        let p = preViewImgGallery.querySelector('#tglUpload');

        body.style.overflow = 'hidden';
        preViewImgGallery.removeAttribute('style');
        inputId.setAttribute('value', idImg);
        inputImgName.setAttribute('value', imgName);
        img.setAttribute('src', imgSrc);
        btnDownload.setAttribute('href', imgSrc);
        p.innerHTML = "Tanggal Upload: " + tglUpload;

        close.addEventListener('click', ()=>{
            body.removeAttribute('style');
            preViewImgGallery.style.display = 'none';
        });
        
        // setTimeout(()=>{
        //     close.click()
        // }, 5000);
    }
});