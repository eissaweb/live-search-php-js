<?php 
namespace App\Controllers;

// 
$isJson = false;

if (isset($_SERVER['HTTP_CONTENT_TYPE']) && $_SERVER['HTTP_CONTENT_TYPE'] == 'application/json') {
	$isJson = true;
	require_once '../../vendor/autoload.php';
}
use Config\DB;
use App\Book;

$requestType = $isJson ? $_GET['q'] : $_POST['q']; 

$db = new DB();
$books = new Book($db->connect());
$results = $books->search(['title', $requestType]);

// check if the content is json then return json

echo $isJson ?  json_encode($results) : null;