<!DOCTYPE html>
<html lang="fr">
    <?php
        require_once 'utils/common.php';
        require_once SITE_ROOT.'utils/database.php';
        require_once SITE_ROOT.'partials/head.php';
        $passwordPattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$._%^&*]).{8,}$/'; 
        $ValidityChange ="";
        $ChangeInfo = "";
        $ChangeInfo2 = "";
        $Output = "";
        $UniqueValue = true;
        if (!empty($_SESSION['userId'])){$IdUser = $_SESSION['userId'];}


        if (isset($_POST['ChangeLastEmail']) && isset($_POST['ChangeNewEmail']) && isset($_POST['ChangePassword'])) {
            $ChangeLastEmail = $_POST['ChangeLastEmail'];
            $ChangeNewEmail = $_POST['ChangeNewEmail'];
            $ChangePassword = $_POST['ChangePassword'];
            $HashPassword = hash(
                'sha512',
                $ChangePassword
            );
            if (!filter_var($ChangeNewEmail, FILTER_VALIDATE_EMAIL)) {
                $ChangeInfo= "Le format de l'email n'est pas valide";
            }else{


                $pdo0 = connectToDbAndGetPdo();
                $pdoStatement0 = $pdo0->prepare("SELECT Email FROM Utilisateur");
                $pdoStatement0->execute();
                $IsUnique = $pdoStatement0->fetchAll();
                foreach($IsUnique AS $Unique){
                    if($Unique->Email==$ChangeNewEmail){
                        $UniqueValue=false;
                        $ChangeInfo= "Email déjà utilisé";
                    }
                }
                if($UniqueValue){
                    $pdo = connectToDbAndGetPdo();
                    $pdoStatement = $pdo->prepare("SELECT PasswordUser, Email FROM Utilisateur
                    WHERE Id='$IdUser';");
                    $pdoStatement->execute();
                    $ChangeLastInfo = $pdoStatement->fetch();

                    if($HashPassword==$ChangeLastInfo->PasswordUser && $ChangeLastEmail==$ChangeLastInfo->Email){
                        $pdoStatement = $pdo->prepare("UPDATE Utilisateur
                        SET Email='$ChangeNewEmail'
                        WHERE Id='$IdUser';");
                        $pdoStatement->execute();
                        $ChangeInfo = "Modification effectuer";
                    }
                    else{
                        $ChangeInfo = 'Email ou mots de passe faux';
                    }
                }
            }
        } 
        if (isset($_POST['ChangeLastPassword']) && isset($_POST['ChangeNewPassword']) && isset($_POST['ChangeNewPassword2'])) {
            $ChangeLastPassword = $_POST['ChangeLastPassword'];
            $ChangeNewPassword = $_POST['ChangeNewPassword'];
            $ChangeNewPassword2 = $_POST['ChangeNewPassword2'];
            if(preg_match($passwordPattern, $ChangeNewPassword) && preg_match($passwordPattern, $ChangeNewPassword2)){

                $HashLastPassword = hash(
                    'sha512',
                    $ChangeLastPassword
                );

                $HashNewPassword = hash(
                    'sha512',
                    $ChangeNewPassword
                );

                $HashNewPassword2 = hash(
                    'sha512',
                    $ChangeNewPassword2
                );

                $pdo = connectToDbAndGetPdo();
                $pdoStatement = $pdo->prepare("SELECT PasswordUser FROM Utilisateur
                WHERE Id='$IdUser';");
                $pdoStatement->execute();
                $ChangeLastInfo = $pdoStatement->fetch();

                if($HashLastPassword==$ChangeLastInfo->PasswordUser && $HashNewPassword==$HashNewPassword2){
                    $pdoStatement = $pdo->prepare("UPDATE Utilisateur
                    SET PasswordUser='$HashNewPassword'
                    WHERE Id='$IdUser';");
                    $pdoStatement->execute();
                    $ChangeInfo2 = "Modification effectuer";
                }
                else{
                    $ChangeInfo2 = 'Mots de passe incorect';
                }
            }
        }
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            if (isset($_FILES["image"])) {
                if(!empty($_FILES["image"]["tmp_name"])){
                    $TailleImage = getimagesize($_FILES["image"]["tmp_name"]);
                    if($TailleImage[0]==$TailleImage[1]){
                        $targetDirectory = "userFiles/$IdUser/"; 
                        $targetFile = $targetDirectory . basename("PP");
                        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                            $Output = "L'image a été changée avec succès.";
                        } else {
                            $Output = "Une erreur est survenue lors du chargement de l'image.";
                        }
                    } else{
                        $Output = "L'image n'est pas carre";
                    }
                }
        }else{
            $Output = "Erreur";
        }
        }

        $pdo = connectToDbAndGetPdo();
        $pdoStatement = $pdo->prepare("SELECT Game.GameName, GameDifficult, GameScore, IdUser FROM Score
        LEFT JOIN Game ON Score.IdGame = Game.Id
        LEFT JOIN Utilisateur On Score.IdUser = Utilisateur.Id
        Where IdUser = $IdUser
        ORDER BY IdGame, GameDifficult, GameScore ASC");
        $pdoStatement->execute();
        $scores = $pdoStatement->fetchAll();
    ?>

    <body>
    <header class="login header">
        <?php
            require_once SITE_ROOT.'partials/header.php';
        ?>
        <h2 class="connexion">Mon Espace</h2>
    </header>

    <main id="mainAccount">
        <section>
            <h2>Ta photo de profil</h2>
            <img class="rounded-circle mt-5" width="150px" src="userFiles/<?=$IdUser?>/PP">
            <form method="post" enctype="multipart/form-data">
                <input type="file" name="image">
                <input type="submit" value="Uploader">
                <?=$Output?>
            </form>
        </section>
              <form method="post">
            <fieldset>
                <h3>Changer le mot de passe</h3>
                <div class="pInput">
                    <input name="ChangeLastPassword" type="password" placeholder="Ancien mot de passe">
                </div>
                <div class="pInput" id="divRegisterPassword">
                    <input name="ChangeNewPassword" type="password" placeholder="Nouveau mot de passe" id="registerPassword">
                </div>
                <div class="pInput">
                    <input name="ChangeNewPassword2" type="password" placeholder="Confirmer le mot de passe">
                </div>
                <input type="submit" value="Changer le mot de passe" class="SubmitEspace">
                <?= $ChangeInfo2?>
            </fieldset>
        </form>
        <form method="post">
            <fieldset>
                <h3>Changer l'adresse email</h3>
                <div class="pInput">
                    <input name="ChangeLastEmail" type="email" placeholder="Ancien email">
                </div>
                <div class="pInput">
                    <input name="ChangeNewEmail" type="pseudo" placeholder="Nouveau email">
                </div>
                <div class="pInput">
                    <input name="ChangePassword" type="password" placeholder="Mot de passe">
                </div>
                <input type="submit" value="Changer l'adresse mail" class="SubmitEspace">
                <?= $ChangeInfo?>
            </fieldset>
        </form>

    </main>
        <div>
            <table class="ScoresAccount">
                        <tr>
                            <th>Nom du Jeu</th>
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
            </div>

    <?php
        require_once SITE_ROOT.'partials/footer.php';
    ?>
    <script src="assets/js/register.js"></script>
    </body>
</html>