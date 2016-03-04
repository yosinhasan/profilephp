<?php
/**
 * @author Yosin Hasan
 * User: phpstudent
 * Date: 5.09.15
 * Time: 18:50
 * @version: 0.0.2
 */
class User extends AbstractModel
{
    private $table = "users";
    private $request;

    public function __construct()
    {
        parent::__construct($this->table);
        $this->addField("email", "");
        $this->addField("password", "");
        $this->addField("phone", "");
        $this->addField("id_city", "");
        $this->addField("invite", "");
        $this->addField("firstName", "");
        $this->addField("lastName", "");
    
        $this->request = new Request();
    }

    /**
     * authorization of user
     *
     * @return bool
     */
    public function authUser()
    {
        
        if (!isset($_SESSION['user'])) {
            if (($this->request->email != "") && ($this->request->password != "")) {
                $email = $this->request->email;
                $password = $this->request->password;
                $check_user = User::getByField(__CLASS__, $this->table, "email", $email);
                if ($check_user->getID() > 0) {
                    if (($this->verify($password,$check_user->password))) {
                        $this->load($check_user->getID());
                        $_SESSION["user"]['user'] = $this->email;
                        $_SESSION["user"]['user_id'] = $this->getID();
                     //   $_SESSION["user"]['img'] = Image::getImage($this->id);
                        $_SESSION["user"]['name'] = $this->firstName." ".$this->lastName;
                    //    $_SESSION["user"]["birthday"] = $this->birthday;
                 //       $_SESSION["user"]["registrated"] = $this->registrated;
                        return true;
                    } else {
                        return false;
                    }
                }
                unset($check_user);
            } else {
                return false;
            }
        } else {
            if ($this->request->logout) {
                $this->destroy();
            } else {
                $this->loadByField('email', $_SESSION['user']);
                $_SESSION['user'] = $this->email;
                $_SESSION['user_id'] = $this->getID();
                return true;
            }
        }
    }
  
    /**
     *  sign up new user
     *
     * @return bool
     */
    public function signUp()
    {
        $error = 0;
        
        if (!preg_match("/^([a-zA-Z0-9_-]+\.)*[a-zA-Z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,4}$/",
                       $this->request->email)) {
            $_SESSION["error"][] = "Not valid email, it should be something like: example@example.com";
            $error++;
        } else {
          
            $this->email  = $this->request->email;
        }
        if ($this->request->repeatPassword != $this->request->password) {
            $_SESSION["error"][] = "The passwords don't match, please input identical passwords into password fields";
            $error++;
        }
        if (strlen($this->request->password) < 6) {
            $_SESSION["error"][] = "The length of password should be more than 6 symbols, please make it right";
            $error++;
        } else {
            $this->password  = $this->hash($this->request->password);
        }
        if (strlen($this->request->userName) < 3) {
            $_SESSION["error"][] = "The length of first name should be more than 3 symbols, please make it right";
            $error++;
        } else {
            $this->firstName = $this->request->userName;
        }
        if (strlen($this->request->userSurname) < 3 ) {
            $_SESSION["error"][] = "The length of second name should be more than 3 symbols, please make it right";
            $error++;
        } else {
            $this->lastName  = $this->request->userSurname;
        }
        $this->id_city = (int) $this->request->city;
        $this->phone = $this->request->phone;
        $this->invite = (int) $this->request->invite;
        if ($error == 0) {
            $data = User::getOnWhere("invites","*","invite = ? AND status = ?", [$this->invite, 0]);
            if ($data) {
                if ($this->save()) {
                    $date = date("Y-m-d",time());
                    $fields = ["status" => 1,"date_status" => $date];
                    $field = "invite";
                    $value = $this->invite;
                    $data = AbstractModel::updateOnField("invites",$fields,$field,$value);
                    $_SESSION["user"]["user"] = $this->email;
                    $_SESSION["user"]["user_id"] = $this->id;
                    $_SESSION["user"]['name'] = $this->firstName." ".$this->lastName;
                
                } else {
                    $_SESSION["error"][] = "fatal error, it's likely someone has already signed up with your email ";
                    return false;
                }       
            } else {
                    $_SESSION["error"][] = "Invite number not existed or have already been used";
                    return false;
            }
         
        } else {
            return false;
        } 
        
       
        if (isset($_FILES["file"])) {
            $dir = $_SERVER['DOCUMENT_ROOT'].Config::IMG_ROOT;
            $file = $_FILES["file"];
            $name = Image::uploadIMG($file, $dir);
            if ($name) {
                $image = new Image();
                $image->saveImg($this->id, $name, 1);
                $_SESSION["user"]['img'] = $name;
                
            } else {
                $_SESSION["error"][] = "Unforunatelly failed to upload file";
            }
        }
        return true;
    }
    
    /**
     *  delete user
     *
     * @return bool
     */
    public function deleteUser(){
        $this->destroy();
        $this->delete();
        return true;
    }

    /**
     * this function destroy user session
     *  
     */
    public function destroy(){
        unset($_SESSION['user']);
        
    }

    /**
     * it's verifying password with hash
     * 
     * @param $password
     * @param $hash
     * @return bool
     */
    private function verify($password,$hash)
    {
        $password = $this->hash($password);
        return $password == $hash;
    }
     /**
     * hash password, hashing via md5 algorithm
      * 
     * @param $password
     * @return string
     */
    private function hash($password)
    {
        return md5($password);
    }
    

}
