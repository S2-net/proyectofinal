<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <title>Cargar Residencia</title>
</head>
<body>
    <div class="padrino">
        <form action="RF_registro_resi.php" method="POST" id="envio">

        <div>
            <label for="nombreresi" class="form-label">Nombre de la residencia</label>
            <input type="text" name="nombreresi" id="nombreresi">
        </div>
        <div>
            <label for="tipo-residencia" class="form-label">Tipo de residencia</label>
            <select name="tipo-residencia" id="tipo-residencia">
                <option value="1">Masculina</option>
                <option value="2">Femenina</option>
                <option value="3">Mixta</option>
            </select>
        </div>
        <div >
            <label for="descripcion" class="form-label">Descripción</label>
            <input type="text" id="descripcion" name="descripcion">
        </div>
        <div >
            <label for="normas" class="form-label">Normas de convivencia</label>
            <input type="text" id="normas" name="normas">
        </div>
        <div >
            <label for="nro-habitaciones" class="form-label">Número de habitaciones</label>
            <select name="nro-habitaciones" id="nro-habitaciones">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="1">4</option>
                <option value="2">5</option>
                <option value="3">6</option>
                <option value="3">7</option>
                <option value="1">8</option>
                <option value="2">9</option>
                <option value="3">10</option>
            </select>
        </div>
        <div >
            <label for="baños" class="form-label">Baños</label>
            <select name="baños" id="baños">
                <option value="1">Individual</option>
                <option value="2">Compartido</option>
                <option value="3">Separado Hombre/Mujeres</option>
            </select>
        </div>
        <div>
            <label for="imagen" class="form-label">Cargar Imagenes</label>
            <input type="file" name="imagen" id="imagen" class="form-control" accept="image/*" >
        </div>

        <input type="submit" value="Cargar" name="envio" id=envio>
        <input type="reset" value="Cancelar">
        </form>
        
        <script src="app.js"></script>
        
    </div>

</body>
</html>