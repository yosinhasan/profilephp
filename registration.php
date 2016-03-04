<?php
    if (isset($_SESSION["user"]["user_id"])) {
        header("Location: ?view=profile");            
    }
?>
<?php require_once("header.phtml"); ?>
        <div class="form2">
            <form class="form-horizontal" action="index.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label  class="col-sm-2 control-label"><?=$lang[$langName]["userName"];?></label>
                    <div class="col-sm-10">
                        <input type="text" name="userName" class="form-control"  placeholder="<?=$lang[$langName]["userNameTip"];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-sm-2 control-label"><?=$lang[$langName]["userSurname"];?></label>
                    <div class="col-sm-10">
                        <input type="text" name="userSurname" class="form-control"  placeholder="<?=$lang[$langName]["userSurnameTip"];?>">
                    </div>
                </div>
                 <div class="form-group">
                    <label  class="col-sm-2 control-label"><?=$lang[$langName]["phone"];?></label>
                    <div class="col-sm-10">
                        <input type="text" name="phone" class="form-control"  placeholder="<?=$lang[$langName]["phoneTip"];?>">
                    </div>
                </div>
                   <div class="form-group">
                    <label class="col-sm-2 control-label"><?=$lang[$langName]["country"];?></label>
                    <div class="col-sm-10">
                        <select class="form-control"  name = "country">
                            <option disabled selected value = "0"><?=$lang[$langName]["countryTip"];?></option>
                            <?php foreach ($countries as $value) { ?>
                            <option value = "<?=$value["id"];?>" ><?=$value["country_name"];?></option>
                            <?php } ?>
                            
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label"><?=$lang[$langName]["city"];?></label>
                    <div class="col-sm-10">
                        <select class="form-control" name="city">
                            <option disabled selected value = "0"><?=$lang[$langName]["cityTip"];?></option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label"><?=$lang[$langName]["avatar"];?></label>
                    <div class="col-sm-10">
                        <input type="file" name="file" class="form-control"  placeholder="<?=$lang[$langName]["avatarTip"];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label"><?=$lang[$langName]["email"];?></label>
                    <div class="col-sm-10">
                        <input type="email" name="email" class="form-control"  placeholder="<?=$lang[$langName]["emailTip"];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-sm-2 control-label"><?=$lang[$langName]["invite"];?></label>
                    <div class="col-sm-10">
                        <input type="text" name="invite" class="form-control"  placeholder="<?=$lang[$langName]["inviteTip"];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label"><?=$lang[$langName]["password"];?></label>
                    <div class="col-sm-10">
                        <input  id="pass" type="password" name="password" class="form-control"  placeholder="<?=$lang[$langName]["passwordTip"];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-sm-2 control-label"><?=$lang[$langName]["repeatPassword"];?></label>
                    <div class="col-sm-10">
                        <input  type="password" name="repeatPassword" class="form-control"  placeholder="<?=$lang[$langName]["repeatPasswordTip"];?>">
                    </div>
                </div>
                <input type="hidden" name="action" value="1">
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <input id = "submit"  type="submit" class="btn btn-primary btn-lg active" value="<?=$lang[$langName]["signUp"];?>">
                    <input class="btn btn-danger btn-lg active" type="reset" value = "reset">
                  </div>
                </div>
            </form>
            
            <?php if (isset($_SESSION['error'])): ?>
            <div class="error">
            <?php foreach ($_SESSION['error'] as $value): ?>
            <p class="bg-primary"><?=$value; ?></p>
            <?php endforeach; ?>
            </div>
            <?php endif; ?>
            <?php unset ($_SESSION["error"]); ?>
            <script type="text/javascript" src="js/work.js" ></script> 
        </div>
      
    </body>
</html>