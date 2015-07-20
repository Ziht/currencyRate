<?php
/**
 * Звено цепи, отвечающее за редис
 * @author Ziht
 */
class Library_Class_Currency_Chain_Of_Responsibility_Redis implements Library_Interface_Currency_Chain_Of_Responsibility
{

    /**
     * @inheritdoc
     */
    public function run($params)
    {
        $result = [];
        $firstCurrency = $params['firstCurrency'];
        $secondCurrency = $params['secondCurrency'];
        $manager = new Library_Class_Data_Provider_Manager();
        $dataProvider = $manager->get('Redis');
        $data = $dataProvider->get($firstCurrency);
        if ($data && isset($data['rates'])) {
            if (isset($data['rates'][$secondCurrency])) {
                $result['rate'] = $data['rates'][$secondCurrency];
            } else {
                $result['rate'] = 'такая валюта не поддерживается';
            }
        }

        return $result;
    }
}