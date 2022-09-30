<?php
namespace Magicdb\Magicdb;

trait ModelDB 
{

    public static function hasTable(){
        return property_exists(get_called_class(), 'table');
    }
    public static function getClassArrayChar($className)
    {
        return str_split($className);
    }
    public static function getClassTable($className)
    {
        $table = '';
        foreach(static::getClassArrayChar($className) as $char)
            $table .= strtolower(preg_replace("/[A-Z]/", "_".$char, $char));
        return substr($table,1)."s";
    }

    public static function getTableName($name)
    {
        $name = explode("\\", $name);
        return end($name);
    }
    public static function __callstatic($methods, $parameters){
        
        if(static::hasTable())
            $parameters["table"] = get_class_vars(get_called_class())["table"];
        else
            $parameters["table"] = static::getClassTable(
                static::getTableName(get_class())
            );
        
        (new MagicDB)->$methods(...$parameters);
    }

}