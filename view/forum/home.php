<?php
    $categories = $response["data"]["categories"];
?>
<section class="case">
    <?php  
        foreach($categories as $cat)
        {
        ?>
            <div class="categorie">
                    <a href="?ctrl=forum&action=categories&id=<?= $cat->getId() ?>">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSfXS7fJN_7a8ya0FnVl5NP2-3g_IwPDA6WzuqNjXNyJ2ariI_7ch0xx5EhXSFMBHpg-v4&usqp=CAU" alt="">
                    <div class="cat">
                        <?= $cat->getNom() ?>
                    </div>
                    </a>
            </div>
        <?php 
        }
    ?>
</section>