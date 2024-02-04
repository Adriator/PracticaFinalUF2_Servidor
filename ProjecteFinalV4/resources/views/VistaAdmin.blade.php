<!-- resources/views/VistaAdmin.blade.php -->

<!-- Encabezado principal -->
<h1>Modo Admin</h1>
<br><br>
<h3>Lista de Productos</h3>

<a href="{{ route('volver') }}" class="top-right-button">
    Volver
</a>
<!-- Enlace para crear un nuevo producto -->
<a href="{{ route('crearProductos') }}" class="btn btn-primary">Crear Producto</a>

<!-- Tabla para mostrar la información de los productos -->
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Unidades</th>
            <th>Precio_unitario</th>
            <th>Categoria</th>
        </tr>
    </thead>
    <tbody>
        <!-- Ciclo que recorre la lista de productos y muestra sus detalles -->
        @foreach ($productos as $producto)
            <tr>
                <!-- Columnas de la tabla con los detalles de cada producto -->
                <td>{{ $producto->id }}</td>
                <td>{{ $producto->nombre }}</td>
                <td>{{ $producto->descripcion }}</td>
                <td>{{ $producto->unidades }}</td>
                <td>{{ $producto->precio_unitario }}</td>
                <td>{{ $producto->categoria }}</td>
                <td>
                    <!-- Enlace para editar el producto -->
                    <a href="{{ route('productos.editar', $producto) }}" class="btn btn-warning">Editar Producto</a>

                    <!-- Formulario para eliminar el producto -->
                    <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" style="display:inline;">
                        @csrf 
                        @method('DELETE') 
                        <!-- Botón de eliminación con confirmación -->
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>


<br><br><br>

<h3>Lista de Categorias</h3>

<!-- Enlace para crear una nueva categoria -->
<a href="{{ route('crearCategorias') }}" class="btn btn-primary">Crear Categoria</a>

<!-- Tabla para mostrar la información de las categorias -->
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripcion</th>
        </tr>
    </thead>
    <tbody>
        <!-- Ciclo que recorre la lista de categorias y muestra sus detalles -->
        @foreach ($categorias as $categoria)
            <tr>
                <!-- Columnas de la tabla con los detalles de cada categoria -->
                <td>{{ $categoria->id }}</td>
                <td>{{ $categoria->nombre }}</td>
                <td>{{ $categoria->descripcion }}</td>
                <td>
                    <!-- Enlace para editar la categoria -->
                    <a href="{{ route('categorias.editar', $categoria) }}" class="btn btn-warning">Editar categoria</a>

                    <!-- Formulario para eliminar la categoria -->
                    <form action="{{ route('categorias.destroy', $categoria->id) }}" method="post" style="display:inline;">
                        @csrf 
                        @method('DELETE') 
                        <!-- Botón de eliminación con confirmación -->
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>


<br><br><br>

<h3>Lista de Usuarios</h3>

<!-- Enlace para crear un nuevo usuario -->
<a href="{{ route('crearUsuarios') }}" class="btn btn-primary">Crear Usuario</a>

<!-- Tabla para mostrar la información de los usuario -->
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nick</th>
            <th>Email</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Dni</th>
            <th>Fecha_nacimiento</th>
            <th>Rol</th>
        </tr>
    </thead>
    <tbody>
        <!-- Ciclo que recorre la lista de usuario y muestra sus detalles -->
        @foreach ($usuarios as $usuario)
            <tr>
                <!-- Columnas de la tabla con los detalles de cada usuario -->
                <td>{{ $usuario->id }}</td>
                <td>{{ $usuario->nick }}</td>
                <td>{{ $usuario->email }}</td>
                <td>{{ $usuario->nombre }}</td>
                <td>{{ $usuario->apellidos}}</td>
                <td>{{ $usuario->dni }}</td>
                <td>{{ $usuario->fecha_nacimiento }}</td>
                <td>{{ $usuario->rol }}</td>
                <td>
                    <!-- Enlace para editar el usuario -->
                    <a href="{{ route('usuarios.editar', $usuario) }}" class="btn btn-warning">Editar Usuario</a>

                    <!-- Formulario para eliminar el usuario -->
                    <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST" style="display:inline;">
                        @csrf 
                        @method('DELETE') 
                        <!-- Botón de eliminación con confirmación -->
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 20px;
        }
        
        .top-right-button {
        position: absolute;
        top: 10px;
        right: 10px;
        }

        h1, h3 {
            color: #333;
        }

        table {
            width: 100%;
            margin-top: 10px;
            border-collapse: collapse;
            background-color: #fff;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        a.btn, button.btn {
            display: inline-block;
            padding: 8px 12px;
            margin-bottom: 10px;
            color: #fff;
            background-color: #007bff;
            border: 1px solid #007bff;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }
    </style>