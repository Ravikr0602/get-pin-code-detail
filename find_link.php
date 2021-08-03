<?php
$pincode=$_POST['pincode'];
$data=file_get_contents('http://postalpincode.in/api/pincode/'.$pincode);
$data=json_decode($data);   // convert json file to decode
if(isset($data->PostOffice['0'])){
	$arr['city_name']=$data->PostOffice['0']->Taluk;
	$arr['district_name']=$data->PostOffice['0']->District;
	$arr['state_name']=$data->PostOffice['0']->State;
	echo json_encode($arr);  // again convert json file to enode
}else{
	echo 'no';
}
?>