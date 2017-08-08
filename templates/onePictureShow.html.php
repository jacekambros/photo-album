<?php
/**
 * Created by PhpStorm.
 * User: cgpe
 * Date: 2017-07-27
 * Time: 15:29
 */
foreach ($this->get('pictures') as $picture) { ?>
    <div class="obrazek">
        <div class="menu">
            <a href="index.php?task=pictures&action=show&idObraz=<?php echo $picture[0] - 1 ?>">Poprzedni</a>
            <a href="index.php?task=pictures&action=show&idObraz=<?php echo $picture[0] + 1 ?>">Następny</a>
            <a href="index.php">Indeks</a>
        </div>
        <p>
            <strong><?php echo empty($picture[2]) ? $_SESSION['defaultTitle'] : $picture[2]; ?>:</strong>
            <?php echo empty($picture[3]) ? $_SESSION['defaultDescription'] : $picture[3]; ?>

        </p>

        <img src="img/<?php
        echo $picture[1];
        ?>"/>
    </div>

<?php } ?>

