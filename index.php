<?php 

$method = $_SERVER['REQUEST_METHOD'];

// Process only when method is POST
if($method == 'POST'){
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
 $chat="success response";
  $response.setHeader('Content-Type','application/json');
  $response.send(JSON.stringify({"fulfillmentText":$chat}));
	echo json_encode($response);
}
else
{
	echo "Method not allowed";
}

?>