<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

        body{
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .spinner {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: radial-gradient(farthest-side,#d22127 94%,#0000) top/6.4px 6.4px no-repeat,
                    conic-gradient(#0000 30%,#d22127);
            -webkit-mask: radial-gradient(farthest-side,#0000 calc(100% - 6.4px),#000 0);
            animation: spinner-c7wet2 1s infinite linear;
        }

        @keyframes spinner-c7wet2 {
            100% {
                transform: rotate(1turn);
            }
        }
    </style>
 
</head>
<body>
    <div class="spinner"></div>
    <script>
        setTimeout(() => {
            window.location.replace('../../home.php');
        }, 2000)
    </script>
</body>
</html>