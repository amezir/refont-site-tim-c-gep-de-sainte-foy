document.addEventListener("DOMContentLoaded", function () {
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function () {
        modal.style.display = "none";
    }

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var img1 = document.getElementById("myImg1");
    var img2 = document.getElementById("myImg2");
    var img3 = document.getElementById("myImg3");

    var modalImg = document.getElementById("img01");

    img1.onclick = function () {
        modal.style.display = "block";
        modalImg.src = this.src;
    }

    img2.onclick = function () {
        modal.style.display = "block";
        modalImg.src = this.src;
    }

    img3.onclick = function () {
        modal.style.display = "block";
        modalImg.src = this.src;
    }
});
