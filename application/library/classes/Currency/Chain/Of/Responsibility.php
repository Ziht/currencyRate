<?php

/**
 * Цепочка обязаности для получения
 * @author Ziht
 */
class Library_Class_Currency_Chain_Of_Responsibility
{
    /**
     * @var array
     */
    protected $_params = [];

    /**
     * @var array
     */
    protected $_result = [];

    /**
     * Установить параметры
     * @param array $params
     * @return $this
     */
    public function setParams($params)
    {
        $this->_params = $params;

        return $this;
    }

    /**
     * @param array $result
     * @return $this
     */
    protected function _setResult($result)
    {
        $this->_result = $result;

        return $this;
    }

    /**
     * Запустить выполнение
     * @return $this
     */
    public function run()
    {
        $chains = $this->_getChains();
        foreach ($chains as $chain) {
            $result = $chain->run($this->getParams());
            if ($result) {
                $this->_setResult($result);

                return $this;
            }
        }

        return $this;
    }

    /**
     * Получить массив звеней цепочки выполнения
     * @return Library_Interface_Currency_Chain_Of_Responsibility[]
     */
    protected function _getChains()
    {
        $configManager = new Library_Helper_Config();
        $config = $configManager->getConfig(__CLASS__);
        $chains = [];
        foreach ($config as $chainName) {
            $chainFullName = __CLASS__ . '_' . $chainName;
            $chains[] = new $chainFullName();
        }
        return $chains;
    }

    /**
     * Получить результат
     * @return array
     */
    public function getResult()
    {

        return $this->_result;
    }

    public function getParams()
    {
        return $this->_params;
    }
}