<!-- resources/views/IniciarSesion.blade.php -->

<form action="{{ route('usuarios.verificarUsuario') }}" method="post">
        @csrf
        <label>Email:</label>
        <input type="text" name="email" id="email" required>

        <label>Contraseña:</label>
        <input type="text" name="contra" required>

        <button type="submit">Guardar</button>
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