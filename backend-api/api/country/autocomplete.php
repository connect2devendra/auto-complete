<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials: true');
header('Accept: application/json');
header('Content-Type: application/json');

include("../../config/dbconn.php");
include("../../models/Country.php");

$database = new Database;
$db = $database->connect();

$country = new Country($db);
$keyword = isset($_GET['keyword'])? $_GET['keyword'] : '';
// echo $keyword; exit;

if (!empty($keyword)) {
    $result = $country->search($keyword);
    // print_r($result); exit;
    $num = $result->rowCount();
    
    if ($num > 0) {

        $country_arr=[];
        $country_arr['data']=[];

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            
            $item_arr = array(
                'id'=>$row['id'],
                'name'=>$row['name']
            );

            array_push($country_arr['data'], $item_arr);
        }

        $country_arr['success'] = true;
        $country_arr['message'] = 'Auto suggestion list';

        echo json_encode($country_arr);    
    
        
    }else{

        echo json_encode(['data'=>[], 'success'=>false, 'message'=> 'No auto suggestion found!']);
    
    }
}
