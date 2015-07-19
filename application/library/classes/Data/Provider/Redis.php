<?php
/**
 * Провайдер данных для redis
 * @author Ziht
 */
class Library_Class_Data_Provider_Redis extends Library_Class_Data_Provider
{
    /**
     * @inheritdoc
     */
    protected function _init()
    {
        $configManager = new Library_Helper_Config();
        $config = $configManager->getConfig(__CLASS__);
        $frontendOptions = $config->toArray();
        $backendOptions = array(
            'rediska' => new Rediska(),
        );
        $this->_provider = Zend_Cache::factory(
            'Core',
            'Rediska_Zend_Cache_Backend_Redis',
            $frontendOptions,
            $backendOptions,
            false,
            true
        );
    }

    /**
     * @inheritdoc
     */
    public function set($key, $value)
    {
        $this->_provider->save($value, $key);
    }

    /**
     * @inheritdoc
     */
    public function get($key)
    {
        return $this->_provider->load($key);
    }
}