<?php

namespace PHPMVC\Models;

use PHPMVC\Models\AbstractModel;

class ProductCategoriesModel extends AbstractModel
{
    public $categoryId;
    public $name;
    public $image;


    protected static $table_name = "app_products_categories";
    protected static $primary_key = "categoryId";

    protected static $table_schema = [
        "name"              => self::TYPE_STR,
        "image"             => self::TYPE_STR,

    ];
}
