<?php

/**
 * Форма валют
 * @author Ziht
 */
class Application_Form_Currency extends Zend_Form
{

    public function init()
    {
        $configManager = new Library_Helper_Config();
        $config = $configManager->getConfig(__CLASS__);
        $currencies = $config->currencies->toArray();
        $this
            ->setAction('/index/currencyRate')
            ->setMethod('post');
        $firstCurrencyElement = new Zend_Form_Element_Select('firstCurrency');
        $firstCurrencyElement->setAttribs(['options'=>
            $currencies
        ]);
        $this->addElement($firstCurrencyElement);
        $secondCurrencyElement = new Zend_Form_Element_Select('secondCurrency');
        $secondCurrencyElement->setAttribs(['options'=>
            $currencies
        ]);
        $this->addElement($secondCurrencyElement);
    }


}

