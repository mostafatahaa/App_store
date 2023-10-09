<?php

namespace PHPMVC\Models;

use PHPMVC\Models\ProductCategoriesModel;
use PHPMVC\Models\AbstractModel;

class ProductListModel extends AbstractModel
{
    public $productId;
    public $categoryId;
    public $name;
    public $image;
    public $quantity;
    public $buyPrice;
    public $sellPrice;
    public $barCode;
    public $unit;


    protected static $table_name = "app_products_list";
    protected static $primary_key = "productId";

    protected static $table_schema = [
        "categoryId"                => self::TYPE_INT,
        "name"                      => self::TYPE_STR,
        "image"                     => self::TYPE_STR,
        "quantity"                  => self::TYPE_INT,
        "buyPrice"                  => self::TYPE_DECIMAL,
        "sellPrice"                 => self::TYPE_DECIMAL,
        "barCode"                   => self::TYPE_STR,
        "unit"                      => self::TYPE_INT,

    ];

    // this query to return both category name and all from app_products_list
    public static  function getAll()
    {
        $sql = "SELECT apl.*, apc.name categoryName FROM " . self::$table_name . " apl";
        $sql .= " INNER JOIN " . ProductCategoriesModel::getModelTableName() . " apc";
        $sql .= " ON apc.categoryId = apl.categoryId";
        return self::get($sql);
    }
}
