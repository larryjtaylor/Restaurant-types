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

        function testGetId()
        {
            //Arrange
            $cuisine_type = 'Chinese';
            $test_cuisine = new Cuisine($cuisine_type);
            $test_cuisine->save();

            //Act
            $result = $test_cuisine->getId();

            //Assert
            $this->assertTrue(is_numeric($result));
        }

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



    }

?>
