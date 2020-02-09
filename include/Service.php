<?php
require 'Sql.php';
/**
* all serveoice for project 
*/
class Service extends Sql
{

	function __construct()
	{
		parent::__construct();
	}

	public $chatId;
	public $Url;
	public $Token;



	// method for login
	public function Login($userName,$Password)
	{
		$Result = $this->Select('users','`userName` = "'.$userName.'" AND `Password` = "'.$Password.'"');
		if ($Result) 
		{
			$Data['ID'] = $Result['ID'];
			$Data['Type'] = $Result['Type']; 
			return $Data;
		}else 
		{
			return false;
		}
	}



	// methid for upload file
		function Upload($name,$directory,$listType = " ")
	{
		$temp = explode(".", $_FILES[$name]["name"]);
		$randomname = substr(md5(mt_rand()), 0, 12);
		$upload = $randomname . '.' . end($temp);
		 $directory .= $upload;
		if (is_uploaded_file($_FILES[$name]['tmp_name'])) 
		{
			// if ($key = array_search($_FILES[$name]['type'], $listType)) 
			// {
				if (move_uploaded_file($_FILES[$name]['tmp_name'],$directory))
				{
					return  $directory;
				}
			} else {
				$_SESSION['error'] =  "فایل انتخابی باید عکس باشد. برای تغییر به صفحه ی تغییرات بروید.";
			}
		// }
	}
// method for send pm in chanel
// 
	function telegramSend()
	{
		$this->chatId = "@lastnews96";
		$this->Token = "495836364:AAGBcfVWjvYqunTTVfo-qXeWFdCfFEhhO0E";
		$Result = $this->Selects('news','`Status` = 0');
		$Data['Status'] = 1;
		foreach ($Result as $Value) 
		{
			$Content = "تیتر : ".$Value['Title']."\n"."خبر : ".$Value['Content']."\n"."منبع :".$Value['Lead'];
			$Send = $this->sendMessage($Content);
			$this->Update('news',$Data,'`ID` = 0'.$Value['ID']);
		}
	}

	private function sendMessage($Text)
	{
		$sendMessageUrl = "https://api.telegram.org/bot".urlencode($this->Token)."/sendMessage?chat_id=".urlencode($this->chatId)."&text=".urlencode($Text);
		file_get_contents($sendMessageUrl);
	}


}
?>