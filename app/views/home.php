
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão de horas</title>
    <link rel="stylesheet" href="./assets/css/styles.css">

    <!-- fontes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <script src="./assets/js/script.js" defer></script>

</head>
<body>
    <section class="section-container">
        <h1>Gestão de horas</h1>
        
        <p class="message-error"></p>

        <form id="form" action="./app/routers/Router.php" method="post">

            <label for="Data">
                Data: <input type="date" class="data" name="data" value="2024-03-09">
            </label>

            <label for="Hora">
                Hora de inicio - entrada: <input type="time" class="hora-inicio" name="hora-inicio">
            </label>

            <label for="Hora">
                Hora da parada - saída: <input type="time" class="hora-saida" name="hora-saida">
            </label>

            <div class="btns">
                <button id="btn-salvar">Salvar</button>
            </div>      
        </form>
    </section>
    <section class="section-table">
        <table>
            <th>Data</th>
            <th>Hora de inicio</th>
            <th>Hora de saída</th>

            <?php
                foreach ($data as $key => $value) {
            ?>
            <tr>
                <td><?php 
                
                echo DateTime::createFromFormat('Y-m-d',  $value["data"])->format('d/m/Y');
                ?></td>
                <td><?php 
                echo DateTime::createFromFormat('Y-m-d H:i:s', $value["hora_inicio"])->format('H:i:s');
                ?></td>
                <td><?php 
                echo DateTime::createFromFormat('Y-m-d H:i:s', $value["hora_saida"])->format('H:i:s');
            
                ?></td>
            </tr>
            <?php
                }
            ?>

        </table>
    </section>
</body>
</html>