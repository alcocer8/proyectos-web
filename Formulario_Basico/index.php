<?php include("php/includes/header.php"); ?>
<main class="contenedor">

    <?php include("php/database/database.php");
    if (isset($_SESSION["mensaje"])) { ?>

        <div>
            <p><?= $_SESSION["mensaje"]; ?></p>
        </div>

    <?php }
    session_unset() ?>

    <form action="/php/database/save.php" method="POST" id="formualario">
        <legend>Ingresa tus datos</legend>
        <fieldset>
            <div class="inputs">
                <label for="">Nombre:</label>
                <input type="text" id="nombre" name="nombre" placeholder="Tu nombre">
            </div>

            <div class="inputs">
                <label for="">Apellido:</label>
                <input type="text" id="apellido" name="apellido" placeholder="Tu apellido">
            </div>

            <div class="inputs">
                <label for="">Edad</label>
                <input type="number" id="edad" name="edad" placeholder="Tu edad" min="18">
            </div>

            <div class="inputs">
                <label for="">Correo:</label>
                <input type="email" id="email" name="email" placeholder="Tu correo electronico">
            </div>

            <input type="submit" value="Enviar" id="enviar" name="enviar" class="boton">
        </fieldset>
    </form>

    <section class="guardado">
        <h2>Datos Guardos</h2>
        <div class="datos" id="datos">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Edad</th>
                        <th>Correo</th>
                        <th>Fecha de registro</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $query = "SELECT * FROM datos;";
                        $result = mysqli_query($db, $query);
                        while($row = mysqli_fetch_assoc($result)){
                    ?>
                    <tr>
                    <td><?= $row["id"] ?></td>
                        <td><?= $row["nombre"] ?></td>
                        <td><?= $row["apellido"] ?></td>
                        <td><?= $row["edad"] ?></td>
                        <td><?= $row["correo"] ?></td>
                        <td><?= $row["fecha"] ?></td>
                        <td>
                            <a href="/php/database/update.php?id=<?php echo $row['id'] ?>" class="funciones" ><i class="fas fa-marker"></i></a>
                            <a href="/php/database/delete.php?id=<?php echo $row['id'] ?>" class="funciones" ><i class="fas fa-trash-alt"></i></a>
                        </td>
                        
                    </tr>
                    <?php } ?>
                </tbody>
            </table>

        </div>
    </section>
</main>

<?php include("php/includes/footer.php") ?>