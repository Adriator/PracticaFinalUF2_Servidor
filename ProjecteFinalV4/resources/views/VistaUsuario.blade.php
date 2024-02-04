<a href="{{ route('volver') }}" class="top-right-button">
        Volver
</a>

<div class="container">
        <h1>Bienvenido Usuario</h1>

        <h2>Editar perfil</h2>
        <form method="POST" action="{{ route('usuarios.mostrarEditarPerfil') }}">
            @csrf
            @method('PUT')
            <button type="submit">Editar</button>
        </form>
</div>

    <br><br>
<h2>Tabla de productos</h2>
<!-- Formulario de filtro por categoría -->
<form method="GET" action="{{ route('productos.filtroCategoria') }}">
    <label for="categoria">Filtrar por categoría:</label>
    <select name="categoria">
        <option value="" selected>Todas las categorías</option>
        @foreach ($categorias as $categoria)
            <option value="{{ $categoria->id }}">{{ $categoria->id }}</option>
        @endforeach
    </select>
    <button type="submit">Filtrar</button>
</form>

<!-- Formulario para ordenar por precio -->
<form method="GET" action="{{ route('productos.ordenarPorPrecio') }}">
    <label for="orden">Ordenar por precio:</label>
    <select name="orden">
        <option value="asc">Menor a mayor</option>
        <option value="desc">Mayor a menor</option>
    </select>
    <button type="submit">Ordenar</button>
</form>
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
                <form method="POST" action="{{ route('productos.agregarCarrito', $producto) }}">
                 @csrf
                <label for="cantidad">Cantidad:</label>
                <input type="number" name="cantidad" value="1" min="1" max="{{ $producto->unidades }}">
                <button type="submit" class="btn btn-primary">Añadir al Carrito</button>
                </form>
</td>
            </tr>
        @endforeach
    </tbody>
</table>

<br><br><br>

<h3>Lista de Categorias</h3>

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
            </tr>
        @endforeach
    </tbody>
</table>

<br><br>
<h3>Carrito de compra</h3>

<!-- Tabla para mostrar la información de las categorias -->
<table class="table">
    <thead>
        <tr>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio Producto</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        <!-- Ciclo que recorre la lista de categorias y muestra sus detalles -->
        @foreach ($carrito as $carro)
            <tr>
                <!-- Columnas de la tabla con los detalles de cada categoria -->
                <td>{{ $carro->producto }}</td>
                <td>{{ $carro->cantidad }}</td>
                <td>{{ $carro->precio_producto }}</td>
                <td>{{ $carro->total }}</td>
                <td>
                    <form method="POST" action="{{ route('productos.quitarCarrito', $carro) }}">
                        @csrf @method('DELETE')
                        <input type="submit" value="Eliminar">
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 20px;
            padding: 0;
            background-color: #f5f5f5;
        }

        .top-right-button {
            position: absolute;
            top: 10px;
            right: 10px;
            text-decoration: none;
            padding: 8px 15px;
            background-color: #007bff;
            color: #fff;
            border-radius: 3px;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        h1, h2, h3 {
            color: #333;
        }

        form {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        select, button, input {
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 3px;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-danger {
            background-color: #dc3545;
            color: #fff;
            border: none;
            padding: 8px 12px;
            border-radius: 3px;
            cursor: pointer;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }
    </style>