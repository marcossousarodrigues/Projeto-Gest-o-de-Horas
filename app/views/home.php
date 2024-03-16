
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

            <label for="Projeto">Nome do Projeto
                <input type="text" class="projeto" name="projeto" >
            </label>
            <label for="Data">
                Data: <input type="date" class="data" name="data">
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
        
        <form action="" class="form-select-projeto" method="post">
            <label for="Projeto">Selecione o Projeto:</label>
            <select name="nomeprojeto" id="">
                <option value=""></option>
                <?php
                // Remove duplicatas do array $data
                $arraySemRepeticao = array_unique(array_column($data, 'projeto'));
                
                foreach ($arraySemRepeticao as $projeto) {
                    echo '<option value="' . $projeto . '">' . $projeto . '</option>';
                }
                ?>
            </select>
            <button>OK</button>
        </form>
        

    </section>
    <section class="section-table">

        <table>
            <th>Nome do Projeto</th>
            <th>Data</th>
            <th>Hora de inicio</th>
            <th>Hora de saída</th>
            <th>Total Horas</th>

            <?php $totalHoras = array(); ?>
            <?php $totalLinha = array(); ?>
            
            <?php $nomeProjetoExibir = isset($_POST['nomeprojeto']) ? $_POST['nomeprojeto'] : ""; ?>

            
            <?php foreach ($data as $key => $value) { ?>
                
                <?php
                if ( empty($nomeProjetoExibir) || trim($value["projeto"]) == $nomeProjetoExibir)
                {
            
                    array_push($totalLinha, substr( $value["hora_inicio"], 11 ) );
                    array_push($totalLinha, substr( $value["hora_saida"], 11 ) );

                    array_push($totalHoras, $function->subtrairHoras($totalLinha) );

                ?>
                <tr>
                    <td>
                        <?php echo $value["projeto"] ?>
                    </td>
                    <td>
                        <?php echo DateTime::createFromFormat('Y-m-d H:i:s',  $value["data"])->format('d/m/Y');?>
                    </td>
                    <td>
                        <?php echo DateTime::createFromFormat('Y-m-d H:i:s', $value["hora_inicio"])->format('H:i:s');?>
                    </td>
                    <td>
                        <?php echo DateTime::createFromFormat('Y-m-d H:i:s', $value["hora_saida"])->format('H:i:s');?>
                    </td>
                    <td>
                        <?php echo $function->subtrairHoras($totalLinha); ?>
                    </td>
                </tr>



            <?php 
                    foreach( $totalLinha as $linha)
                    {
                        array_pop($totalLinha);
                    }
            ?>

            <?php } ?>
            <?php } ?>

                <tr class="tr-espaco">
                    <td>Total Horas</td>
                    <td>---</td>
                    <td>
                        ---
                    </td>
                    <td>
                        ---
                    </td>
                    <td>
                        <?php echo $function->sumHours($totalHoras); ?>
                    </td>
                </tr>

        </table>

    </section>
</body>
</html>