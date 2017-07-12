<?php

    class Cuisine
    {
        private $cuisine_type;
        private $id;


        function __construct($cuisine_type, $id = null)
        {

            $this->cuisine_type = $cuisine_type;
            $this->id = $id;

        }

        function getCuisineType()
        {
            return $this->cuisine_type;
        }

        function setCuisineType($new_cuisine_type)
        {
            $this->cuisine_type = (string) $new_cuisine_type;
        }

        function getId()
        {
            return $this->id;
        }


        function save()
        {
            $executed = $GLOBALS['DB']->exec("INSERT INTO cuisines (cuisine_type) VALUES ('{$this->getCuisineType()}')");
            if ($executed) {
                $this->id = $GLOBALS['DB']->lastInsertId();
                return true;
            } else {
                return false;
            }
        }

        static function getAll()
        {
            $returned_cuisines = $GLOBALS['DB']->query("SELECT * FROM cuisines;");
            $cuisines = array();
            foreach($returned_cuisines as $cuisine) {
                $cuisine_type = $cuisine['cuisine_type'];
                $id = $cuisine['id'];
                $new_cuisine = new Cuisine($cuisine_type, $id);
                array_push($cuisines, $new_cuisine);
            }

        function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM cuisines;");
        }

        static function deleteSingle()
        {
            $executed = $GLOBALS['DB']->exec("DELETE FROM cuisines WHERE id = {$this->getId()};");
            if ($executed) {
                return true;
            } else {
                return false;
            }
        }
            return $cuisines;
        }

    }
?>




















?>
