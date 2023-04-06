document.addEventListener('DOMContentLoaded', function () {
  
    /*  IMAGE */


    const imageInput = document.getElementById("image");
    const imagePreview = document.getElementById("imagePreview");


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
    const vidInput = document.getElementById("urlVid");
    const vidPreview = document.getElementById("vidPreview");
  
    vidInput.addEventListener("input", function () {
        let vidUrl = vidInput.value;

        let vidID = vidUrl.replace('https://www.youtube.com/watch?v=', '');
        vidPreview.src = "https://www.youtube.com/embed/" + vidID;

    });


    /*  CK EDITOR */
   /*  ClassicEditor
        .create(document.querySelector('#editor1'))

        .catch(error => {
            console.error(error);
        });
    ClassicEditor
        .create(document.querySelector('#editor2'))

        .catch(error => {
            console.error(error);
        }); */
});