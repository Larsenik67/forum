<?php

use App\Service\Session;

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="<?= CSS_PATH ?>style.css">
    <title>Forum</title>
</head>
<body>
<header>
        <div class="banniere">
            <div class="user">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSfXS7fJN_7a8ya0FnVl5NP2-3g_IwPDA6WzuqNjXNyJ2ariI_7ch0xx5EhXSFMBHpg-v4&usqp=CAU" alt="Avatar">
                <p>Nom-d'utilisateur</p>
                <p class="rang">Rang</p>
            </div>
            <div class="navigation">
                <div class="icone">
                    <a href="?ctrl=forum">
                        <i class="fa-solid fa-list"></i>
                    </a>
                    <a href="">
                        <i class="fa-solid fa-star"></i>
                    </a>
                    <a href="">
                        <i class="fa-solid fa-user"></i>
                    </a>
                    <a href="">
                        <i class="fa-solid fa-envelope"></i>
                    </a>
                    <a href="">
                        <i class="fa-solid fa-bell"></i>
                    </a>

                    <?php 
                        if($user = Session::get("user")){
                            if($user->getRole() == "ROLE_ADMIN"){
                         
                    ?>

                    <a href="?ctrl=admin">
                        <i class="fas fa-users-cog"></i>
                    </a>

                    <?php } ?>

                    <a href="?ctrl=security&action=logout">
                        <i class="fas fa-sign-out-alt"></i>
                    </a>

                    <?php }else{
                    ?>

                    <a href="?ctrl=security&action=login">
                        <i class="fas fa-sign-in-alt"></i>
                    </a>

                        <?php } ?>

                </div>
                <div class="search">
                    <button>Recherche</button>
                    <input type="search" id="site-search">
                    <button>Recherche Avancée</button>
                </div>
            </div>
        </div>
    </header>
    <main>
        <?= $content ?>
    </main>
    
</body>
</html>