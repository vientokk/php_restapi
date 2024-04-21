<?php
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');


//인스턴스 생성
$product = new Product($db);

$data = json_decode(file_get_contents("php://input"));

//print_r($data);
// echo $data->stock;
//  exit;
 
$product->id    = $id;

// print_r($product);
// exit;

if ($product->delete()) {
    //$a = ["message" => "Product created"];
    echo json_encode(['header'=>['result_code'=>'0000','e'=>'삭제완료']]);
  } else {
    //$a = ["message" => "Product not created"];
    echo json_encode(['header'=>['result_code'=>'1111','e'=>'삭제안됨']]);
  }

exit;
 
?>

