<?php
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

$datacombi = json_decode(file_get_contents("php://input")); 

$value = '';
$indexNumber = '';

if(!empty($datacombi ->value)){
    $value = $datacombi-> value;
};

if (!empty($datacombi ->indexNumber)){
    $indexNumber = $datacombi ->indexNumber;
};

if ($rightanswers[$indexNumber] == $value){
    echo json_encode([
		'success' => true, 
	]);
} else {
    echo json_encode([
		'success' => false, 
    ]);
};
