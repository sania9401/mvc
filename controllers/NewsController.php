<?php

class NewsController
{
	public function actionIndex()
	{
		echo 'Список новостей';
		return true;
	}

	public function actionView($category, $id)
	{
		echo $category;
		echo "<br \>".$id;
		return true;
	}

}

?>