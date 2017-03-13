<?php
include('config.php');

class Main{
	
	function __construct(){
		
	}
	function DB_connection(){
		include('config.php');
		$conn=$con;
		return $conn;
	}
	function InsertRecord($table_name,$array){
		$con=$this->DB_connection();
		if(count($array)>0){
			foreach ($array as $key => $value) {
				$value=mysqli_real_escape_string($con,$value);
				$value="'$value'";
				$inserts[]="$key=$value";
			}
		}
		$implodearray=implode(', ',$inserts);

		if(TABLE_PREFIX!== ''){
			$table_name=TABLE_PREFIX.$table_name;
		}
		$insert=mysqli_query($con,"insert into ".$table_name. " set ".$implodearray);
		return $insert;
	}
	function UpdateRecord($table_name,$array,$where)
	{
		$con=$this->DB_connection();
		if(count($array)>0){
			foreach ($array as $key => $value) {
				$value=mysqli_real_escape_string($con,$value);
				$value="'$value'";
				$updates[]="$key=$value";
			}
		}
		$implodearray=implode(', ',$updates);
		if(TABLE_PREFIX!==''){
			$table_name=TABLE_PREFIX.$table_name;
		}
		$update=mysqli_query($con,"update ".$table_name." set ".$implodearray." where ".$where);
		return $update;
	}
	function DeleteRecord($table_name,$where){
		$con=$this->DB_connection();
		if(TABLE_PREFIX!==''){
			$table_name=TABLE_PREFIX.$table_name;
		}
		$delete=mysqli_query($con,"delete from ".$table_name." where ".$where);
		//echo "delete from ".$table_name." where ".$where;exit;
		return $delete;
	}
	function SelectRecord($table_name,array $array){
		$con=$this->DB_connection();
			
		if(array_key_exists("fields", $array)){
			$query_string="select ".$array['fields']." from ".$table_name;	
		}else{
			$query_string="select * from ".$table_name;
		}
		if(array_key_exists("where", $array)){
			$query_string.=" where ".$array['where'];
		}
		if(array_key_exists("groupby", $array)){
			$query_string.=" group by ".$array['groupby'];
		}
		if(array_key_exists("orderby", $array) && array_key_exists("ordertype", $array)){
			$query_string.=" order by ".$array['orderby'].' '.$array['ordertype'];
		}
		if(array_key_exists("limit", $array)){
			$query_string.=" limit ".$array['limit'];
		}
		if(TABLE_PREFIX!==''){
			$table_name=TABLE_PREFIX.$table_name;
		}
		//echo $query_string;exit;
		$select=mysqli_query($con,$query_string);
		while($row=mysqli_fetch_assoc($select)){
			$data[]=$row;
		}
		return $data;
	}
	function GetCustom($query){
		$con=$this->DB_connection();
		$custom=mysqli_query($con,$query);
		while($row=mysqli_fetch_assoc($custom)){
			$data[]=$row;
		}
		return $data;
	}
	function fileupload(){

	}
}
?>