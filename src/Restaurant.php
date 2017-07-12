<?php

    class Restaurant
    {
        private $name;
        private $neighborhood;
        private $id;


        function __construct($cuisine_type, $neighborhood, $id = null)
        {

            $this->cuisine_type = $cuisine_type;
            $this->neighborhood = $neighborhood;
            $this->id = $id;

        }

        function getName()
        {
            return $this->name;
        }

        function setName($name)
        {
            $this->name = (string) $name;
        }

        function getNeighborhood()
        {
            return $this->neighborhood;
        }

        function setNeighborhood($neighborhood)
        {
            $this->neighborhood = (string) $neighborhood;
        }

        function getId()
        {
            return $this->id;
        }


        function save()
        {
            $executed = $GLOBALS['DB']->exec("INSERT INTO restaurant (name, neighborhood) VALUES ('{$this->getName()}', '{$this->getNeighborhood()}')");
            if ($executed) {
                $this->id = $GLOBALS['DB']->lastInsertId();
                return true;
            } else {
                return false;
            }
        }

        static function getAll()
        {
            $returned_restaurants = $GLOBALS['DB']->query("SELECT * FROM restaurants;");
            $restaurants = array();
            foreach($returned_restaurants as $restaurant) {
                $name = $restaurant['name'];
                $neighborhood = $restaurant['neighborhood']
                $id = $restaurant['id'];
                $new_restaurant = new Restaurant($name, $neighborhood, $id);
                array_push($restaurants, $new_restaurant);
            }

        function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM restaurants;");
        }

        static function deleteSingle()
        {
            $executed = $GLOBALS['DB']->exec("DELETE FROM restaurants WHERE id = {$this->getId()};");
            if ($executed) {
                return true;
            } else {
                return false;
            }
        }
            return $restaurants;
        }

    }
?>
