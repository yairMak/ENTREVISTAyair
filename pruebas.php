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
<!--
    <html>

    <head>
        <style>
            #example {
                width: 100%;
                height: 300px;
                background-color: #AED6F1;
                font-size: 13px;
                /*text-align: center;*/
            }

            .titulo_principal {
                text-align: left;
                font-weight: 800;
                font-size: 20px;
            }

            .center {
                display: flex;
                justify-content: center;

            }

            .div1 {
                background-color: rgb(218, 217, 217, 0.6);
                width: 80%;
            }

            .parrafo1 {
                text-align: center;
                margin: 10 20 10 20;
                font-style: italic;


            }

            .parrafo2 {
                text-align: justify;
                margin: 10px;
            }

            .div_botones {
                margin-top: 2rem;
                display: grid;
                grid-template-columns: 1fr 1fr;
                grid-row: 1rem;
                text-align: center;
            }

            .btn {
                /* outline: solid; */
                text-decoration: none;
                color: #9846A1;
                padding: .5rem;
                /*background-color: #9846A1;*/
                border-color: #9846A1;
                border-style: solid;
                border-radius: .3rem;

            }

            .btn2 {
                text-decoration: none;
                color: #FFFFFF;
                padding: .5rem;
                background-color: #9846A1;
                border-color: #9846A1;
                border-style: solid;
                border-radius: .3rem;

            }
        </style>
    </head>

    <body>
        <div id="example">
            <h1 class="titulo_principal">Paragraph 1</h1>
            <div class="center">
                <div class="div1">
                    <p class="paragraph1 parrafo1">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent dapibus lacus ut neque sodales sodales. Sed vitae felis nisl. Curabitur posuere iaculis ultrices. Fusce volutpat, eros eget mollis convallis, elit sem pretium elit, tempor volutpat est arcu a magna. Donec nec mauris accumsan, semper velit eget, sollicitudin eros. Curabitur arcu urna, varius a mauris id, dignissim auctor mauris. Quisque ac suscipit ante. Interdum et malesuada fames ac ante ipsum primis in faucibus.
                    </p>
                </div>
            </div>
            <h2 class="titulo_principal">Paragraph 2</h2>
            <p class="paragraph parrafo2">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent dapibus lacus ut neque sodales sodales. Sed vitae felis nisl. Curabitur posuere iaculis ultrices. Fusce volutpat, eros eget mollis convallis, elit sem pretium elit, tempor volutpat est arcu a magna. Donec nec mauris accumsan, semper velit eget, sollicitudin eros. Curabitur arcu urna, varius a mauris id, dignissim auctor mauris. Quisque ac suscipit ante. Interdum et malesuada fames ac ante ipsum primis in faucibus.
            </p>
        </div>
        <div class="div_botones ">
            <div><a class="btn" href="https://www.google.com/" target="_blank">Google</a></div>
            <div><a class="btn2" href="mailto:info@2d-group.com?subject=Correo%20de%20prueba%20técnica%20para%20software%20development&body=Este%20es%20el%20correo%20generado%20para%20la%20prueba%20técnica%20de%20software%20development,%20favor%20de%20ignorar" target="_bank">E-mail</a></div>
        </div>
    </body>

    </html>
    -->