
<!-- resources/views/editarCategoria.blade.php -->

<!-- Encabezado principal -->
<h1>Editar Categoria</h1>

<!-- Formulario de edición de la categoria -->
<form action="{{ route('categorias.update', $categoria->id) }}" method="POST">
    @csrf 
    @method('PUT')

    <!-- Campo de entrada para el nombre de la categoria -->
    <div class="form-group">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="{{ old('nombre', $categoria->nombre) }}" class="form-control" required>
    </div>

    <!-- Campo para ingresar la descripcion de la categoria -->
    <div class="form-group">
        <label for="descripcion">Descripcion:</label>
        <input type="text" name="descripcion" value="{{ old('descripcion', $categoria->descripcion) }}" class="form-control" required>
    </div>
    
    <!-- Botón para enviar el formulario y guardar el Pokémon -->
    <button type="submit" class="btn btn-success">Guardar</button>
</form>
<style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-size: 14px;
            color: #555;
            margin-bottom: 5px;
        }

        input,
        select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>