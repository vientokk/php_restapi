<?php 
// create  POST    /prodects
// read    GET     /products
// read    GET     /products/1
// update  PUT     /products
// delete  DELETE  /products/1

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

//print_r($_SERVER);
//$_SERVER['REDIRECT_URL];

$part = explode('/', $_SERVER['REQUEST_URI']);

// print_r($part); 
//exit;

if($part[1] == 'products'){ 

    require './core/config.php';   
    require './core/product.php';   
    
    if($_SERVER['REQUEST_METHOD'] == "GET"){
        //products/1
        if(isset($part[2]) && is_numeric($part[2])){
            $id = $part[2];
            include('read_one.php');
        }else{
            include('read_all.php');
        }
    }else if($_SERVER['REQUEST_METHOD'] == "POST"){        
        include 'create.php';
        //echo json_encode(['header'=>['result_code'=>'2222','e'=>'not found']]);
    }else if ($_SERVER['REQUEST_METHOD'] == 'PUT') {        
        if(isset($part[2]) && is_numeric($part[2])) {
            $id = $part[2];
            require 'update.php';                   
        }else{
            echo json_encode(['header'=>['result_code'=>'2222','e'=>'ID not found']]);        
        }
        //echo json_encode(['header'=>['result_code'=>'2222','e'=>'not found']]);
    }else if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {        
        if(isset($part[2]) && is_numeric($part[2])) {
            $id = $part[2];
            require 'delete.php';                               
        }else{
            echo json_encode(['header'=>['result_code'=>'2222','e'=>'ID not found']]);        
        }
        //echo json_encode(['header'=>['result_code'=>'2222','e'=>'not found']]);
    }



}else{
    echo json_encode(['header'=>['result_code'=>'2222','e'=>'not found']]);
}


