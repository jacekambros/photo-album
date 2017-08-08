<?php
/**
 * Created by PhpStorm.
 * User: cgpe
 * Date: 2017-07-26
 * Time: 12:33
 */
//echo $_SESSION['defaultDescription'];
//die();
foreach ($this->get('pictures') as $picture) { ?>
    <div class="edycja">
<!--        <div class="menu">-->
<!--            <a href="index.php?logout">Logout</a>-->
<!---->
<!--        </div>-->
        <div class="obrazek">

            <img src="img/<?php
            echo $picture[1];
            ?>"/>
        </div>
        <div class="formularz">
            <form id="opisObrazu" action="index.php?task=pictures&action=save&idObraz=<?php echo $picture[0] ?>"
                  method="POST">
                <input type="text" name="title" size="40"
                       value='<?php echo empty($picture[2]) ? $_SESSION['defaultTitle'] : $picture[2]; ?>'>
                <input type="text" name="file" size="40" value='<?php echo $picture[1] ?>' readonly>

            </form>

            <textarea form="opisObrazu" name="description" cols="40"
                      rows="5"><?php echo empty($picture[3]) ? $_SESSION['defaultDescription'] : $picture[3]; ?></textarea>
            <a href="index.php?task=pictures&action=edit&idObraz=<?php echo $picture[0] - 1 ?>">Poprzedni</a>
            <a href="index.php?task=pictures&action=edit&idObraz=<?php echo $picture[0] + 1 ?>">Następny</a>
            <a href="index.php">Indeks</a>
            <input type="submit" form="opisObrazu"
                   value="<?php echo (empty($picture[2])) && (empty($picture[3])) ? "Zapisz (Nie zapisane)" : "Zapisz" ?>">

        </div>

    </div>
<?php } ?>

