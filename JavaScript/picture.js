(function() {
    var video = document.getElementById('video'),
        canvas = document.getElementById('canvas'),
        context = canvas.getContext('2d'),
        vendorUrl = window.URL || window.webkitURL;

    navigator.getMedia = navigator.webkitGetUserMedia;

    navigator.getMedia ({
        video: true,
        audio: false
    }, function(stream) {
        video.srcObject = stream;
        // video.src = vendorUrl.createObjectURL(stream);
        video.play();
    }, function(error) {
        //An error occured
        //error.code
    });

    document.getElementById('capture').addEventListener('click', function () {
        context.drawImage(video, 0, 0, 400, 300);
    });

})();
// Image to DB
// const tmp = document.getElementById('yellow');
// tmp.onchange = (e) =>{
//     var img = new Image();
//     // img.onload = draw();

//     var canvas = document.getElementById('canvas');
//     canvas.width = '400px';
//     canvas.height = '300px';
//     if ( img.onload = canvas.getContext('2d')){
//         img.drawImage(img, 0, 0);
//     }
//     console.log(img);
//     // img.onerror = failed;
//     img.src = URL.createObjectURL(img.files[0]);
// };

// document.getElementById('yellow').onchange = function(e) {
//     // console.log("image");
//     var img = new Image();
//     img.onload = draw(img);
//     // console.log(img);
//     // img.onerror = failed;
//     console.log(img);
//     img.src = URL.createObjectURL(img.files[0]);
// };
document.getElementById('yellow').onchange = function(e) {
    // console.log("image");
    var img = new Image();
    // img.src = URL.createObjectURL(img);
    img.src = HTMLMediaElement.srcObject(stream);   
    console.log(URL.createObjectURL(img));
    img.onload = draw(img);
    console.log(img);
};

function draw(img) {
    var canvas = document.getElementById('canvas');
    canvas.width = img.width;
    canvas.height = img.height;
    var ctx = canvas.getContext('2d');
    ctx.drawImage(img, 0, 0);
}


var xhttp = new XMLHttpRequest();
var capt = document.querySelector( '#blue-button' );
var img;
capt.onclick = ()=>{
    if ( document.querySelector( 'canvas' ).getContext('2d')){
        img = document.querySelector( 'canvas' ).toDataURL( 'image/png' );
        
        xhttp.open("POST", "../profile/profile.php");
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send( 'name=' + img);

    }
}

