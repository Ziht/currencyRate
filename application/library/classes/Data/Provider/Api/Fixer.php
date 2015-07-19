<?php

/**
 * Провайдер данных для api fixer
 * @author Ziht
 */
class Library_Class_Data_Provider_Api_Fixer extends Library_Class_Data_Provider
{
    /**
     * @inheritdoc
     */
    protected function _init()
    {
        //
    }

    /**
     * @inheritdoc
     */
    public function set($key, $value)
    {
        /** нет такого метода у данного api */
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function get($key)
    {
        $url = 'http://api.fixer.io/latest?base=' . $key;
        $resultJson = file_get_contents($url);
        return json_decode($resultJson, true);
    }
}