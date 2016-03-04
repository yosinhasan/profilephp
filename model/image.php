<?php
/**
 * @author Yosin Hasan
 * User: phpstudent
 * Date: 5.09.15
 * Time: 00:37
 * @version: 0.0.1
 */
class Image extends AbstractModel
{
    private $table = "user_img";

    public function __construct()
    {
        parent::__construct($this->table);
        $this->addField("img", "");
        $this->addField("userId", "");
        $this->addField("status", "");
    }
	/**
	 * uploading image
	 * @param $file
	 * @param $dir
	 * @return $avatarName | boolean 
	 */
	
    public static function uploadIMG($file, $dir)
	{
		
		$type = $file["type"];
		
		$size = $file["size"];
		
		if (($type != "image/jpg") && ($type != "image/jpeg") && ($type != "image/gif") && ($type != "image/png")) {
       
		    return false;
        }
		$arr = explode(".",$file["name"]);
		$avatarName = uniqid().".".$arr[1];
		$uploadFile = $dir.$avatarName;
		 
        
        if (!move_uploaded_file($file["tmp_name"], $uploadFile)) {
		   return false;
        } else {
			return $avatarName;	
		}
		
	}
	/**
	 * save image
	 * @param $userId
	 * @param $imgName
	 * @param $status
	 * @return boolean
	 */
	public function saveImg($userId, $imgName, $status)
	{
		$this->userId = $userId;
		$this->img = $imgName;
		$this->status = $status;
		$this->save();
		return true;
	}
	
	/**
	 * get image
	 * @param $id
	 * @return string
	 */
	public static function getImage($id)
	{
		$fields = ["img"];
		$where = "userId = ? AND status = ?";
		$data = AbstractModel::getOnWhere("user_img",$fields,$where, [$id,1]);
		return $data[0]["img"];
	}
	
    
    


}
