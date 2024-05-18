<!DOCTYPE html>
<html>
<head>
    <style>
        .circle {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background-color: yellow;
        }
    </style>
</head>
<body>
    <div id="circle" class="circle"></div>
    <button onclick="changeColor()">Button On/Off</button>
    

    <script>
        var circle = document.getElementById("circle"); // set circle as the element with id "circle"
        var button = document.querySelector("button"); // set button as the first button element

        function changeColor() {
            if (circle.style.backgroundColor === "yellow") {
                circle.style.backgroundColor = "red";
                
            } else {
                circle.style.backgroundColor = "yellow";
                
            }
        }
    </script>
</body>
</html>
