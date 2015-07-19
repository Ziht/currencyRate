<?php

/**
 * Менеджер провайдеров данных
 * @author Ziht
 */
class Library_Class_Data_Provider_Manager
{
    /**
     * Получить класс по имени
     * @param string $name
     * @param string $default
     * @return Object|null
     */
    public function get($name, $default = '')
    {
        $class = null;
        $thisClassName = __CLASS__;
        $className = substr_replace($thisClassName, $name, -strlen('Manager'), strlen($thisClassName));
        if (!class_exists($className) && $default) {
            $className = substr_replace($thisClassName, $name, -strlen('Manager'), strlen($thisClassName));
        }
        if (class_exists($className)) {
            $class = new $className();
        }

        return $class;
    }
}