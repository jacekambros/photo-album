<?php
/**
 * Created by PhpStorm.
 * User: cgpe
 * Date: 2017-07-27
 * Time: 15:29
 */
foreach ($this->get('pictures') as $picture) { ?>
    <img src="img/<?php
    echo $picture[1];
    ?>" width="60%"/>
    <form id="opisObrazu" action="index.php?task=pictures&action=save&idObraz=<?php echo $picture[0]?>" method="POST">
        <input type="text" name="title" value='<?php echo empty($picture[2])?$_SESSION['defaultTitle']:$picture[2]; ?>'>
        <input type="text" name="file" value='<?php echo $picture[1]?>' readonly>
        <a href="index.php?task=pictures&action=show&idObraz=<?php echo $picture[0]-1?>">Poprzedni</a>
        <a href="index.php?task=pictures&action=show&idObraz=<?php echo $picture[0]+1?>">Następny</a>
        <a href="index.php">Indeks</a>


    </form>

    <textarea form="opisObrazu" name="description" cols="40" rows="5"><?php echo empty($picture[3])?$_SESSION['defaultDescription']:$picture[3];?></textarea>

<?php } ?>

