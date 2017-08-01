<?php include 'templates/header.html.php'; ?>

<?php foreach($this->get('pictures') as $picture) { ?>
    <a href="<?php
        echo "index.php?task=pictures&action=edycja&idObraz=".$picture[0];
    ?>"><img src="img/img_120x90/<?php
        echo "JA_".substr($picture[1],0,-4)."_120x90.JPG";
    ?>"/></a>

<?php } ?>

<?php include 'templates/footer.html.php'; ?>