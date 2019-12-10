window.addEventListener('load', function() {
    var images = ['../resources/eiffel-tower-at-sunriseparisfrance_4viail9ce__F0006.jpg', 
            '../resources/happypeople.jpg', 
            '../resources/2016-01-04-1451880335-5503640-thedailyhabitsofsupremelyhappypeople.jpg',
            '../resources/2016-04-01-1459522055-4756650-Forests_1.jpeg',
            '../resources/beautiful-london-city-view-8k-82-5120x2880.jpg',
            '../resources/img_2366.jpg',
            '../resources/isle_of_skye,_beautiful.jpeg',
            '../resources/luxury-beautiful-pictures-for-desktop-wallpapers-17.jpg',
            '../resources/RollingWaves.jpg'];
            document.body.style.backgroundImage = 'url("../resources/' + images[Math.floor(Math.random() * images.length)] + '")';
})
