<?php
function getProducts() {
    $api_url = "http://localhost:8080/api/products?ws_key=S6CA46XWVQUC58B9W3FIR7Q4G1LG48VN";
    $curl = curl_init($api_url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);
    curl_close($curl);
    return simplexml_load_string($response);
}

function getProduct($id) {
    $api_url = "http://localhost:8080/api/products/$id?ws_key=S6CA46XWVQUC58B9W3FIR7Q4G1LG48VN";
    $curl = curl_init($api_url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);
    curl_close($curl);
    return simplexml_load_string($response);
}

function createProduct($data) {
    $api_url = "http://localhost:8080/api/products?ws_key=S6CA46XWVQUC58B9W3FIR7Q4G1LG48VN";
    $curl = curl_init($api_url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-Type: application/xml']);
    $response = curl_exec($curl);
    curl_close($curl);
    return simplexml_load_string($response);
}

function updateProduct($id, $data) {
    $api_url = "http://localhost:8080/api/products/$id?ws_key=S6CA46XWVQUC58B9W3FIR7Q4G1LG48VN";
    $curl = curl_init($api_url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-Type: application/xml']);
    $response = curl_exec($curl);
    curl_close($curl);
    return simplexml_load_string($response);
}

function deleteProduct($id) {
    $api_url = "http://localhost:8080/api/products/$id?ws_key=S6CA46XWVQUC58B9W3FIR7Q4G1LG48VN";
    $curl = curl_init($api_url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
    $response = curl_exec($curl);
    curl_close($curl);
    return simplexml_load_string($response);
}
?>
