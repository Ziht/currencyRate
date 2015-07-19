<?php
/**
 * Помошник конфигов
 * @author Ziht
 */
class Library_Helper_Config
{
    /**
     * Получить конфиг по имени
     * @param string $configName имя конфига, например User_Session
     * @return Zend_Config
     */
    public function getConfig($configName)
    {
        $configPath = str_replace('_', '/', $configName);
        $config = new Zend_Config(include(APPLICATION_PATH . '/configs/' . $configPath . '.php'));

        return $config;
    }
}