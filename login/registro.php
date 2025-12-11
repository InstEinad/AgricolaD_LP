<?php
require_once __DIR__ . '/../conexionbd/conexion.php';


$conexion = new Conexion();
$conn = $conexion->iniciar();

$sql = "SELECT idCliente, nombre FROM Cliente";
$stmt = $conn->prepare($sql);
$stmt->execute();
$clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $clave = password_hash($_POST['clave'], PASSWORD_DEFAULT);
    $rol = $_POST['rol'];
    $Cliente_idCliente = $_POST['Cliente_idCliente'];

    try {
        $sql = "INSERT INTO Usuario(nombre, correo, clave, rol, Cliente_idCliente)
                VALUES (:nombre, :correo, :clave, :rol, :idCliente)";

        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':clave', $clave);
        $stmt->bindParam(':rol', $rol);
        $stmt->bindParam(':idCliente', $Cliente_idCliente);

       if ($stmt->execute()){
            echo "El registro del usuario fue exitoso";
        }else{
            echo "Error al registrar";
        } 

        
    } catch (PDOException $e) {
        echo  $e->getMessage();
    }
}
?>

<style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;

            background: url('../imagenes/agr.jpg') no-repeat center center fixed;
            background-size: cover;       /* La imagen cubre toda la pantalla */
            background-position: center;  /* Centrada */
            background-repeat: no-repeat; /* No se repite */
            background-attachment: fixed; /* Efecto fondo fijo */

            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .contenedor {
            width: 420px;
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 18px rgba(0,0,0,0.2);
            animation: flotar 3s ease-in-out infinite;
        }

        @keyframes flotar {
            0% { transform: translateY(0); }
            50% { transform: translateY(-8px); }
            100% { transform: translateY(0); }
        }

        h2 {
            text-align: center;
            color: #2f8f6a;
            margin-bottom: 20px;
        }

        .descripcion {
            text-align: center;
            color: #4a4a4a;
            margin-bottom: 20px;
            font-size: 14px;
        }

        label {
            display: block;
            font-weight: bold;
            color: #2f8f6a;
            margin-top: 12px;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            border-radius: 5px;
            border: 1px solid #b9e4cf;
            background: #f5fffa;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 12px;
            margin-top: 20px;
            border: none;
            background: #2f8f6a;
            color: white;
            font-weight: bold;
            cursor: pointer;
            border-radius: 5px;
        }

        button:hover {
            background: #256c50;
        }
    </style>

</head>
<body>

<div class="contenedor">

    <h2>Registrar nuevo usuario</h2>

    <p class="descripcion">
        Complete los datos para crear una cuenta.
    </p>

    <form action="" method="POST">

        <label>Nombre:</label>
        <input type="text" name="nombre" required>

        <label>Correo:</label>
        <input type="email" name="correo" required>

        <label>Contraseña:</label>
        <input type="password" name="clave" required>

        <label>Rol:</label>
        <select name="rol" required>
            <option value="">-- Seleccione un rol --</option>
            <option value="admin">Admin</option>
            <option value="usuario">Usuario</option>
        </select>

        <label>Cliente asociado:</label>
        <select name="Cliente_idCliente" required>
            <option value="">-- Seleccione cliente --</option>
            <?php foreach ($clientes as $c): ?>
                <option value="<?= $c['idCliente'] ?>">
                    <?= htmlspecialchars($c['nombre']) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <button type="submit">Registrar</button>

    </form>

</div>

</body>