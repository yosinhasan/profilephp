<?php
  
?>
<?php require_once("header.phtml"); ?>
       
    <div class="invite">
         <table class="table table-bordered">
           <thead>
                <tr>
                    <td>
                        #
                    </td>
                    <td>
                        <?=$lang[$langName]["inviteNumber"];?>
                    </td>
                </tr>
           </thead>
           <tbody>
            <?php if (count($invites) > 0) { ?>
                <?php foreach($invites as $key => $value) {?>
                <tr>
                    <td><?=$key+1;?></td>
                    <td> <?=$value["invite"];?></td>
                </tr>
                <tr>
                
                <?php } ?>
            <?php } ?>
           </tbody>
        </table>
        
        </div>    
    </body>
</html>
