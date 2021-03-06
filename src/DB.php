<?php


namespace Nikitam\Example;


	use PDO;

	class DB
    {
        // Объект класса PDO
        private $db;

        // Соединение с БД
        public function __construct()
        {
            $dbinfo = require ('../dbinfo.php');
            $this->db = new PDO('mysql:host=' . $dbinfo['host'] . ';dbname=' . $dbinfo['dbname'], $dbinfo['login'], $dbinfo['password']);
        }

        // Операции над БД
        public function query($sql, $params = []):array
        {
            // Подготовка запроса
            $stmt = $this->db->prepare($sql);

            // Обход массива с параметрами
            // и подставление значений
            if ( !empty($params) ) {
                foreach ($params as $key => $value) {
                    $stmt->bindValue(":$key", $value);
                }
            }

            // Выполняем запрос
            $stmt->execute();
            // Возвращаем ответ
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

    }


