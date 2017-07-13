<?php

/**
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */

    require_once "src/Restaurant.php";

    $server = 'mysql:host=localhost:8889;dbname=best_restaurant_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class RestaurantTest extends PHPUnit_Framework_TestCase
    {
         function testGetName()
        {
            // Arrange
            $name = 'P.F. Changs';
            $neighborhood = 'Bridgeport';
            $test_restaurant = new Restaurant ($name, $neighborhood);

            // Act
            $result = $test_restaurant->getName();

            // Assert
            $this->assertEquals($name, $result);

        }

        function testGetNeighborhood()
       {
           // Arrange
           $name = 'P.F. Changs';
           $neighborhood = 'Bridgeport';
           $test_restaurant = new Restaurant ($name, $neighborhood);

           // Act
           $result = $test_restaurant->getNeighborhood();

           // Assert
           $this->assertEquals($neighborhood, $result);
       }

        function testGetId()
        {
            //Arrange
            $name = 'P.F. Changs';
            $neighborhood = 'Bridgeport';
            $id = 1;
            $test_place = new Restaurant ($name, $neighborhood, $id);
            $test_place->save();

            //Act
            $result = $test_place->getId();

            //Assert
            $this->assertEquals(true, is_numeric($result));
        }
    }

?>
