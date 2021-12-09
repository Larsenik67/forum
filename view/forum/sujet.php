<?php
    $messages = $response["data"]["messages"];
?>
<section class="products">
    <?php  
        foreach($messages as $msg)
        {
        ?>
            <div class="products__item">
                <?= $msg->getContenu() ?><br>
                <?= $msg->getDate() ?><hr>
            </div>
        <?php 
        }
    ?>
</section>