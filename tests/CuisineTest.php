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
        // protected function tearDown()
        // {
        //     Cuisine::deleteAll();
        // }

        function testGetCuisineType()
        {
            // Arrange
            $cuisine_type = 'Chinese';
            $description = 'Food from China';
            $test_cuisine = new Cuisine ($cuisine_type, $description);

            // Act
            $result = $test_cuisine->getCuisineType();

            // Assert
            $this->assertEquals($cuisine_type, $result);
        }

        function testGetDescription()
        {
            // Arrange
            $cuisine_type = 'Chinese';
            $description = 'Food from China';
            $test_cuisine = new Cuisine ($cuisine_type, $description);
            $test_cuisine->save();

            // Act
            $result = $test_cuisine->getDescription();

            // Assert
            $this->assertEquals($description, $result);
        }

        // function testDeleteAll()
        // {
        //     //Arrange
        //     $test_cuisine_type = 'chinese';
        //     $test_description = 'Food from China';
        //     $test_cuisine = new Cuisine($test_cuisine_type, $test_description);
        //     // $test_cuisine->save();
        //
        //     //Act
        //     Cuisine::deleteAll();
        //     //Assert
        //     $result = Cuisine::deleteAll();
        //     $this->assertEquals([], $result);
        // }

        // function testSave()
        // {
        //     //Arrange
        //     $test_cuisine_type = 'chinese';
        //     $test_description = 'Food from China';
        //     $test_cuisine = new Cuisine($test_cuisine_type, $test_description);
        //     //Act
        //     $executed = $test_cuisine->save();
        //     // Assert
        //     $this->assertTrue($executed, "Item not successfully saved to database");
        // }

    }

?>
