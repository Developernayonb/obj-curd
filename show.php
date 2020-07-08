<?php require_once "vendor/autoload.php"; ?>
<?php 

// Class use
use App\Controller\Student;

//class instance

$student = new Student;

//Get id

if ( isset($_GET['id']) ) {
	$id = $_GET['id'];

	$single_student = $student -> singleStudent($id);
}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Development Area</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>
	

	<div class="wrap">
		<a class="btn btn-primary btn-sm" href="data.php"> All Students </a>
		<div class="card shadow">
			<div class="card-header"><h3>Single data of :<?php echo $single_student['name'] ?></h3></div>
			<div class="card-body">
				<img class="shadow" style="width: 200px;height: 200px;border-radius: 50%; display: block; margin: auto;border: 10px solid #fff;" src="media/img/students/<?php echo $single_student['photo'] ?>" alt="">
				<h1 style="text-align: center;"><?php echo $single_student['name'] ?></h1>
				<table class="table">
					<tr>
						<td>Name</td>
						<td><?php echo $single_student['name'] ?></td>
					</tr>
					<tr>
						<td>Email</td>
						<td><?php echo $single_student['email'] ?></td>
					</tr>
					<tr>
						<td>Cell</td>
						<td><?php echo $single_student['cell'] ?></td>
					</tr>
					<tr>
						<td>Name</td>
						<td>Name</td>
					</tr>
				</table>
			</div>
			</div>
		</div>
	</div>
	







	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
</body>
</html>