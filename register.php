<!DOCTYPE html>
<html lang="fr">
    <?php
        require_once 'utils/common.php';
        require_once SITE_ROOT.'utils/database.php';
        require_once SITE_ROOT.'partials/head.php';
        $passwordPattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$._%^&*]).{8,}$/'; 
        $pseudoPattern = '/^.{4,}$/'; 
        $FailEmail = "";
        $UniqueValue = true;


        if (isset($_POST['RegisterEmail']) && isset($_POST['RegisterPseudo']) && isset($_POST['RegisterPassword']) && isset($_POST['RegisterPassword2'])) {
            $RegisterEmail = $_POST['RegisterEmail'];
            $RegisterPseudo = $_POST['RegisterPseudo'];
            $RegisterPassword = $_POST['RegisterPassword'];
            $RegisterPassword2 = $_POST['RegisterPassword2'];
            if(preg_match($passwordPattern, $RegisterPassword) && preg_match($passwordPattern, $RegisterPassword2) && preg_match($pseudoPattern, $RegisterPseudo)){
                if (!filter_var($RegisterEmail, FILTER_VALIDATE_EMAIL)) {
                    $FailEmail= "Le format de l'email n'est pas valide";
                }
                else{
                    if($RegisterPassword == $RegisterPassword2){
                        $HashPassword = hash(
                            'sha512',
                                $RegisterPassword
                        );

                        $pdo0 = connectToDbAndGetPdo();
                        $pdoStatement0 = $pdo0->prepare("SELECT Email, Pseudo FROM Utilisateur");
                        $pdoStatement0->execute();
                        $IsUnique = $pdoStatement0->fetchAll();
                        foreach($IsUnique AS $Unique){
                            if($Unique->Email==$RegisterEmail || $Unique->Pseudo==$RegisterPseudo){
                                $UniqueValue=false;
                            }
                        }

                        if($UniqueValue){
                            $pdo = connectToDbAndGetPdo();
                            $pdoStatement = $pdo->prepare("INSERT INTO Utilisateur (Email, PasswordUser, Pseudo)
                            VALUES
                                ('$RegisterEmail', '$HashPassword', '$RegisterPseudo')");
                            $pdoStatement->execute();

                            $pdo2 = connectToDbAndGetPdo();
                            $pdoStatement2 = $pdo->prepare("SELECT Id FROM Utilisateur
                            WHERE Email = '$RegisterEmail';");
                            $pdoStatement2->execute();
                            $Login = $pdoStatement2->fetchAll();

                            foreach($Login as $user){
                                    $_SESSION['userId'] = $user->Id;
                                    $IdUser = $_SESSION['userId'];
                                    
                                    $nom_dossier = "userFiles/$IdUser";
                                    if (!is_dir($nom_dossier)) {
                                        mkdir($nom_dossier); 
                                    }
                                    $targetDirectory = "userFiles/$IdUser/"; 
                                    $targetFile = $targetDirectory . basename("PP");
                                    if(!file_exists($targetFile)){
                                        copy("assets/images/IconeParDéfaut.png", $targetFile);
                                    }
                                }
                            header('Location: myAccount.php');
                        }
                    }
                }
            }

        }
    ?>
    <body>
        <header class="login header">
            <?php
                require_once SITE_ROOT.'partials/header.php';
            ?>
            <h2 class="connexion">Inscription</h2>
        </header>
        <form class="divInput" method="post">
            <div class="pInput">
                <input name="RegisterEmail" type="email" placeholder="Email">

            </div>

            <div class="pInput">
                <input name="RegisterPseudo" type="pseudo" placeholder="Pseudo">

            </div>

            <div class="pInput"  id="divRegisterPassword">
                <input name="RegisterPassword" type="password" placeholder="Mot de passe" id="registerPassword">

            </div>
            
            <div class="pInput">
                <input name="RegisterPassword2" type="password" placeholder="Confirmer le mot de passe">

            </div>

            <div class="pInput">
                <input type="submit" value="Inscription" class="Submit" id="submitRegister">

            </div> 

            <?= $UniqueValue==false? "Adresse mail ou Pseudo déjà utiliser": "";?>
            <?php echo $FailEmail?>
            <p class="pInput2" >Déjà un compte ? Connecte-toi <a href="login.php" style="color: orange;">ici</a></p>
        </form>
        <?php
            require_once SITE_ROOT.'partials/footer.php';
         ?>
         <script src="assets/js/register.js"></script>
    </body>
</html>