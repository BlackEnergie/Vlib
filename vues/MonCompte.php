
<div id="conteneur">

    <div id='header'>
        <?php include 'haut.php' ;?>
    </div>

    <div id="content">
        <label id="text">Bonjour
            <?php
                echo $_SESSION['identification'];
            ?>
            !</label>
        <div id="bas">
            <?php  include 'bas.php' ;?>
        </div>

    </div>
</div