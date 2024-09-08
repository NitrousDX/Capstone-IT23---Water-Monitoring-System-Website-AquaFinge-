<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add and Delete Square</title>
    <style>
        .square {
            width: 100px;
            height: 100px;
            background-color: blue;
            margin: 10px;
            position: relative;
        }
        .delete-btn {
            position: absolute;
            top: 5px;
            right: 5px;
            background-color: red;
            color: white;
            border: none;
            cursor: pointer;
            padding: 5px;
            border-radius: 50%;
        }
    </style>
</head>
<body>
    <button onclick="addSquare()">Add Square</button>
    <div id="square-container"></div>

    <script>
        function addSquare() {
            // Create a new div for the square
            const square = document.createElement('div');
            square.className = 'square';

            // Create a delete button
            const deleteBtn = document.createElement('button');
            deleteBtn.className = 'delete-btn';
            deleteBtn.innerText = 'X';
            deleteBtn.onclick = function() {
                square.remove();
            };

            // Append the delete button to the square
            square.appendChild(deleteBtn);

            // Append the square to the container
            document.getElementById('square-container').appendChild(square);
        }
    </script>
</body>
</html>
