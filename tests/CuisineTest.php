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
      $cuisine_type = 'chinese';
      $test_cuisine = new Cuisine ($cuisine_type);

      // Act
      $result = $test_cuisine->getCuisineType();

      // Assert
      $this->assertEquals($cuisine_type, $result);
    }
  }

?>
