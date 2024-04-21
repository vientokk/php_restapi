<?php
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

//인스턴스 생성
$product = new Product($db);

$data = json_decode(file_get_contents("php://input"));

//print_r($data);
// echo $data->stock;
//  exit;

$product->name = $data->name;
$product->price = $data->price;
$product->stock = $data->stock;

//$ss = $product->create();
// print_r($ss);
// exit;

if ($product->create()) {
    $a = ["message" => "Product created"];
    echo json_encode(['header'=>['result_code'=>'0000','e'=>'저장완료']]);
  } else {
    $a = ["message" => "Product not created"];
    echo json_encode(['header'=>['result_code'=>'1111','e'=>'저장안됨']]);
  }

exit;

 
?>

