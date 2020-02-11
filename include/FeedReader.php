<?php
require 'Sql.php';

class Service extends Sql
{

	function __construct()
	{
		parent::__construct();
	}


  public function feed()
  {

    header("Content-type: text/xml");

    echo "<?xml version='1.0' encoding='UTF-8'?>". PHP_EOL;
    echo "<rss version='2.0'>". PHP_EOL;
    echo "<channel>". PHP_EOL;
    echo "<title>localhost.com  - News Blog</title>". PHP_EOL;
    echo "<link>localhost.com</link>". PHP_EOL;
    echo "<description>News Blog</description>". PHP_EOL;
    echo "<language>fa</language>". PHP_EOL;

		$data = $this->Selects('news','','id','DESC' );

		foreach ($data as $value)
		{
			extract($value);
      echo "<item>". PHP_EOL;
			echo "<title>". htmlspecialchars($Title) ."</title>". PHP_EOL;
      echo "<link>". $Image ."</link>". PHP_EOL;
			echo "<title>". htmlspecialchars($Title) ."</title>". PHP_EOL;
			echo "<description>". htmlspecialchars($Title) ."</description>". PHP_EOL;
			echo "<pubDate>". $sendTime ."</pubDate>". PHP_EOL;
    	echo "</item>". PHP_EOL;
    }
		
		echo "</channel>". PHP_EOL;
		echo "</rss>". PHP_EOL;
    }


}
?>
