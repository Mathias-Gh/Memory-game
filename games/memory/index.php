<!DOCTYPE html>
<html lang="fr">
    <?php
        require_once '../../utils/common.php';
        require_once SITE_ROOT.'utils/database.php';
        require_once SITE_ROOT.'partials/head.php';
    ?>

    <body id="memory">
        <header class="header login"> 

            <?php
                require_once SITE_ROOT.'partials/header.php';
            ?>

            <h2 class="connexion">Explorez l'univers du Memory Spatial</h2>
        </header>
        <main>
        <div class="container">
        <a href=""><img src="../../assets/images/arrowBack.png" class="arrowBack2" alt=""></a>
            <h2 id="counter">00:00:00:00</h1>
        </div>
        <a href=""><img src="../../assets/images/arrowBack.png" class="arrowBack" alt=""></a>
        <article class="themeChoice">
                <h3>Choisissez le thème de jeu :</h3>
                <div>
                    <div id="photo1">
                        <h2 id="photo1H2">Dessin</h2>
                    </div>
                    <div id="photo2">
                        <h2 id="photo2H2">Réalité</h2>
                    </div>
                    <div id="photo3">
                        <h2 id="photo3H2">Constellation</h2>
                    </div>
                </div>
            </article>
            <article class="levelDifficult">
                <h3>Choisissez votre niveau de difficulté :</h3>
                <div>
                    <button id="easy">Facile</button>
                    <button id="normal">Normal</button>
                    <button id="difficile">Difficile</button>
                </div>
            </article>
            <?php require_once SITE_ROOT.'chat.php';?>

            <table class="Scores" id="TableMemory1">
                <tr>
                    <td><div id="memory-game"></div></td>
                </tr>
            </table>

            <table class="Scores medium"  id="TableMemory2">
                <tr>
                    <td><div id="memory-game2"></div></td>
                </tr>
            </table>
            
            <table class="Scores hard"  id="TableMemory3">
                <tr>
                    <td><div id="memory-game3"></div></td>
                </tr>
            </table>
        </main>

         <?php
            require_once SITE_ROOT.'partials/footer.php';
         ?>

        <script src="../../assets/js/scripts.js"></script>
    </body>
</html>