<?php

namespace app\functions;
class Functions{

    public function sumHours($horas){

        // Variáveis para armazenar o total de horas, minutos e segundos
        $totalHoras = 0;
        $totalMinutos = 0;
        $totalSegundos = 0;
        
        // Itera sobre cada hora no array
        foreach ($horas as $hora) {
            // Dividindo as horas, minutos e segundos
            list($horas, $minutos, $segundos) = explode(':', $hora);
            
            // Somando as horas, minutos e segundos
            $totalHoras += $horas;
            $totalMinutos += $minutos;
            $totalSegundos += $segundos;
        }
        
        // Verificando e ajustando os minutos e segundos
        if ($totalSegundos >= 60) {
            $totalMinutos += floor($totalSegundos / 60);
            $totalSegundos %= 60;
        }
        if ($totalMinutos >= 60) {
            $totalHoras += floor($totalMinutos / 60);
            $totalMinutos %= 60;
        }
        
        // Formatando o resultado
        $resultado = sprintf("%02d:%02d:%02d", $totalHoras, $totalMinutos, $totalSegundos);
        
        return $resultado;

    }

    public function subtrairHoras ($horas)
    {
           // Verifica se o array possui pelo menos duas horas
    if (count($horas) < 2) {
        return "<script> alert('Erro: É necessário fornecer pelo menos duas horas para subtração.') </script>";
    }

    // Converte as horas para segundos
    $segundosHora1 = strtotime($horas[0]);
    $segundosHora2 = strtotime($horas[1]);

    // Calcula a diferença em segundos
    $diferencaSegundos = $segundosHora1 - $segundosHora2;

    // Converte a diferença de segundos de volta para o formato de hora
    $diferencaHora = gmdate('H:i:s', abs($diferencaSegundos));

    return $diferencaHora;
    }

}


?>