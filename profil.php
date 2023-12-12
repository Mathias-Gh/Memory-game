<!DOCTYPE html>
<html lang="fr">
    <?php
        require_once 'utils/common.php';
        require_once SITE_ROOT.'utils/database.php';
        require_once SITE_ROOT.'partials/head.php';
        $PseudoShearch='';
        if (isset($_POST['searchProfil'])) {
            $PseudoShearch = $_POST['searchProfil'];
        }
        if(!$PseudoShearch==''){
            $pdo2 = connectToDbAndGetPdo();
            $pdoStatement2 = $pdo2->prepare("SELECT Game.GameName, Utilisateur.Pseudo, GameDifficult, GameScore, IdUser FROM Score
            LEFT JOIN Game ON Score.IdGame = Game.Id
            LEFT JOIN Utilisateur On Score.IdUser = Utilisateur.Id
            Where Utilisateur.Pseudo = '$PseudoShearch'
            ORDER BY IdGame, GameDifficult, GameScore ASC");
            $pdoStatement2->execute();
            $scores = $pdoStatement2->fetchAll();
        }
        if(!$PseudoShearch==''){
            $pdo3 = connectToDbAndGetPdo();
            $pdoStatement3 = $pdo3->prepare("SELECT Id FROM Utilisateur
            Where Pseudo = '$PseudoShearch'");
            $pdoStatement3->execute();
            $IdPseudo = $pdoStatement3->fetch();
            if ($IdPseudo != false){
                $IdSchearch = $IdPseudo->Id;
            }else {
                $IdSchearch = NUll;
            }
            
        }
        ?>
    <body class="contact">
        <header class="login header">
            <?php
                require_once SITE_ROOT.'partials/header.php';
            ?>
            <h2 class="connexion">Profil</h2>
        </header>
        <h2 class="PseudoPageProfil">
        <?php if($IdSchearch != NULL): ?>
            <?=$PseudoShearch?><br><br>
            <img class="rounded-circle mt-5 " width="200px" src="userFiles/<?=$IdSchearch?>/PP"></h2>
            <table class="PageScores">
                <tr>
                    <th>Jeux</th>
                    <th>Niveau de Difficulté</th>
                    <th>Score du Joueur</th>
                </tr>
                <?php
                    foreach ($scores as $score) {
                ?>
                <tr>
                    <td><?php echo $score->GameName ?></td>
                    <td><?php echo $score->GameDifficult == 1 ? "Facile" : ($score->GameDifficult == 2 ? "Moyen" : "Difficile")?></td>
                    <td><?php echo $score->GameScore; ?></td>
                </tr>
                <?php }?>
            </table>
        <?php else:?>
            <br><?=$PseudoShearch?> n'est pas un utilisateur existant</h2>
        <?php endif?>
        <?php
            require_once SITE_ROOT.'partials/footer.php';
         ?>
    </body>
</html>