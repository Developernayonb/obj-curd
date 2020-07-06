<?php 

namespace App\Support;

use mysqli;

/*Database*/
abstract class Database
{
  /**
   * Server realted property
   */

  private $host = 'localhost';
  private $user = 'root';
  private $pass = '';
  private $db = 'obj';



  private $connection;

  /**
   * Database Connection setup
   */

  private function connection()
  {
  	return $this -> connection = new mysqli($this -> $host, $this ->  $user, $this ->  $pass, $this ->  $db);
  }
  

}





