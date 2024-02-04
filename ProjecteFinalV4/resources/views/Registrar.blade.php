<!-- resources/views/Registrar.blade.php -->

    <form action="{{ route('usuarios.store') }}" method="post">
        @csrf
        <label>Nick:</label>
        <input type="text" name="nick" required>

        <label>Email:</label>
        <input type="text" name="email" required>

        <label>Nombre:</label>
        <input type="text" name="nombre" required>

        <label>Apellidos:</label>
        <input type="text" name="apellidos" required>

        <label>Contraseña:</label>
        <input type="text" name="contra" required>

        <label>DNI:</label>
        <input type="text" name="dni" required>

        <label>Fecha de Nacimiento:</label>
        <input type="date" name="fecha_nacimiento" required>

        <label>Rol:</label>
        <select name="rol" required>
            <option value="admin">Admin</option>
            <option value="usuario">Usuario</option>
        </select>

        <button type="submit" onclick="return confirm('Usuario registrado')">Guardar</button>
    </form>

    <style>
    form {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    }

    label {
    display: block;
    margin-bottom: 8px;
    }

    input, select {
    width: 100%;
    padding: 8px;
    margin-bottom: 12px;
    box-sizing: border-box;
    }

    button {
    background-color: #4CAF50;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    display: block;
    margin: 0 auto; /* Centra el botón */
    }

    /* Alineamos el botón al centro */
    button {
    display: block;
    margin: 0 auto;
    }
    </style>