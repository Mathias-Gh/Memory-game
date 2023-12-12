<?php
        require_once '../../utils/common.php';
        require_once SITE_ROOT . 'partials/head.php';
        require_once SITE_ROOT . 'utils/database.php';
        if(!empty($_SESSION['userId'])){$UserId = $_SESSION['userId'];}
        $ChatMessage='';

        $pdo = connectToDbAndGetPdo();
        $pdoStatement = $pdo->prepare("SELECT M.Chat, M.MessageDate, U.Pseudo, M.IdUser FROM `Message` as M
        LEFT JOIN Utilisateur as U ON M.IdUser = U.Id
        WHERE MessageDate + INTERVAL 24 HOUR >= CURRENT_TIMESTAMP
        ORDER BY MessageDate ASC");
        $pdoStatement->execute();
        $chats = $pdoStatement->fetchAll();
        
        $GIFChatLien = "https://api.thecatapi.com/v1/images/search?mime_types=gif";
        $GIFChat=file_get_contents($GIFChatLien);
        $GIFChat2=json_decode($GIFChat, true);
        $URLChat = $GIFChat2[0]['url'];
        $today = date('j');
?>
<div id="pos_chat">
    <input type="checkbox" id="toggle" class="toggle-checkbox">
    <label for="toggle" class="floating-button"></label>
    <div id="chat">
        <div id="head">
            <img src="<?=PROJECT_FOLDER?>userFiles/<?=$UserId?>/PP"class="icone">
            <p>Chat générale</p>
            <img src="<?=$URLChat?>" id="imageApi">
        </div>
        <div id="messages">
            <?php 
            foreach($chats as $chat){
                $datemsg = $chat->MessageDate;
                $heureMinutes = date('H:i', strtotime($datemsg));
                $jour = date('d', strtotime($datemsg));
                if($chat->IdUser==$UserId):
                    $Pseudo = $chat->Pseudo;

            ?>
                    <div class="flex">
                        <div class="column user">
                            <p><?php echo $chat->Pseudo ?></p>
                            <div class="message usersmessage">
                                <p><?php echo $Message = $chat->Chat ?></p>
                            </div>
                            <p><?php echo($today == $jour ? "Aujourd'hui à " : "Hier à "). $heureMinutes ?></p>
                        </div>
                    </div>

                <?php else:?>

                    <div class="flex">
                        <img src="<?=PROJECT_FOLDER?>userFiles/<?=$chat->IdUser?>/PP"class="icone">
                        <div class="column">
                            <p><?php echo $chat->Pseudo ?></p>
                            <div class="message">
                                <p><?php echo $Message = $chat->Chat ?></p>
                            </div>
                            <p><?php echo($today == $jour ? "Aujourd'hui à " : "Hier à "). $heureMinutes ?></p>
                        </div>
                    </div>
                <?php endif;?>
            <?php }?>
        </div>
        <div id="input">
            <form method="post">
                <input id="messageInput" type="text" name="chat" placeholder="Votre message..." onkeydown="handleKeyPress(event)">
                <input id="sendButton" type="button" value="Envoyer" onclick="envoyerMessage()">
            </form>
            <script>
                function handleKeyPress(event) {
                    if (event.keyCode === 13) {
                    event.preventDefault();
                    envoyerMessage()
                    }
                }
                function displayajax(messagetxt){
                    let now = new Date();
                    let heure   = now.getHours();
                    let minute  = now.getMinutes();
                    let chat = document.getElementById("messages");

                    let flex = document.createElement('div');
                        flex.classList.add('flex');
                    let columnUser = document.createElement('div');
                        columnUser.classList.add('column');
                        columnUser.classList.add('user');
                    let Pseudo = document.createElement('p');
                        Pseudo.textContent = '<?php echo $Pseudo?>';
                    let message = document.createElement('div');
                        message.classList.add('message');
                        message.classList.add('usersmessage');
                    let messagecontent = document.createElement('p');
                        messagecontent.textContent = messagetxt;
                    let messageDate = document.createElement('p');
                        messageDate.textContent = "Aujourd'hui à "+heure+":"+minute;

                    message.appendChild(messagecontent);
                    columnUser.appendChild(Pseudo);
                    columnUser.appendChild(message);
                    columnUser.appendChild(messageDate);
                    flex.appendChild(columnUser);
                    chat.appendChild(flex);
                }
            </script>
        </div>
    </div>
</div>