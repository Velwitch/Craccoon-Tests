document.addEventListener('DOMContentLoaded', function () {
    if (document.getElementById("imagePreview").src === '') {
        document.querySelector('#imageInputDiv').classList.remove('hidden');
    }

    if (document.getElementById("vidPreview").src === '') {
        console.log('sdsdfsd');
        document.querySelector('#videoInputDiv').classList.remove('hidden');
    }
    /*  IMAGE */


    const imageInput = document.getElementById("image");
    const imagePreview = document.getElementById("imagePreview");
    const bouttonImage = document.querySelector('#imageDelete');

    if (bouttonImage !== null) {
        bouttonImage.addEventListener('click', (event) => {
            event.preventDefault();
            imageInput.value = '';
            imagePreview.src = '';
            imagePreview.alt = '';
            document.querySelector('#imageDeleted').value = 1;
            document.querySelector('#imageInputDiv').classList.remove('hidden');
            bouttonImage.classList.add('hidden');

        });
    }

    imageInput.addEventListener("change", function () {

        if (imageInput.files.length === 0) {
            imagePreview.src = '';
        } else {
            const selectedFile = imageInput.files[0];
            const imageUrl = URL.createObjectURL(selectedFile);
            imagePreview.src = imageUrl;
        }
    });


    /* VIDEO */
    const bouttonVideo = document.querySelector('#videoDelete');
    const vidInput = document.getElementById("urlVid");
    const vidPreview = document.getElementById("vidPreview");

    if (bouttonImage !== null) {
        bouttonVideo.addEventListener("click", (event) => {
            event.preventDefault();
            vidInput.value = '';
            vidPreview.src = '';
            document.querySelector('#videoDeleted').value = 1;
            document.querySelector('#videoInputDiv').classList.remove('hidden');
            bouttonVideo.classList.add('hidden');
        });
    }


    vidInput.addEventListener("input", function () {
        let vidUrl = vidInput.value;

        let vidID = vidUrl.replace('https://www.youtube.com/watch?v=', '');
        vidPreview.src = "https://www.youtube.com/embed/" + vidID;

    });


    /*  CK EDITOR */
    ClassicEditor
        .create(document.querySelector('#editor1'))

        .catch(error => {
            console.error(error);
        });
    ClassicEditor
        .create(document.querySelector('#editor2'))

        .catch(error => {
            console.error(error);
        });
});