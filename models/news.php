<?php



class News 
{

	public static function getNewsItemById($id)
	{

		intval($id);

		$db=db::getConnection();

		$newsList=array();

		$result= $db->query ('SELECT * FROM services WHERE id='.$id);
		$result->setFetchMode(PDO::FETCH_ASSOC);  //ЧТОБЫ НЕ дублировались запис

		return $result->fetch();


	}

	public static function getNewsList()
	{

		$db=db::getConnection();

		$newsList=array();

		$result= $db->query ('SELECT * FROM services ORDER BY name');

		$i=0;

		while ($row=$result->fetch()){
			$newsList[$i]['id']=$row['id'];
			$newsList[$i]['name']=$row['name'];
			$newsList[$i]['text']=$row['text'];
			$newsList[$i]['icon']=$row['icon'];
			$i++;
		}
		return $newsList;

	}
}


?>