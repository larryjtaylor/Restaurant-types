<?php

    class Cuisine
    {
        private $cuisine_type;
        private $description;


        function __construct($cuisine_type, $description)
        {

            $this->cuisine_type = $cuisine_type;
            $this->description = $description;

        }

        function getCuisineType()
        {
            return $this->cuisine_type;
        }

        function setCuisineType($cuisine_type)
        {
            $this->cuisine_type = (string) $cuisine_type;
        }

        function getDescription()
        {
            return $this->description;
        }

        function setDescription($description)
        {
            $this->description = (string) $description;
        }

        // static function deleteAll()
        // {
        //     $executed = $GLOBALS['DB']->exec("DELETE FROM cuisines;");
        //     if ($executed) {
        //        return true;
        //     } else {
        //        return false;
        //     }
        // }

        function save()
        {
            $executed = $GLOBALS['DB']->exec("INSERT INTO cuisines (cuisine_type, description) VALUES ('{$this->getCuisineType()}', '{$this->getDescription()}')");
            if ($executed) {
                $this->id = $GLOBALS['DB']->lastInsertId();
                return true;
            } else {
                return false;
            }
        }
        // static function getAll()
        // {
        //

    }
?>




















?>
