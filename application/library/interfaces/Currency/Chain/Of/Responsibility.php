<?php

/**
 * Интерфейс цепочки обязанностей курса валют
 * @author Ziht
 */
interface Library_Interface_Currency_Chain_Of_Responsibility
{
    /**
     * Выполнить звено и получить результат
     * @param array $params
     * @return array
     */
    public function run($params);

}