<?php
error_reporting(-1);
header('Content-Type: text/html; charset=utf-8');
    class Singleton
    {
        static $instance=null;                //ссылка на объект

        private function __construct()       //конструктор
        {
            echo "Вызов конструктора<br>";
        }

        public static function instance()      //метод для получения ссылки на объект
        {
            if (Singleton::$instance == null) //проверка существования объекта
            {
                Singleton::$instance = new Singleton; //объект не существует - создание нового
            }
            echo "Вызов метода instance()<br>";

            return Singleton::$instance;            //возвращение ссылки на объект
        }
        //переопределение "магических" методов для ограничения создания новых объектов
         private function __clone()
         {
         }

         private function __wakeup()
         {
         }
    }

    $a = Singleton::instance();    //получение ссылки на объект впервые - создание объекта и вызов его конструктора
    $b = Singleton::instance();    //повторное получение ссылки на объект - возвращение существующей ссылки без вызова конструктора
    if($a===$b)                    //проверка идентичности объектов
    {
        echo "Две ссылки на один и тот же объект<br>";
    }
?>