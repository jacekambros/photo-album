<h2>Indeks - Podgląd</h2>


<?php foreach($this->get('pictures') as $picture) { ?>
<a href="<?php
        echo "index.php?task=pictures&action=show&idObraz=".$picture[0];
?>"><img src="img/img_120x90/<?php
        echo "JA_".substr($picture[1],0,-4)."_120x90.JPG";
?>"/></a>

<?php } ?>

