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
   

   	// Data send
   	$data = $this ->insert('students', [
    
    'name'    => $name,
    'email'    => $email,
    'cell'    => $cell,
    'photo'    => $this -> fileUpload($img, 'media/img/students/'),

   	]);

    if ($data) {
    	return "<p class=\" alert alert-success \"> Student added successfully! <button class=\" close \" data-dismiss=\"alert\">&times;</button></p>";
    }


   }

   /**
    * Get all value
    */

   public function allStudents()
   {
   	 $data = $this -> all('students', 'DESC');

    if ($data) {
    	return $data;
    }
   }

   /**
    * Delete single students
    */

   public function deleteStudent($id)
   {
   	$data = $this -> delete('students', $id);

   	if ($data) {
   		return "<p class=\" alert alert-success \"> Student Deleted successfully! <button class=\" close \" data-dismiss=\"alert\">&times;</button></p>";
   	}
   }

   /**
    * Single Student data
    */

   public function singleStudent($id)
   {
   	 $data = $this -> find('students', $id );

   	 return $data -> fetch_assoc();
   }
}
