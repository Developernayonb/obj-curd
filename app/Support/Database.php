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
  /**
   * File upload managements
   */
    protected function fileUpload($file, $location = '', array $file_style = ['jpg','png','jpeg','gif'])
    {
    	// File info

    	$file_name = $file['name'];
    	$file_tmp = $file['tmp_name'];
    	$file_size = $file['size'];

    	//File extension

    	$file_array = explode(',', $file_name);
    	$file_extension = strtolower(end($file_array ));

    	// unique name

    	$unique_file_name = md5(time().rand()) .'.'.$file_extension;

    	//file upload
    	move_uploaded_file($file_tmp, $location . $unique_file_name );

    	return $unique_file_name;
    }

   
   /**
    * Data insert table
    */

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
  /**
   * Get all data
   */

  protected function all($table, $order_by)
  {
  	// Data get
    $sql = "SELECT * FROM $table ORDER BY id $order_by";
    $data = $this -> connection() -> query($sql);
  
    if ($data) {
    	return $data;
    }
  }

  /**
   * Delete data
   */

  protected function delete($table, $id)
  {
  	 // Data Delete
    $sql = "DELETE FROM $table WHERE id='$id'";
    $data = $this -> connection() -> query($sql);
  
    if ($data) {
    	return true;
    }
  }
 /**
  * Show single data
  */
 

  protected function find( $table, $id )

  {
    // Data Show
    $sql = "SELECT * FROM $table WHERE id='$id'";
    $data = $this -> connection() -> query($sql);
  
    if ($data) {
    	return $data;
    }
  }





}





