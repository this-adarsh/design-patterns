<?php

/**
 * singleton design pattrn is used to allow or class to have only one object to be craeted.
 *  
 * 1) its implimeted by makeing constructor privete
 * 2) and create another static function which is responsibble for returning object of class
 * 
 */
class singleTonClass 
{
    private static $instance;

    private function __construct(){
        echo "singletone object";
    }
    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new singleTonClass();
        }
        return self::$instance;
    }
}

$obj = singleTonClass::getInstance();
