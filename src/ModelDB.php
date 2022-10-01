<?php
namespace Magicdb\Magicdb;

trait ModelDB 
{

    /**
     * Check Class Property Table.
     *
     * @return boolean
     */

    public static function hasTable(){
        return property_exists(get_called_class(), 'table');
    }

    /**
     * Get Class Name String As Array.
     *
     * @var className "String"
     * @return Class Name As Array
     */

    public static function getClassArrayChar($className)
    {
        return str_split($className);
    }

    /**
     * Extract Table Name From Class Name.
     *
     * @var className "String"
     * @return Class Name
     */

    public static function getClassTable($className)
    {
        $table = '';
        foreach(static::getClassArrayChar($className) as $char)
            $table .= strtolower(preg_replace("/[A-Z]/", "_".$char, $char));
        return substr($table,1)."s";
    }
    
    /**
     * Get Table Name.
     *
     * @var name "String"
     * @return Table Name
     */

    public static function getTableName($name)
    {
        $name = explode("\\", $name);
        return end($name);
    }

    /**
     * Undefined Static Method Handler.
     *
     * @var method "String"
     * @var parameters "Array"
     */

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