<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$data = json_decode(file_get_contents("php://input")); // wie kann ich heir die id von dem Antwortfeld mit übermitteln?

$answer = '';
$indexNumber = '';

if(!empty($data->answer)) {
	$answer = $data->answer;
}

$response = json_encode([
	'success' => true, 
	'data' => $answer
]);


// database connection credentials
$user = 'alinanerlich';
$password = 'KussRaccoonFox';
$dbname = 'alinanerlich_db';
$host = 'localhost';

// Create connection
$conn = mysqli_connect($host, $user, $password, $dbname); //$port

// Check connection
if (!$conn) {
	echo json_encode([
		'success' => false, 
		'message' => mysqli_connect_error(),
	]);
	echo $response;
	exit;
}

// MySQL INSERT Statement -> https://www.w3schools.com/sql/sql_insert.asp
$sql = "INSERT INTO antworten_quiz1 (field_id, answer)
VALUES ('$indexNumber', '$answer')";

if (mysqli_query($conn, $sql)) {
	$response = json_encode([
		'success' => true, 
		'message' => $indexNumber,
	]);
} else {
  	$response = json_encode([
		'success' => false, 
		'message' => "Error: " . $sql . "<br>" . mysqli_error($conn),
	]);
}
mysqli_close($conn);

echo $response;
