<?php
  
?>
<?php require_once("header.phtml"); ?>
       
    <div class="users">
         <table class="table table-bordered">
           <thead>
                <tr>
                    <td>#</td>
                    <td><?=$lang[$langName]["name"];?></td>
                    <td><?=$lang[$langName]["email"];?></td>
                    <td><?=$lang[$langName]["phone"];?></td>
                    <td><?=$lang[$langName]["country"];?></td>
                    <td><?=$lang[$langName]["city"];?></td>
                </tr>
           </thead>
           <tbody>
            <?php if (isset($users)) { ?>
                <?php foreach($users as $key => $user) {?>
                <tr>
                    <td><?=$key+1;?></td>
                    <td><?=$user["firstName"]." ".$user["lastName"];?></td>
                    <td><?=$user["email"];?></td>
                    <td><?=$user["phone"];?></td>
                    <td><?=$user["country_name"];?></td>
                    <td><?=$user["city_name"];?></td>
                </tr>
                <tr>
                
                <?php } ?>
            <?php } ?>
           </tbody>
        </table>
        
        </div>    
    </body>
</html>
