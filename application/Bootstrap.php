<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    /**
     * Добавляем ресурсы в автолоадер
     */
    protected function _initAutoloader()
    {
        $resourceLoader = new Zend_Loader_Autoloader_Resource(array(
            'basePath' => APPLICATION_PATH . '/library',
            'namespace' => 'Library',
        ));
        $resourceLoader->addResourceType('helper', 'helpers/', 'Helper_');
        $resourceLoader->addResourceType('class', 'classes/', 'Class_');
        $resourceLoader->addResourceType('interface', 'interfaces/', 'Interface_');
    }
}

