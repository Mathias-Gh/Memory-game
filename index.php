<!DOCTYPE html>
<html lang="fr">
    <?php
        require_once 'utils/common.php';
        require_once SITE_ROOT.'utils/database.php';
        require_once SITE_ROOT.'partials/head.php';
        $pdo = connectToDbAndGetPdo();
        $pdoStatement = $pdo->prepare('SELECT COUNT(Id) AS NbUser FROM Utilisateur');
        $pdoStatement->execute();
        $UserCount = $pdoStatement->fetch();
        $pdoStatement = $pdo->prepare('SELECT COUNT(Id) AS NbPlayedGame,MIN(GameScore) AS MinScore FROM Score');
        $pdoStatement->execute();
        $ScoreInfo = $pdoStatement->fetch();
        $PlayGame = $ScoreInfo->NbPlayedGame;
        $LowScore = $ScoreInfo->MinScore;
    ?>
    <body>
        <header id="headerAccueil" class="header">
            <?php
                require_once SITE_ROOT.'partials/header.php';
            ?>            
        </header>
        <main id="mainAccueil">
            <section>
                <div id="blockImg">
                    <img src="assets/images/espace/headerBackground.jpg" alt="montagneSpace">
                    <div id="doubleImgBlock">
                        <img src="assets/images/espace/black-hole.avif" alt="meteore">
                        <img src="assets/images/espace/space.webp" alt="space">
                    </div>
                
                </div>
                <div id="blockText">
                    <div>
                        <h3>01</h3>
                        <div>
                            <h4>Les règles :</h4>
                        <p>Toutes les cartes sont étalées faces cachées sur la table. Le premier joueur retourne deux cartes. Si les images sont identiques, il gagne la paire constituée et rejoue. Si les images sont différentes, il les repose faces cachées là où elles étaient et c'est au joueur suivant de jouer.</p>
                        </div>
                    </div>
                    <div> 
                        <h3>02</h3>
                        <div>
                            <h4>L'espace.</h4>
                            <p>L'espace, un univers infini de galaxies, étoiles, et planètes, est régi par les lois de la physique. Notre système solaire, avec le Soleil et ses planètes, appartient à la Voie lactée.</p>
                        </div>
                    </div>
                    <div>
                        <h3>03</h3>
                        <div>
                            <h4>Pourquoi L'espace ?</h4>
                            <p>Nous avons choisi le thème de l'espace car c'est passionant et car c'est un thème qui fait rever par son infinité et sa beauté</p>
                        </div>
                    </div>
                </div>
            </section>
            <section>
                <img src="assets/images/espace/galaxy.jpeg" alt="galaxy">
                <div>
                    <article>
                        <h5><?php echo($PlayGame);?></h5>
                        <p>Parties Jouées</p>
                    </article>
                    <article>
                        <h5>X</h5>
                        <p>Joueurs Connectés</p>
                    </article>
                    <article>
                        <h5><?php echo $LowScore.' sec';?> </h5>
                        <p>Temps Record</p>
                    </article>
                    <article>
                        <h5><?php echo($UserCount->NbUser);?></h5>
                        <p>Joueurs Inscrits</p>
                    </article>
                </div>
            </section>
            <section>
                <h2>Notre Équipe</h2>
                <p>Voici l'Équipe qui a travaillé sur le projet space Memory</p>
                <img src="assets/images/signe.png" alt="signe">
                <div id="blockArticle">
                    <article class="hoverPerso">
                        <div id="alexis" class="imgTeam">
                        </div>
                        <h6>Alexis</h6>
                        <p>Game developper</p>
                        <div>
                            <img src="assets/images/Facebook.png" alt="Facebook">
                            <img src="assets/images/twitter-128.png" alt="twitter">
                            <img src="assets/images/pinterest.jpeg" alt="pinterest">
                        </div>
                    </article>
                    <article>
                        <div id="mathias" class="imgTeam">
                        </div>
                        <h6>Mathias</h6>
                        <p>Database Analyse</p>
                        <div>
                            <img src="assets/images/Facebook.png" alt="Facebook">
                            <img src="assets/images/twitter-128.png" alt="twitter">
                            <img src="assets/images/pinterest.jpeg" alt="pinterest">
                        </div>
                    </article>
                    <article>
                        <div id="leo" class="imgTeam">
                        </div>
                        <h6>Léo</h6>
                        <p>Web developper</p>
                        <div>
                            <img src="assets/images/Facebook.png" alt="Facebook">
                            <img src="assets/images/twitter-128.png" alt="twitter">
                            <img src="assets/images/pinterest.jpeg" alt="pinterest">
                        </div>
                    </article>
                </div>
            </section>
        </main>
        <?php
            require_once SITE_ROOT.'partials/footer.php';
         ?>

    </body>
</html>