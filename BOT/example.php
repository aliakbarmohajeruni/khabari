<?php
	require("telegram.php");
	require("../config/db.php");
	$telegram = new Telegram("346070879:AAGjlOtOM9r3GhXu-1LtEDSRRkkz7aMuyOU");
	$select = mysqli_query($con,"SELECT * FROM news WHERE status = 0");
	if (mysqli_num_rows($select)) {
		while ($row = mysqli_fetch_assoc($select)) {
			$content = "تیتر : ".$row['title']." ...... خبر : ".$row['content']." ..... منبع :".$row['source']." ...... دسته بندی : ".$row['category'];
				$content = array('chat_id' => "@ulikhani",'text' => $content);
				$result = $telegram->sendMessage($content);
				$UPDATE = mysqli_query($con,"UPDATE news SET status =1 WHERE status = 0");
		}
	}
	var_dump($result);
?>