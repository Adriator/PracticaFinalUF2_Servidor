<!-- resources/views/editarUsuarios.blade.php -->

<!-- Encabezado principal -->
<h1>Editar Usuario</h1>

<!-- Formulario de edición del producto -->
<form method="POST" action="{{ route('usuarios.update', $usuario) }}" >
    @csrf 
    @method('PUT')

    <!-- Campo de entrada para el nombre del producto -->
    <div class="form-group">
        <label for="nick">Nick:</label>
        <input type="text" name="nick" value="{{ old('nick', $usuario->nick) }}" class="form-control" required>
    </div>

    <!-- Campo de entrada para el nombre del producto -->
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="text" name="email" value="{{ old('email', $usuario->email) }}" class="form-control" required>
    </div>

    <!-- Campo para ingresar la descripcion del producto -->
    <div class="form-group">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="{{ old('nombre', $usuario->nombre) }}" class="form-control" required>
    </div>

    <!-- Campo para ingresar la descripcion del producto -->
    <div class="form-group">
        <label for="contra">Contraseña:</label>
        <input type="text" name="contra"  value="{{ old('contra', $usuario->contra) }}" class="form-control" required>
    </div>

    <!-- Campo para ingresar la descripcion del producto -->
    <div class="form-group">
        <label for="dni">DNI:</label>
        <input type="text" name="dni" value="{{ old('dni', $usuario->dni) }}" class="form-control" required>
    </div>

    <!-- Campo para ingresar la descripcion del producto -->
    <div class="form-group">
        <label for="fecha_nacimiento">Fecha_nacimiento:</label>
        <input type="date" name="fecha_nacimiento" value="{{ old('fecha_nacimiento', $usuario->fecha_nacimiento) }}" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="rol">Rol:</label>
        <select name="rol" class="form-control" required>
            <option value="admin">Admin</option>
            <option value="usuario">Usuario</option>
        </select>
    </div>

    <!-- Botón para enviar el formulario y guardar el usuario -->
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