<?php
    class Place
    {
        private $city_name;

        function __construct($city_name)
        {
            $this->city_name = $city_name;
        }

        function setCityName($new_city_name)
        {
            $this->city_name = (string) $new_city_name;
        }

        function getCityName()
        {
            return $this->city_name;
        }

        function save()
        {
            array_push($_SESSION['list_of_places'], $this);
        }

        static function getAll()
        {
            return $_SESSION['list_of_places'];
        }

        static function deleteAll()
        {
            $_SESSION['list_of_places'] = array();
        }
    }
 ?>
