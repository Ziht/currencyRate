<?php
/**
 * Звено цепи, отвечающее за api
 * @author Ziht
 */
class Library_Class_Currency_Chain_Of_Responsibility_Api implements Library_Interface_Currency_Chain_Of_Responsibility
{
    /**
     * @inheritdoc
     */
    public function run($params)
    {
        $result = [];
        $firstCurrency = $params['firstCurrency'];
        $secondCurrency = $params['secondCurrency'];
        if ($firstCurrency === $secondCurrency) {
            $result['rate'] = 1;
        } else {
            $manager = new Library_Class_Data_Provider_Manager();
            $dataProvider = $manager->get('Api_Fixer');
            $result = $dataProvider->get($firstCurrency);
            if (isset($result['rates'][$secondCurrency])) {
                $result['rate'] = $result['rates'][$secondCurrency];
            } else {
                $result['rate'] = 'такая валюта не поддерживается';
            }
        }
        return $result;
    }
}