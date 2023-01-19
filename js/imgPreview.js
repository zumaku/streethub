const galeri = document.querySelector('.galeri');
const preViewImgGallery = document.querySelector('.preViewImgGallery');

galeri.addEventListener('click', (e)=>{

    if( e.target.classList.contains('imgGallery') ){
        let imgSrc = e.target.src;
        let body = document.body;
        let tglUpload = e.target.getAttribute('data-tglUpload');
        let img = preViewImgGallery.querySelector('img');
        let close = preViewImgGallery.querySelector('.close');
        let btnDownload = preViewImgGallery.querySelector('.btn.unduh');
        let p = preViewImgGallery.querySelector('#tglUpload');


        if(!e.target.classList.contains('search')){
            let idImg = e.target.getAttribute('data-id');
            let imgName = e.target.alt;
            let inputId = preViewImgGallery.querySelector('input#inputId');
            let inputImgName = preViewImgGallery.querySelector('input#inputImgName');

            if( inputId != null && inputImgName != null ){
                inputId.setAttribute('value', idImg);
                inputImgName.setAttribute('value', imgName);
            }
        } else{
            let idUser = e.target.getAttribute('data-idUser');
            let picture = e.target.getAttribute('data-picture');
            let usernama = e.target.getAttribute('data-name');
            let uploader = preViewImgGallery.querySelector('.uploader');
            let profilePicture = preViewImgGallery.querySelector('.profilePic');
            let name = profilePicture.nextElementSibling;

            profilePicture.setAttribute('style', 'background-image: url(../img/account/profile/' + picture + ')');
            name.innerHTML = usernama;
            uploader.href = "../profile/gallery.php?idActive=" + idUser;
        }

        body.style.overflow = 'hidden';
        preViewImgGallery.removeAttribute('style');
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