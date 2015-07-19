<?php
/**
 * Абстрактный класс обёртки поставщика данных
 * @author Ziht
 */
abstract class Library_Class_Data_Provider
{
    protected $_provider = null;

    public function __construct()
    {
        $this->_init();
    }

    abstract protected function _init();

    abstract public function set($key, $value);

    abstract public function get($key);
}