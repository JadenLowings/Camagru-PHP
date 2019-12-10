(function() {
    var canvas = document.getElementById('canvas'),
        context = canvas.getContext('2d'),
        video = document.getElementById('video')
        vendorUrl = window.URL;

    navigator.getMedia = navigator.getUserMedia;

    navigator.getMedia({
        video: true,
        audio: false
    }, function(stream) {
        video.src = vendorUrl.createObjectURL(stream);
        video.play();
    }, function(error) {
        //An error occured
        //error.code
    });

    video.addEventListener('play', function() {
        draw(this, context, 400, 300);
    }, false);
    function draw (video, context, width, height) {
        context.drawImage(video, 0, 0, width, height);
        setTimeout(draw, 10, video, context, width, height);
    }
}) ();