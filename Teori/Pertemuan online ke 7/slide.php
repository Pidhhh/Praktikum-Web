<!DOCTYPE html>
<html>
<head>
    <title>Image Slider</title>
    <style>
        .slider {
            width: 300px;
            height: 200px;
            overflow: hidden;
        }
        .slider img {
            width: 100%;
            height: 100%;
        }
    </style>
</head>
<body>
    <div class="slider">
        <img src="image1.png" alt="Image 1">
    </div>
    <button onclick="prevImage()">Previous</button>
    <button onclick="nextImage()">Next</button>

    <script>
        var images = ['image1.png', 'image2.png', 'image3.png'];
        var currentIndex = 0;

        function nextImage() {
            currentIndex = (currentIndex + 1) % images.length;
            document.querySelector('.slider img').src = images[currentIndex];
        }

        function prevImage() {
            currentIndex = (currentIndex - 1 + images.length) % images.length;
            document.querySelector('.slider img').src = images[currentIndex];
        }
    </script>
</body>
</html>
