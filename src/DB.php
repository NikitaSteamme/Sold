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
            $dbinfo = require ( __DIR__ .'/../dbinfo.php');
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

        function getStageParams($chat_id){
            $params = [
                'tg_chat_id' => $chat_id
                            ];
            return $this->query("SELECT params FROM zzzshop_sessions WHERE tg_chat_id = :tg_chat_id", $params)[0]["params"];
        }

        function updateStage ($chat_id, $stage){
            $params = [
                'tg_chat_id' => $chat_id,
                'stage' => $stage
            ];
            $this->query("UPDATE zzzshop_sessions SET stage = :stage WHERE tg_chat_id = :tg_chat_id", $params);
        }

        function getStage ($chat_id){
            $params = [
                'tg_chat_id' => $chat_id,
            ];
           return $this->query("SELECT stage FROM zzzshop_sessions WHERE tg_chat_id = :tg_chat_id", $params)[0]["stage"];
        }
    }


