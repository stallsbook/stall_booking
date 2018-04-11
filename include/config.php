<?php

	class connection
	{
		var $con;
		function connection()
		{
			//$this->con=mysqli_connect("localhost","root","","stall_booking");
			//$this->con=mysqli_connect("localhost","stallbooking12","1=c%4Oc}1b(q","stall_booking");
			$this->con=mysqli_connect("localhost","stalljs1_stall","tiv4h8b@mBuk","stalljs1_stall_booking");
		}
		function insertRec($data,$TblName)
		{
			$qry="";
			$col="";
			$val="";
			$cnt=count($data);
			$i=1;
			foreach($data as $k=>$v)
			{
				
				
				if($i<$cnt)
				{
					$col.=$k.",";
					$val.="'".mysqli_real_escape_string($this->con,$v)."',";
				}
				else
				{
					$col.=$k;
					$val.="'".mysqli_real_escape_string($this->con,$v)."'";
				}
				$i++;
			}
			$qry= "insert into ".$TblName." (".$col.") values (".$val.")";
			//echo $qry;
			$res=mysqli_query($this->con,$qry);
			return $res;
		}
		//count row query
		function countrow($str)
		{
			$res=mysqli_query($this->con,$str);
			return mysqli_num_rows($res);
		}
		//get rows
		function getrows($str)
		{
			$res=mysqli_query($this->con,$str);
			return $res;
		}
		//function update/delete rows
		function updatedeleterows($u_d_qry)
		{
			$res=mysqli_query($this->con,$u_d_qry);
			return $res;
		}
	}
	
	/*$c=new connection();
	$ar=array("prd_id"=>"1","Prd_name"=>"Choli","Price"=>"1200","color"=>"red");
	$tbl="test";
	echo $c->insertRec($ar,$tbl);*/
?>