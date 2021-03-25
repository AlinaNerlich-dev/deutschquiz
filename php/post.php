<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$data = json_decode(file_get_contents("php://input")); 

$rightanswers = [
	0 => "kleiner", 
	1 => "von", 
	2 => "nach",
	3 => "großer", 
	4 => "kleinen", 
	5 => "diesem", 
	6 => "viele", 
	7 => "kleine", 
	8 => "langes", 
	9 => "sagt", 
	10 => "hört", 
	11 => "sind",
	12 => "vom", 
	13 => "sind", 
	14 => "über", 
	15 => "vom", 
	16 => "Kuss"
];

$indexNumber = '';
$value = '';
$response = json_encode([
	'success' => true, 
	'data' => $value,
	'data' => $indexNumber
]);


if(!empty($data->value)) {
	$value = $data->value;
}

if(!empty($data->indexNumber)){
	$indexNumber = $data->indexNumber;
};

// database connection credentials
$user = 'alinanerlich';
$password = 'KussRaccoonFox';
$dbname = 'alinanerlich_db';
$host = 'localhost';

// Create connection
$conn = mysqli_connect($host, $user, $password, $dbname); 

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
$sql = "INSERT INTO antworten_quiz1 (answer, field_id) VALUES ('$value', '$indexNumber')";

if (mysqli_query($conn, $sql)) {
	$response = json_encode([
		'success' => true, 
		'sql' => $sql,
		'isCorrect' => ($rightanswers[$indexNumber] == $value)
	]);
} else {
  	$response = json_encode([
		'success' => false, 
		'message' => "Error: " . $sql . "<br>" . mysqli_error($conn),
	]);
}
mysqli_close($conn);

echo $response;
exit;
