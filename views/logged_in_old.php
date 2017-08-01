<a href="index.php?logout">Logout</a>
<a href="index.php">Lista</a>
<br>
<?php
if (isset($_GET["obraz"])) {
//    $plik = $_GET["obraz"];
//    print("<img src='img/".$_GET["obraz"]."' alt='".$_GET["obraz"]."' width=100%>");
//    print($plik."<br>");
    include("views/obraz_edycja.php");

} else {
$lista = scandir("img/");
$lista_lenght = count($lista);

for($i=0;$i<$lista_lenght;$i++){
    if(substr($lista[$i],0,2) == "JA"){
        print("<a href=\"index.php?obraz=".substr($lista[$i],3,-11).".JPG"."\"><img src='img/".$lista[$i]."' alt='Bieszczady 2017'></a>");
    }

}

}
function dodajAppendix($nazwaImg,$appendixImg){
    return "JA_".substr($nazwaImg,0,-4).$appendixImg.".JPG";
}
?>
<!-- because people were asking: "index.php?logout" is just my simplified form of "index.php?logout=true" -->
