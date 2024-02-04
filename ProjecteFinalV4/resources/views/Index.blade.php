<!-- resources/views/Index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
</head>
<body>

    <h1>Bienvenido a la tienda</h1>

    <form action="" method="get">
    @csrf 
        <input type="hidden" name="modo" value="registrar">
        <button type="submit">Registrar</button>
    </form>
    <br>
    <form action="" method="get">
    @csrf 
        <input type="hidden" name="modo" value="iniciar_sesion">    
        <button type="submit">Iniciar Sesión</button>
    </form>
</body>
</html>
<style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 20px;
            padding: 20px;
            text-align: center;
            background-color: #f4f4f4;
        }

        h1 {
            color: #333;
        }

        form {
            display: inline-block;
            margin: 10px;
        }

        button {
            padding: 10px;
            font-size: 16px;
            cursor: pointer;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>