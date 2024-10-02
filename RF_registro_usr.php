    <?php

    require("conexion.php");

    $con = conectar_bd();

    // Comprobar que se envió un formulario por POST desde carga_datos
    if (isset($_POST["register"])) {

        $nombre =  $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $correo = $_POST["correo"];
        $contrasenia = $_POST["contrasenia"];
        $fecha_nacimiento = mysqli_real_escape_string($con, $_POST["fecha_nacimiento"]);
        $genero = trim($_POST["genero"]);
        
        
    
        // Consultar si el usuario ya existe
        $existe_usr = consultar_existe_usr($con, $correo);

        // Insertar datos si el usuario no existe
        insertar_datos($con, $nombre, $apellido, $correo, $contrasenia, $fecha_nacimiento, $genero, $existe_usr);

    }

    function consultar_existe_usr($con, $correo) {

        $correo = mysqli_real_escape_string($con, $correo); // Escapar los campos para evitar inyección SQL
        $consulta_existe_usr = "SELECT correo FROM usuario WHERE correo = '$correo'";
        $resultado_existe_usr = mysqli_query($con, $consulta_existe_usr);

        if (mysqli_num_rows($resultado_existe_usr) > 0) {
            return true;
        } else {
            return false;
        }
    }

    function insertar_datos($con, $nombre, $apellido, $correo, $contrasenia, $fecha_nacimiento, $genero, $existe_usr) {

        if ($existe_usr == false) {
           
            $correo = mysqli_real_escape_string($con, $correo);
            

            // Encripto la controaseña usando la función password_hash
            $contrasenia = password_hash($contrasenia, PASSWORD_DEFAULT);

            $consulta_insertar = "INSERT INTO usuario (nombre, apellido, correo, contrasenia, fecha_nacimiento, genero) VALUES ('$nombre', '$apellido', '$correo', '$contrasenia', '$fecha_nacimiento', '$genero')";

            if (mysqli_query($con, $consulta_insertar)) {
                header("Location: index.php");
                exit();
            } else {
                echo "Error: " . $consulta_insertar . "<br>" . mysqli_error($con);
            }
        } else {
            echo "El usuario ya existe.";
        }
        }


    function consultar_datos($con) {
        $consulta = "SELECT * FROM usuario";
        $resultado = mysqli_query($con, $consulta);

        // Inicializo una variable para guardar los resultados
        $salida = "";

        // Si se encuentra algún registro de la consulta
        if (mysqli_num_rows($resultado) > 0) {
            // Mientras haya registros
            while ($fila = mysqli_fetch_assoc($resultado)) {
                $salida .= "id: " . $fila["id_usuario"] . " - Nombre: " . $fila["nombre"] ." - Apellido: " . $fila["apellido"] . " - Correo: " . $fila["correo"] . " - Fecha Nacimiento: " . $fila["fecha_nacimiento"] . "-Genero:". $fila["genero"] . "<br> <hr>";
            }
        } else {
            $salida = "Sin datos";
        }

        return $salida;
    }

    mysqli_close($con);