<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<table>
	<thead>
		<tr>
			<td>Status</td>
			<td>User-Agent</td>
		</tr>
	</thead>
	<tbody>

<?php

// Get the website value from the index.php form
$site = $_POST["site"];

// Load XML file of user agents
$xml  = simplexml_load_file("http://www.user-agents.org/allagents.xml"); 

// Convert XML array to PHP array
$json = json_encode($xml);
$array = json_decode($json,TRUE);

//Get only the user-agents string from array
$agents = $array['user-agent'];

// Create new array for our user-agents
$only_agents = array();
$count = 0;

// Add user agents to new array
foreach ($agents as $a) {
	$only_agents[$count] = $a['String'];
	$count++;
}

// Test each user agent by modifying php header
foreach ($only_agents as $val) {
	ini_set('user_agent', $val);
	$get_http_response_code = get_http_response_code($site);

  // Get the status code and set the varible $status
	if ( $get_http_response_code == 200 ) {
	  $status = "Success";
	} else {
	  $status = "Failure";
	}
	echo "<tr><td>" . $status . "</td><td>" . $val ."</td></tr>";
}

// Get the status code from header
function get_http_response_code($domain1) {
  $headers = get_headers($domain1);
  return substr($headers[0], 9, 3);
}

?>
		</tbody>
	</table>
</body>
</html>
