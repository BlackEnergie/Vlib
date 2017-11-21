<div id ='nav'>

</div>

<div class='bandeau'>
	<div class="logo">
        <a href="index.php?vlibMP=accueil">
        <img src="images/icon-vlib.png">
        </a>
    </div>
    <div class="bienvenue">
        <?php
        if(isset($_SESSION['identification'])){
            echo "<p>Bienvenue</p><p>" . $_SESSION['identification'] . "</p>";
        }
        ?>
    </div>
</div>

<nav class="menuPrincipal">
	<?php
	echo $menuPrincipal;
	?>
</nav>

