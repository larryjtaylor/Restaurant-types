<?php

/**
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */

    require_once "src/Cuisine.php";

    $server = 'mysql:host=localhost:8889;dbname=best_restaurant_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class CuisineTest extends PHPUnit_Framework_TestCase
    {
        function testGetCuisineType()
        {
            // Arrange
            $cuisine_type = 'Chinese';
            $test_cuisine = new Cuisine ($cuisine_type);

            // Act
            $result = $test_cuisine->getCuisineType();

            // Assert
            $this->assertEquals($cuisine_type, $result);
        }

        function testSave()
        {
            //Arrange
            $cuisine_type = 'chinese';

            $test_cuisine = new Cuisine($cuisine_type);
            $test_cuisine->save();
            //Act
            $executed = $test_cuisine->save();
            // Assert
            $this->assertTrue($executed, "Type not successfully saved to database");
        }

        function testDeleteAll()
        {
            //Arrange
            $test_cuisine_type = 'chinese';
            $test_cuisine = new Cuisine($test_cuisine_type);
            $test_cuisine->save();

            //Act
            Cuisine::deleteAll();
            $result = Cuisine::getAll();

            //Assert
            $this->assertEquals('', $result);
        }
    }
?>
