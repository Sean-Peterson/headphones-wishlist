<?php

    class Headphones
    {
        private $brand;
        private $model;
        private $price;

        function __construct($h_brand, $h_model, $h_price){
            $this->brand = $h_brand;
            $this->model = $h_model;
            $this->price = $h_price;
        }

        function getBrand()
        {
            return $this->brand;
        }

        function getModel()
        {
            return $this->model;
        }

        function getPrice()
        {
            return $this->price;
        }

        function save()
        {
            array_push($_SESSION['list_of_headphones'], $this);
        }

        static function getAll()
        {
            return $_SESSION['list_of_headphones'];
        }

        static function deleteAll()
        {
            $_SESSION['list_of_headphones'] = array();
        }



    }
 ?>
