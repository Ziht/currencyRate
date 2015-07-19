<?php

/**
 * Основной контроллер
 * @author Ziht
 */
class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    /**
     * Основной экшек
     * @throws Zend_Form_Exception
     */
    public function indexAction()
    {
        $form = new Application_Form_Currency();
        $this->view->form = $form;
    }

    /**
     * Экшен для ajax'а, возвращает курс валют
     */
    public function currencyrateAction()
    {
        $this->_helper->layout()->disableLayout();
        $firstCurrency = $this->_getParam('firstCurrency');
        $secondCurrency = $this->_getParam('secondCurrency');
        $currencyChineOfResponsibility = new Library_Class_Currency_Chain_Of_Responsibility();
        $result = $currencyChineOfResponsibility->setParams(
            [
                'firstCurrency' => $firstCurrency,
                'secondCurrency' => $secondCurrency
            ]
        )->run()
            ->getResult();
        $this->view->rate = $result['rate'];
    }
}



