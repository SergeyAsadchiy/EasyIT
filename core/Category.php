<?php 
/**
 * 
 */
class Category
{


	public static function categoryList()
	{
		$model = new CategoryModel();
		$model->table = "Categories";
		return $model->getCategories();
	}


}