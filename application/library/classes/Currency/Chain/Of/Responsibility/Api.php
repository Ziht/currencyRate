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
        $manager = new Library_Class_Data_Provider_Manager();
        $result = [];
        $firstCurrency = $params['firstCurrency'];
        $secondCurrency = $params['secondCurrency'];
        if ($firstCurrency === $secondCurrency) {
            $result['rate'] = 1;
        } else {
            $dataProviderApiFixer = $manager->get('Api_Fixer');
            $data = $dataProviderApiFixer->get($firstCurrency);

            if (isset($data['rates'][$secondCurrency])) {
                $result['rate'] = $data['rates'][$secondCurrency];
            } else {
                $result['rate'] = 'такая валюта не поддерживается';
            }
        }
        $dataProviderRedis = $manager->get('Redis');
        if (isset($result['rate'])) {
            $dataProviderRedis->set($firstCurrency, $result);
        }
        return $result;
    }
}