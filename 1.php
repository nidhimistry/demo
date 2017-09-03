<?php
include('class/Main.class.php');
$main=new Main();

/*//INSERT RECORD
$insert_array=array("name"=>"demo",
					"address"=>"abcd",
					"phone"=>"878768768",
					"profile_picture"=>"jhjh",
					"created_date"=>date('Y-m-d H:i:s'));
$add=$main->InsertRecord('testing_table',$insert_array);
if(count($add)>0)
{
	echo "Record Inserted Successfully";
}else{
	echo "Error in Insert.Try Again!!!";
}*/

/*//UPDATE RECORD
$update_array=array("name"=>"demo12345",
					"address"=>"abcd34534534",
					"phone"=>"878768768",
					"profile_picture"=>"jhjh4543",
					"created_date"=>date('Y-m-d H:i:s'));
$up=$main->UpdateRecord("testing_table",$update_array,"id=4");
if($up>0){
	echo "Record Updated Successfully.";
}else{
	echo "Not Updated";
}*/

/*//DELETE RECORD
$where="active_status=0";
$de=$main->DeleteRecord("testing_table",$where);
if($de>0){
	echo "Record Deleted Successfully.";
}else{
	echo "Record Not Deleted.Try Again!!!";
}
*/

/*//SELECT RECORD
$select=array("orderby"=>"id","ordertype"=>"desc","groupby"=>"id");
$se=$main->SelectRecord("testing_table",$select);
print_r($se);*/

/*//CUSTOM QUERY
$custom=$main->GetCustom("select * from testing_table");
print_r($custom);*/
if(isset($_POST['submit_btn'])){
	//print_r($_FILES);exit;
	/*Array ( 
			[upload_file] => Array ( 
				[name] => Lodestone Directions.jpg 
				[type] => image/jpeg 
				[tmp_name] => C:\wamp\tmp\php43B8.tmp 
				[error] => 0 
				[size] => 155749 ) 
		)*/

		//change file name
		$extension = explode(".", $_FILES['upload_file']['name']);
		$file_name = rand(10,100).date("YmdHis");
		$extension[0]=$file_name;
		$filename=implode(".", $extension);
		if(move_uploaded_file($_FILES['upload_file']['tmp_name'], "upload/images/".$filename)){
			echo "file uploaded successfully";
		}else{
			echo "Error in file upload";
		}
		
	
}
?>
<html>
	<head>
		<title>Basic PHP Demo</title>
	</head>
	<body>
		<form name="dataform" id="dataform" method="post" enctype="multipart/form-data" action="">
			<label>Select File : </label>
			<input type="file" name="upload_file" id="upload_file">
			<input type="submit" name="submit_btn" id="submit_btn" value="Submit"> 
		</form>
	</body>
</html>