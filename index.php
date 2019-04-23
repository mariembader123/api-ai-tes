<?php 

$method = $_SERVER['REQUEST_METHOD'];

// Process only when method is POST
if($method == 'POST'){
	
 require_once('db.php');
 $_DB = new mysqli("167.114.237.144", "m.bader", "67£$gyHu299zGT", "client_premium");
  $result = $_DB->query("SELECT * FROM premium_exhibitors_marketing");
  
 
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);

	$text = $json->queryResult->queryText;

	switch ($text) {
		case 'hi':
			$speech = "Hi, Nice to meet you";
			break;

		case 'bye':
			$speech = "Bye, good night";
			break;

		case 'anything':
			$speech = "Yes, you can type anything here.";
			break;
		
		default:
			$speech = "jcp";
			break;
	}

	$response = new \stdClass();
	$response->fulfillmentText = $speech;
	$response->fulfillmentMessages[]->text->text[] = $speech;
	$response->source = "webhook";
	echo json_encode($result);
}
else
{
	echo "Method not allowed";
}

?>