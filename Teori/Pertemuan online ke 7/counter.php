<!DOCTYPE html>
<html>
<head>
    <style>
        .counter {
            font-size: 24px;
        }
    </style>
</head>
<body>
    <div class="counter">0</div>
    <button onclick="increment()">Increment</button>
    <script>
        var counter = 0;
        function increment() {
            counter++; // increment the counter by 1
            document.querySelector('.counter').textContent = counter; // set the text content of the element with class "counter" to the value of counter
        }
    </script>
</body>
</html> 