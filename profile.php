<?php
    if (!isset($_SESSION["user"]["user_id"])) {
        header("Location: index.php");            
    }
?>
<?php require_once("header.phtml"); ?>
       
    <div class="profile">
       <img class="img-thumbnail" src="images/<?=isset($_SESSION["user"]["img"]) ? $_SESSION["user"]["img"] : "default.jpg";?>">
         <table class="table table-bordered">
           
            <tr>
                <td> <?=$lang[$langName]["name"]?></td>
                <td> <?=$_SESSION["user"]["name"];?> </td>
            </tr>
            <tr>
                <td> <?=$lang[$langName]["email"]?> </td>
                <td> <?=$_SESSION["user"]["user"];?> </td>
            </tr>
                    
        </table>
        
        </div>
            <?php if (isset($_SESSION['error'])): ?>
            <div class="error">
            <?php foreach ($_SESSION['error'] as $value): ?>
            <p class="bg-primary"><?=$value; ?></p>
            <?php endforeach; ?>
            </div>
            <?php endif; ?>
            <?php unset ($_SESSION["error"]); ?>
    </body>
</html>
