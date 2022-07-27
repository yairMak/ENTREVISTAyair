<?php
$tamañoTablero = $_GET['Ttablero'];
//$tamañoTablero = 9;
$arrayPares = array();
$i = 0;
$arrayImpartes = array();
$a = 0;
if ($tamañoTablero >= 8) {
    for ($j = 1; $j <= $tamañoTablero; $j++) {
        if ($new = $j % 2 == 0) {
            //numeros par
            array_push($arrayPares, $j);
        } else {
            //numeros impares
            array_push($arrayImpartes, $j);
        }
    }
    $R1 = $tamañoTablero % 6;
    if ($R1 == 2 || $R1 == 3) {
        if ($R1 == 2) {
            //numeros pares
            $q = 0;
            while($q < COUNT($arrayImpartes)){
                if($arrayImpartes[$q] == 1){
                    $arrayImpartes[$q] = 3;
                }else if($arrayImpartes[$q] == 3){
                    $arrayImpartes[$q] = 1;
                }else if($arrayImpartes[$q] == 5){
                    unset($arrayImpartes[$q]);
                }
                $q++;
            }
            array_push($arrayImpartes,5);
            $arrayFinal = array_merge($arrayPares, $arrayImpartes);
        } else if ($R1 == 3) {
            //modificamos pares 
            $r = 0;
            while($r < COUNT($arrayPares)){
                if($arrayPares[$r] == 2){
                    unset($arrayPares[$r]);
                }
                $r++;
            }
            array_push($arrayPares,2);
            //modificamos impàres
            $t = 0;
            while($t < COUNT($arrayImpartes)){
                if($arrayImpartes[$t] == 1){
                    unset($arrayImpartes[$t]);
                    array_push($arrayImpartes,1);
                }else if($arrayImpartes[$t] == 3){
                    unset($arrayImpartes[$t]);
                    array_push($arrayImpartes,3);
                }
                $t++;
            }
            $arrayFinal = array_merge($arrayPares, $arrayImpartes);
        }
    } else {
        $arrayFinal = array_merge($arrayPares, $arrayImpartes);
    }
    //impresion resultados
    $arrayrespuesta = array();
    $u=0;
    $p = 1;
    while($u < COUNT($arrayFinal)){
        echo "#reina: ".$p." [fila: ".$p."  ,  columna: ".$arrayFinal[$u]."]"."<br>";
        $u++;
        $p++;
    }

    //dibujo
    $m=0;
    $k=1;
    $dibujo = array();
    while($m  < $tamañoTablero){
       //$dibujo[$m]['id'] = $arrayFinal[$m];
       $dibujo[$m]['info'] = "";
       for($g=0;$g<COUNT($arrayFinal);$g++){
            if($k == $arrayFinal[$g]){
                $dibujo[$m]['info'] .= '* ';
            }else{
                $dibujo[$m]['info'] .= '0 ';
            }
       }
       $k++;
        $m++;
    }
  

    $l = $tamañoTablero;
    while($l >- $tamañoTablero){
        echo $dibujo[$l]['info']."<br>";
        $l--;
    }


    //var_dump($arrayFinal);
} else {
    echo "El tamaño mínimo del tablero es 8";
}

?>
