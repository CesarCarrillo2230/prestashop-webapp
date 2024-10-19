<?php
function testUnauthorizedEndpoint() {
    // Endpoint no autorizado (puedes elegir uno que no hayas habilitado)
    $api_url = "http://localhost:8080/api/some_endpoint?ws_key=S6CA46XWVQUC58B9W3FIR7Q4G1LG48VN";
    $curl = curl_init($api_url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);
    curl_close($curl);
    
    return $response;
}

$response = testUnauthorizedEndpoint();
echo "<pre>$response</pre>";
?>

