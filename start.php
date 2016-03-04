<?php
    if (isset($_SESSION["user"]["user_id"])) {
        header("Location: ?view=profile");            
    }
   
?>
<?php require_once("header.phtml"); ?>
       
        <div class="form">
            
            <form class="form-horizontal" action="" method="post">
                <div class="form-group">
                    <label  class="col-sm-2 control-label"><?=$lang[$langName]["email"];?></label>
                    <div class="col-sm-10">
                        <input type="email" name="email" class="form-control"  placeholder="<?=$lang[$langName]["emailTip"]?>">
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-sm-2 control-label"><?=$lang[$langName]["password"];?></label>
                    <div class="col-sm-10">
                        <input type="password" name="password" class="form-control"  placeholder="<?=$lang[$langName]["passwordTip"]?>">
                    </div>
                </div>
                <input type="hidden" name="action" value="0">
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary btn-lg active"><?=$lang[$langName]["signIn"]?></button>
                    <a href="?view=signup"  class="btn btn-primary btn-lg active"><?=$lang[$langName]["signUp"]?></a>
                  </div>
                </div>
            </form>
        </div>
        
    </body>
</html>