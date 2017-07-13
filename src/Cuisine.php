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

        function getId()
        {
            return $this->id;
        }

        function getCuisineType()
        {
            return $this->cuisine_type;
        }

        function setCuisineType($cuisine_type)
        {
            $this->cuisine_type = (string) $cuisine_type;
        }

        function save()
        {
            $executed = $GLOBALS['DB']->exec("INSERT INTO cuisines (cuisine_type) VALUES ('{$this->getCuisineType()}')");
            if ($executed) {
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
        }

        static function deleteAll()
        {
            $executed = $GLOBALS['DB']->exec("DELETE FROM cuisines;");
            if ($executed) {
                return true;
            } else {
                return false;
            }
        }
    }
?>
