<?php

/**
 * 
 */
class Items
{
	
	public static function getItems()
	{
        $model  = new ItemModel;
        return $model->getDataItems();
	}

	public static function getItem($id)
	{
        $model  = new ItemModel;
        return $model->getDataItem($id);
	}

	public static function getItemImage($id)
	{
        return self::getItem($id);
	}
}