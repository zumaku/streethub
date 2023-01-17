const galeri = document.querySelector('.galeri');
const preViewImgGallery = document.querySelector('.preViewImgGallery');

galeri.addEventListener('click', (e)=>{

    if( e.target.classList.contains('imgGallery') ){
        let imgSrc = e.target.src;
        let idImg = e.target.getAttribute('data-id');
        let tglUpload = e.target.getAttribute('data-tglUpload');
        let body = document.body;
        let input = preViewImgGallery.querySelector('input#inputId');
        let img = preViewImgGallery.querySelector('img');
        let close = preViewImgGallery.querySelector('.close');
        let btnDownload = preViewImgGallery.querySelector('.btn.unduh');
        let h3 = preViewImgGallery.querySelector('#tglUpload');

        body.style.overflow = 'hidden';
        preViewImgGallery.removeAttribute('style');
        input.setAttribute('value', idImg);
        img.setAttribute('src', imgSrc);
        btnDownload.setAttribute('href', imgSrc);
        h3.innerHTML = "Tanggal Upload: " + tglUpload;

        close.addEventListener('click', ()=>{
            body.removeAttribute('style');
            preViewImgGallery.style.display = 'none';
        });
    }
    setTimeout(()=>{
        close.click();
    }, 5000);
});