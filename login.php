<!DOCTYPE html>
<html lang="fr">
    <?php
        require_once 'utils/common.php';
        require_once SITE_ROOT.'utils/database.php';
        require_once SITE_ROOT.'partials/head.php';
        $ValidityConnection ="";


        if (isset($_POST['LoginEmail']) && isset($_POST['LoginPassword'])) {
            $LoginEmail = $_POST['LoginEmail'];
            $LoginPassword = $_POST['LoginPassword'];
            $HashPassword = hash(
                'sha512',
                $LoginPassword
            );
            $pdo = connectToDbAndGetPdo();
            $pdoStatement = $pdo->prepare("SELECT Id, Email, PasswordUser FROM Utilisateur");
            $pdoStatement->execute();
            $Login = $pdoStatement->fetchAll();
        }
    ?>
    <body>
        <header class="login header">
            <?php
                require_once SITE_ROOT.'partials/header.php';
            ?>
            <h2 class="connexion">Login</h2>
        </header>
        <form class="divInput" method="post">
            <p class="pInput"><input name="LoginEmail" type="email" placeholder="Email"></p>
            <p class="pInput"><input name="LoginPassword" type="password" placeholder="Mot de passe"></p>
            <p class="pInput"><input type="submit" value="Connexion" class="Submit"></p>
            <?php if(!empty($Login)):?>
            <?php foreach($Login as $user){
                if($user->Email == $LoginEmail){
                    if ($user->PasswordUser==$HashPassword){
                        $_SESSION['userId'] = $user->Id;
                        $IdUser = $_SESSION['userId'];
                        
                        $nom_dossier = "userFiles/$IdUser";
                        if (!is_dir($nom_dossier) && !file_exists($nom_dossier)) {
                            mkdir($nom_dossier); 
                        }
                        $targetDirectory = "userFiles/$IdUser/"; 
                        $targetFile = $targetDirectory . basename("PP");
                        if(!file_exists($targetFile)){
                            copy("assets/images/IconeParDéfaut.png", $targetFile);
                        }
                        header('Location: myAccount.php');
                        
                    }else{
                        $Result='adresse mail ou mot de passe incorect';}
                }else{
                    $Result='adresse mail ou mot de passe incorect';}
            }
            echo $Result;?>
            <?php endif?>
            <p class="pInput2">Pas encore de compte ? Créer en un <a href="register.php" style="color: orange;">ici</a></p>
        </form>
        <?php
            require_once SITE_ROOT.'partials/footer.php';
         ?>

    </body>
</html>