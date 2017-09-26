<?php
include ("grafo.php");
session_start();

if (!isset($_SESSION["grafo"])) {
    $_SESSION["grafo"] = new grafo();
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>GRAFOS</title>

        <script type="text/javascript" src="vis/dist/vis.js"></script>
        <link href="vis/dist/vis.css" rel="stylesheet" type="text/css">

        <style type="text/css">
            #grafo1{
                width: 800px;
                height: 400px;
                border: 1px solid black;
            }
        </style>

        <style>
            #submit {
                font-weight: bold;
                cursor: pointer;
                padding: 6px;
                margin: 0 10px 20px 0px;
                border: 1px solid #000;
                background: #bce8f1;
                border-radius: 15px 8px 8px 8px;
            }

            #submit1 {
                font-weight: bold;
                cursor: text;
                padding: 6px;
                margin: 0 10px 20px 0px;
                border: 1px solid #000;
                background: #B4EEB4;
                border-radius: 8px 8px 8px 8px;
            }

            #submit2 {
                font-weight: bold;
                padding: 6px;
                margin: 0 10px 20px 0px;
                border: 1px solid #000;
                background: #FFFFCC;
                border-radius: 8px 8px 8px 8px;
            }

            #submit:hover {
                background: #ccc;
            }

            input:required {
                outline: 1px solid red;
            }
        </style>
    </head>

    <body bgcolor="#FEDEF5">

        <font color="blue"><h1 style="text-align:center;"> Proyecto de Grafos</h1></font>

    <center><marquee direction="right" id="ejemplo"><span class="Apple-style-span" style="color: red;">Angela Oliveros, Brianis Ruiz & Wilson Padilla</span></marquee> <a href="javascript:void(0);"></a> <a href="javascript:void(0);"></a></center>   

    <img src="95.png">
    <font size=5><b>Agregar Vertice</b></font>
    <form action="index.php" method="post" id="submit2">
        <label> Id de Vertice: </label>  
        <input type="text" name="ivertice" id="submit1" required>
        <input type="submit" value="Agregar" id="submit" name="submit"><br>

    </form>

    <img src="95.png">
    <font size=5><b>Agregar Arista</b></font>
    <form action="index.php" method="post" id="submit2">
        <label> Vertice Origen: </label>  
        <input type="text" name="vorigen" id="submit1" required>
        <label> Vertice Destino: </label>  
        <input type="text" name="vdestino" id="submit1"required>
        <label> Peso: </label>  
        <input type="text" name="vpeso" id="submit1"pattern="[0-9]">
        <input type="submit" value="Agregar"id="submit" name="submit"><br>
    </form>

    <img src="65.png">
    <font size=5><b>Ver Vertice</b></font>
    <form action="index.php" method="post" id="submit2">
        <label> Id de Vertice: </label>  
        <input type="text" name="idvertice" id="submit1"required>
        <input type="submit" value="Mostrar"id="submit" name="submit"><br>
    </form>

    <img src="65.png">
    <font size=5><b>Ver Adyacentes</b></font>
    <form action="index.php" method="post" id="submit2">
        <label> Id de Vertice: </label>  
        <input type="text" name="adyacente" id="submit1"required>
        <input type="submit" value="Mostrar"id="submit" name="submit"><br>
    </form>

    <img src="65.png">
    <font size=5><b>Ver Grado</b></font>
    <form action="index.php" method="post" id="submit2">
        <label> Id de Vertice: </label>  
        <input type="text" name="grado" id="submit1"required>
        <input type="submit" value="Mostrar"id="submit" name="submit"><br>
    </form>

    <img src="42.png">
    <font size=5><b>Invertir Aristas</b></font>
    <form action="index.php" method="post" id="submit2"> 
        <label> Id de Vertice: </label>  
        <input type="text" name="vertice1" id="submit1"required>
        <label> Id de Vertice: </label>  
        <input type="text" name="vertice2" id="submit1"required>
        <input type="submit" value="Invertir"id="submit" name="submit"><br>
    </form>

    <img src="42.png">
    <font size=5><b>Invertir Todas las Aristas</b></font>
    <form action="index.php" method="post" id="submit2"> 
        <input type="submit" value="Invertir"id="submit" name="submit1"><br>
    </form> 
    
    <img src="65.png">
    <font size=5><b>Ver Vertice con Mayor Grado</b></font>
    <form action="index.php" method="post" id="submit2">
        <input type="submit" value="Mostrar"id="submit" name="submit2"><br>
    </form>
    
    <img src="42.png">
    <font size=5><b>Convertir a NO Dirigido</b></font>
    <form action="index.php" method="post" id="submit2"> 
        <input type="submit" value="Convertir"id="submit" name="submit3"><br>
    </form> 

    <img src="33.png">
    <font size=5><b>Eliminar Vertice</b></font>
    <form action="index.php" method="post" id="submit2">
        <label> Id de Vertice: </label>  
        <input type="text" name="vertice" id="submit1"required>
        <input type="submit" value="Eliminar"id="submit" name="submit"><br>
    </form>

    <img src="33.png">
    <font size=5><b>Eliminar Arista</b></font>
    <form action="index.php" method="post" id="submit2">
        <label> Vertice Origen: </label>  
        <input type="text" name="origen" id="submit1"required>
        <label> Vertice Destino: </label>  
        <input type="text" name="destino" id="submit1"required>
        <input type="submit" value="Eliminar"id="submit" name="submit"><br>
    </form>

    <?php
    if (isset($_POST["ivertice"])) {
        $v = new Vertice($_POST["ivertice"]);
        $_SESSION["grafo"]->agregarVertice($v);
    }


    if (isset($_POST["vorigen"], $_POST["vdestino"], $_POST["vpeso"])) {
        $p = $_SESSION["grafo"]->encontrarV($_POST["vorigen"]);
        $d = $_SESSION["grafo"]->encontrarV($_POST["vdestino"]);
        if ($p == false || $d == false) {
            echo "¡¡¡¡¡¡¡¡¡EL VERTICE NO EXISTE!!!!!!!!!!";
        } else {
            $_SESSION["grafo"]->agregarArista($_POST["vorigen"], $_POST["vdestino"], $_POST["vpeso"]);
        }
    }



    if (isset($_POST["idvertice"])) {
        $p = $_SESSION["grafo"]->encontrarV($_POST["idvertice"]);
        if ($p == false) {
            echo "¡¡¡¡¡¡¡¡¡EL VERTICE NO EXISTE!!!!!!!!!!";
        } else {
            echo "El vertice es: ";
            echo '<pre>' . var_export($_SESSION["grafo"]->getVertice($_POST["idvertice"])) . '</pre>';
        }
    }

    if (isset($_POST["adyacente"])) {
        $p = $_SESSION["grafo"]->encontrarV($_POST["adyacente"]);
        if ($p == false) {
            echo "¡¡¡¡¡¡¡¡¡EL VERTICE NO EXISTE!!!!!!!!!!";
        } else {
            echo "Los adyacentes son: ";
            echo '<pre>' . var_export($_SESSION["grafo"]->getAdyacentes($_POST["adyacente"]), true) . '</pre>';
        }
    }


    if (isset($_POST["grado"])) {
        $p = $_SESSION["grafo"]->encontrarV($_POST["grado"]);
        if ($p == false) {
            echo "¡¡¡¡¡¡¡¡¡EL VERTICE NO EXISTE!!!!!!!!!!";
        } else {
            echo "El grado total es: ";
            var_export($_SESSION["grafo"]->grado($_POST["grado"]));
        }
    }

    if (isset($_POST["vertice"])) {
        $p = $_SESSION["grafo"]->encontrarV($_POST["vertice"]);
        if ($p == false) {
            echo "¡¡¡¡¡¡¡¡¡EL VERTICE NO EXISTE!!!!!!!!!!";
        } else {
            $_SESSION["grafo"]->eliminarVertice($_POST["vertice"]);
        }
    }


    if (isset($_POST["origen"], $_POST["destino"])) {
        $p = $_SESSION["grafo"]->encontrarV($_POST["origen"]);
        $d = $_SESSION["grafo"]->encontrarV($_POST["destino"]);
        if ($p == false || $d == false) {
            echo "¡¡¡¡¡¡¡¡¡EL VERTICE NO EXISTE!!!!!!!!!!";
        } else {
            $_SESSION["grafo"]->eliminarArista($_POST["origen"], $_POST["destino"]);
        }
    }

    if (isset($_POST["vertice1"], $_POST["vertice2"])) {
        $v = $_SESSION["grafo"]->encontrarV($_POST["vertice1"]);
        $b = $_SESSION["grafo"]->encontrarV($_POST["vertice2"]);
        if ($v == false || $b == false) {
            echo "¡¡¡¡¡¡¡¡¡EL VERTICE NO EXISTE!!!!!!!!!!";
        } else {
            $_SESSION["grafo"]->invertirAristas($_POST["vertice1"], $_POST["vertice2"]);
        }
    }
    if (isset($_POST["submit1"])) {
        $_SESSION["grafo"]->elMetodo();
    }
    
    if (isset($_POST["submit2"])) {
        echo var_export($_SESSION["grafo"]->mayorGrado());
    }
    
    if (isset($_POST["submit3"])) {
        $_SESSION["grafo"]->noDirigido();
    }
    ?>


    <div id="grafo1">
    </div>

    <script type="text/javascript">
        var nodos = new vis.DataSet([
<?php
$n = count($_SESSION["grafo"]->getVectorV());
$cant = 0;
foreach ($_SESSION["grafo"]->getVectorV() as $i => $adya) {
    if ($cant == $n) {
        echo "{id: '$i', label: '$i' }";
    } else {
        echo "{id: '$i', label: '$i' },";
    }
    $cant++;
}
?>
        ]);


        var aristas = new vis.DataSet([
<?php
$a = count($_SESSION["grafo"]->getMatrizA());
foreach ($_SESSION["grafo"]->getMatrizA() as $x => $ady) {
    if ($ady != null) {
        foreach ($ady as $y => $l) {
            if ($x == null) {
                echo "{from: '$x', to: '$y', label: '$l'},";
            } else {
                echo "{from: '$x', to: '$y', label: '$l'},";
            }
        }
    }
}
?>
        ]);
        var contenedor = document.getElementById("grafo1");

        var datos = {
            nodes: nodos,
            edges: aristas
        };

        var opciones = {
            edges: {
                arrows: {
                    to: {
                        enabled: true
                    }
                }
            }
        };

        var grafo = new vis.Network(contenedor, datos, opciones);
    </script>
</body>
</html>
