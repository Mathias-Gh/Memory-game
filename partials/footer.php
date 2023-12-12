<?php
$MaPage=($_SERVER['REQUEST_URI']);

?>

<?php if ($MaPage != "/Projet-Flash/index.php"): ?>
    
    <footer id="footerAccueil">
            <article>
                <h4>Information</h4>
                <p>N'hésiter pas à  nous contacter pour le moindre problème</p>
                <p><span>Tel : </span> 06 05 04 03 02</p>
                <p><span>Email : </span> support@powerofmemory.com</p>
                <p><span>Location : </span> Paris</p>
                <div>
                    <img src="<?=PROJECT_FOLDER?>assets/images/Facebook.png" alt="Facebook" id="facebook">
                    <img src="<?=PROJECT_FOLDER?>assets/images/twitter-128.png" alt="twitter">
                    <img src="<?=PROJECT_FOLDER?>assets/images/G-logo.png" alt="twitter">
                    <img src="<?=PROJECT_FOLDER?>assets/images/pinterest2.png" alt="pinterest" id="pinterest">
                    <img src="<?=PROJECT_FOLDER?>assets/images/instagram.png" alt="twitter">
                </div>
                <p>Copyright © 2023 Tous droits réservés</p>
            </article>
            <article>
                <h4>Space Memory</h4>
                <ul>
                    <li><a href="<?= !empty($_SESSION['userId']) ? PROJECT_FOLDER."games/memory/index.php" : PROJECT_FOLDER."login.php";?>" > Jouer !</a></li>
                    <li><a href="<?=PROJECT_FOLDER?>games/memory/Score.php" > Les scores</a></li>
                    <li><a href="<?=PROJECT_FOLDER?>contact.php" > Nous contacter</a></li>
                </ul>
                <a href="#backgroundHeader"><button class="upButton"></button></a>
            </article>
        </footer>

<?php else: ?>
    
        <footer id="footerAccueil">
            <article>
                <h4>Information</h4>
                <p>N'hésiter pas à  nous contacter pour le moindre problème</p>
                <p><span>Tel : </span> 06 05 04 03 02</p>
                <p><span>Email : </span> support@powerofmemory.com</p>
                <p><span>Location : </span> Paris</p>
                <div>
                    <img src="<?=PROJECT_FOLDER?>assets/images/Facebook.png" alt="Facebook" id="facebook">
                    <img src="<?=PROJECT_FOLDER?>assets/images/twitter-128.png" alt="twitter">
                    <img src="<?=PROJECT_FOLDER?>assets/images/G-logo.png" alt="twitter">
                    <img src="<?=PROJECT_FOLDER?>assets/images/pinterest2.png" alt="pinterest" id="pinterest">
                    <img src="<?=PROJECT_FOLDER?>assets/images/instagram.png" alt="twitter">
                </div>
                <p>Copyright © 2023 Tous droits réservés</p>
            </article>
            <article>
                <h4>Space Memory</h4>
                <ul>
                    <li><a href="<?= !empty($_SESSION['userId']) ? PROJECT_FOLDER."games/memory/index.php" : PROJECT_FOLDER."login.php";?>" > Jouer !</a></li>
                    <li><a href="<?=PROJECT_FOLDER?>games/memory/Score.php" > Les scores</a></li>
                    <li><a href="<?=PROJECT_FOLDER?>contact.php" > Nous contacter</a></li>
                </ul>
                <a href="#headerAccueil"><button class="upButton"></button></a>
            </article>
        </footer>

<?php endif; ?>