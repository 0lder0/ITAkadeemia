let myIndex = 0;
carousel();

function carousel() {
    let i;
    let x = document.getElementsByClassName("slaid");
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}
    x[myIndex-1].style.display = "block";
    setTimeout(carousel, 2000); // Change image every 2 seconds
}

document.addEventListener("click", function (e) {
    if (e.target.classList.contains("open-modal-btn")) {
        $("#addEventModal").css("display", "block");
    }
});

document.addEventListener("click", function (e) {
    if (e.target.classList.contains("close-modal-btn")) {
        $("#addEventModal").css("display", "none");
    }
});