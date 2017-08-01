<?php
$lista = scandir("./Bieszczady 2017/");
$lista_lenght = count($lista);
for($i=0;$i<$lista_lenght;$i++){
	if(substr($lista[$i],-3) == "JPG"){
		$nowyPlik = dodajAppendix($lista[$i],"_120x90");
		print($nowyPlik);
		list($width,$height) = getimagesize("./Bieszczady 2017/".$lista[$i]);
		$thumb = imagecreatetruecolor(120,90);
		$source = imagecreatefromjpeg("./Bieszczady 2017/".$lista[$i]);
		imagecopyresized($thumb,$source,0,0,0,0,120,90,$width,$height);
		imagejpeg($thumb,$nowyPlik);
		print("Plik:" . $nowyPlik."\n");
	}
	
}

function dodajAppendix($nazwaImg,$appendixImg){
	return "JA_".substr($nazwaImg,0,-4).$appendixImg.".JPG";
}