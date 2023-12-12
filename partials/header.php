<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script> 
<?php if(!empty($_SESSION)):?>
    <?php
    $MaPage=($_SERVER['REQUEST_URI']);
    if(!empty($_SESSION['userId'])){$IdUser = $_SESSION['userId'];}
    $pdo = connectToDbAndGetPdo();
    $pdoStatement = $pdo->prepare("SELECT Pseudo FROM Utilisateur
    WHERE Id = '$IdUser';");
    $pdoStatement->execute();
    $PseudoUser = $pdoStatement->fetch();
    ?>

    <?php if ($MaPage != "/Projet-Flash/index.php"): ?>
        
        <div id="backgroundHeader">
                        <nav>
                            <div id="logo" class="logo">Space Memory
                                <form action="<?=PROJECT_FOLDER?>profil.php" method="post">
                                    <input name="searchProfil" type="text" placeholder="Rechercher un Profil 🔎" class="searchProfil">
                                </form>
                            </div>
                            <input class="menu-btn" type="checkbox" id="menu-btn" />
                            <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
                            <ul class="menu">
                                <li><a href="<?=PROJECT_FOLDER?>index.php" >Accueil</a></li>

                                <li><a style="color: <?=$MaPage == "/Projet-Flash/games/memory/index.php" ? "orange" : "";?>;" href="<?=PROJECT_FOLDER?>games/memory/index.php" >Jeu</a></li>
                                
                                <li><a style="color: <?=$MaPage == "/Projet-Flash/games/memory/Score.php" ? "orange" : "";?>;" href="<?=PROJECT_FOLDER?>games/memory/Score.php" >Score</a></li>
                                
                                <li><a style="color: <?=$MaPage == "/Projet-Flash/contact.php" ? "orange" : "";?>;" href="<?=PROJECT_FOLDER?>contact.php">Nous Contacter</a></li>
                                
                                <li><a style="color: <?=$MaPage == "/Projet-Flash/myAccount.php" ? "orange" : "";?>;" href="<?=PROJECT_FOLDER?>myAccount.php" id="LienConditionnel">Mon Espace (<?=$PseudoUser->Pseudo?>)</a></li>
                                
                                <li><form action="<?=PROJECT_FOLDER?>disconnect.php" method="post" class="deconnexion"><input type="submit" class="btn" value="Deconnexion"></form></li>
                            </ul>
                        </nav>
                    </div>
                    <audio controls preload="auto" autoplay loop>
                        <source src="<?=PROJECT_FOLDER?>assets/musique/<?=$MaPage == "/Projet-Flash/games/memory/index.php" ? "MusiqueAction.mp3" : "MusiqueTranquille.mp3";?>" type="audio/mpeg" />
                        votre navigateur ne suporte pas l'element audio
                    </audio>

    <?php else: ?>

        <nav>
                    <div id="logo" class="logo">Space Memory
                        <form action="<?=PROJECT_FOLDER?>profil.php" method="post">
                            <input name="searchProfil" type="text" placeholder="Rechercher un Profil 🔎" class="searchProfil">
                        </form>
                    </div>
                    <input class="menu-btn" type="checkbox" id="menu-btn" />
                    <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
                    
                        <ul class="menu">
                            <li><a style="color: orange;" href="<?=PROJECT_FOLDER?>index.php" >Accueil</a></li>
                            <li><a href="<?=PROJECT_FOLDER?>games/memory/index.php" >Jeu</a></li>
                            <li><a href="<?=PROJECT_FOLDER?>games/memory/Score.php" >Score</a></li>
                            <li><a href="<?=PROJECT_FOLDER?>contact.php">Nous Contacter</a></li>
                            <li><a href="<?=PROJECT_FOLDER?>myAccount.php" id="LienConditionnel">Mon Espace (<?=$PseudoUser->Pseudo?>)</a></li>
                            <li><form action="<?=PROJECT_FOLDER?>disconnect.php" method="post" class="deconnexion"><input type="submit" value="Deconnexion" class="btn"></form></li>
                        </ul>
                    </nav>
                <h1>BIENVENUE DANS NOTRE STUDIO !</h1>
            <p>Venez challenger les cerveaux les plus agiles !</p>
            <a href="<?=PROJECT_FOLDER?>games/memory/index.php" id="playButton"><button class="btn">Jouer !</button></a>
            <audio controls preload="auto" autoplay loop>
                <source src="assets/musique/MusiqueTranquille.mp3" type="audio/mpeg" />
                votre navigateur ne suporte pas l'element audio
            </audio>

    <?php endif; ?>

<?php else:?>
    <?php
    $MaPage=($_SERVER['REQUEST_URI']);
    ?>

    <?php if ($MaPage != "/Projet-Flash/index.php"): ?>
        
        <div id="backgroundHeader">
                        <nav>
                            <div id="logo" class="logo">Space Memory
                                <form action="<?=PROJECT_FOLDER?>profil.php" method="post">
                                    <input name="searchProfil" type="text" placeholder="Rechercher un Profil 🔎" class="searchProfil">
                                </form>
                            </div>
                            <input class="menu-btn" type="checkbox" id="menu-btn" />
                            <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
                            
                            <ul class="menu">
                                <li><a href="<?=PROJECT_FOLDER?>index.php" >Accueil</a></li>

                                <li><a style="color: <?=$MaPage == "/Projet-Flash/games/memory/index.php" ? "orange" : "";?>;" href="<?=PROJECT_FOLDER?>login.php" >Jeu</a></li>
                                
                                <li><a style="color: <?=$MaPage == "/Projet-Flash/games/memory/Score.php" ? "orange" : "";?>;" href="<?=PROJECT_FOLDER?>games/memory/Score.php" >Score</a></li>
                                
                                <li><a style="color: <?=$MaPage == "/Projet-Flash/contact.php" ? "orange" : "";?>;" href="<?=PROJECT_FOLDER?>contact.php">Nous Contacter</a></li>

                                <li><a style="color: <?=$MaPage == "/Projet-Flash/myAccount.php" ? "orange" : "";?>;" href="<?=PROJECT_FOLDER?>login.php" id="LienConditionnel">Mon Espace</a></li>
                            </ul>
                        </nav>
                    </div>
                    <audio controls preload="auto" autoplay loop>
                        <source src="<?=PROJECT_FOLDER?>assets/musique/<?=$MaPage == "/Projet-Flash/games/memory/index.php" ? "MusiqueAction.mp3" : "MusiqueTranquille.mp3";?>" type="audio/mpeg" />
                        votre navigateur ne suporte pas l'element audio
                    </audio>

    <?php else: ?>

        <nav>
                    <div id="logo" class="logo">Space Memory
                        <form action="<?=PROJECT_FOLDER?>profil.php" method="post">
                            <input name="searchProfil" type="text" placeholder="Rechercher un Profil 🔎" class="searchProfil">
                        </form>
                    </div>
                    <input class="menu-btn" type="checkbox" id="menu-btn" />
                    <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
                    
                        <ul class="menu">
                            <li><a style="color: orange;" href="<?=PROJECT_FOLDER?>index.php" >Accueil</a></li>
                            <li><a href="<?=PROJECT_FOLDER?>login.php" >Jeu</a></li>
                            <li><a href="<?=PROJECT_FOLDER?>games/memory/Score.php" >Score</a></li>
                            <li><a href="<?=PROJECT_FOLDER?>contact.php">Nous Contacter</a></li>
                            <li><a href="<?=PROJECT_FOLDER?>login.php" id="LienConditionnel">Mon Espace</a></li>
                        </ul>
                    </nav>
                <h1>BIENVENUE DANS NOTRE STUDIO !</h1>
            <p>Venez challenger les cerveaux les plus agiles !</p>
            <a href="<?=PROJECT_FOLDER?>login.php" id="playButton"><button class="btn">Jouer</button></a>
            <audio controls preload="auto" autoplay loop>
                <source src="assets/musique/MusiqueTranquille.mp3" type="audio/mpeg" />
                votre navigateur ne suporte pas l'element audio
            </audio>

    <?php endif; ?>



<?php endif; ?>