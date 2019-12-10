var modal=getElementById("mymodal");
var btn=getElementById("my-btn");

var span = getElementByClassName("close")[0];

btn.onclick = function() {
    modal.stlye.display = "block";
}
span.onclick = function() {
    modal.stlye.display = "none";
}

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}