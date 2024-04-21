<?php   
$product = new Product($db);
$stmt = $product->get_all();
//print_r($stmt);

$num = $stmt->rowCount(); 

// $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
// foreach ($rs as $row) {    
//     print_r($row);
// }

// 조회건수가 있으면
if($num > 0){
    $product_arr = [];
    $product_arr['header'] = ['result_code'=>'0000','totalcnt'=>$num];
    

    $product_arr['body'] = [];
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // print_r($row);
        
        // $id = $row->id;
        // $name = $row->name;
        //extract($row) 명령어 실행하여 $row->name  할 것을 $name 으로 바로 사용.

        extract($row);
        $product_item = [
            'id'=>$id,
            'name'=>$name,
            'price'=>$price,
            'stock'=>$stock,
            'created_at'=>$created_at
        ];

        array_push($product_arr['body'], $product_item);

    }

    //print_r($product_arr);
    echo json_encode($product_arr);
}else{
    echo json_encode(['header'=>['result_code'=>'1111','totalcnt'=>0]]);
}