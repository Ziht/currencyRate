<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $currencies = [
            'USD' => 'USD',
            'EUR' => 'EUR'
        ];
        $this->view->currencies = $currencies;
    }

    public function currencyRateAction($currency)
    {
        $url = 'http://api.fixer.io/latest?base=' . $currency;
        $resultJson = file_get_contents($url);
        $result = json_decode($resultJson, true);

    }


}



