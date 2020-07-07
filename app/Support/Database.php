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
  	return $this -> connection = new mysqli($this -> host, $this -> user, $this -> pass, $this -> db);
  }

  protected function insert($table, array $data)
  {

  	//echo "<pre>";
  	//print_r($data);
  	//echo "</pre>";

  	// Make SQL Column form data

  	$array_key = array_keys($data);
  	$array_col = implode(',', $array_key);

  	// Make SQL Column form data
  	$array_val = array_values($data);
 
    foreach ($array_val as $value ) {
    	$form_value[] = "'" .$value. "'";
    }

  	$array_values = implode(',', $form_value);
    
    // Data send to table
    $sql = "INSERT INTO $table ($array_col) VALUES ($array_values) ";
    $query = $this -> connection() -> query($sql);
  
    if ($query) {
    	return true;
    }

  }
  

}





