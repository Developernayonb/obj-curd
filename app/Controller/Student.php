<?php 

namespace App\Controller;

use App\Support\Database;
/*Database*/
class Student extends Database
{
	/**
	 * Add new student
	 */

   public function addNewStudent($name, $email, $cell, $img)
   {
   	$data = $this ->insert('students', [
    
    'name'    => $name,
    'email'    => $email,
    'cell'    => $cell,

   	]);

    if ($data) {
    	return $mess = "<p class=\" alert alert-success \"> Student added successfully! <button class=\" close \" data-dismiss=\"alert\">&times;</button></p>";
    }


   }


}
