<?php
    header('Access-Control-Allow-Origin: *');
    include("../include/config.php");
    $cnn = new connection();
    $headers = array("Content-Type:multipart/form-data");
    $user_id=$_REQUEST['user_id'];
    $data= array();
    $today = date("Y-m-d");

    $selectEvent1 = $cnn -> getrows("SELECT * FROM booking_master WHERE user_id = '$user_id' AND status != '0'");
    $a=0;
    $b=0;
    if(mysqli_num_rows($selectEvent1) > 0)
    {
   	while($getEvent1 = mysqli_fetch_assoc($selectEvent1))
   	{
   		//echo "A:".$a++."<br>";
	   	$event_id = $getEvent1['event_id'];
	   	$selectEvent = $cnn -> getrows("SELECT *,em.city,em.start_date,em.event_status,em.status FROM event_master em,user_master um WHERE em.user_id = um.user_id AND em.event_id = '$event_id' AND em.event_status='2' AND em.status='1' ORDER BY em.start_date DESC");
	   	
		while($getEvent = mysqli_fetch_assoc($selectEvent))
		{
			//echo "B:".$b++."<br>";
			$getEvent['start_date'];
			$e_id=$getEvent['event_id'];
			$count=$cnn ->countrow("SELECT * FROM review_ratting_master WHERE event_id = '$e_id' and user_id='$user_id'");
			if($count > 0)
			{
				$review_status='1';
			}
			else
			{
				$review_status='0';
			}	
			$getEvent['review_status'] = $review_status;
	                $data[] = $getEvent;
		}	
	}
	if(empty($data))
	{
		echo json_encode(array("allEvent" => array(), "ResponseCode" => "2", "Result" => "False"));
	}
	else
	{
		sksort($data, "start_date");
		//var_dump($data);
		echo json_encode(array("allEvent" => $data, "ResponseCode" => "1", "Result" => "True"));
	}
    }
    else
    {
	echo json_encode(array("allEvent" => array(), "ResponseCode" => "2", "Result" => "False"));
    }
    
function sksort(&$array, $subkey="id", $sort_ascending=false) {

    if (count($array))
        $temp_array[key($array)] = array_shift($array);

    foreach($array as $key => $val){
        $offset = 0;
        $found = false;
        foreach($temp_array as $tmp_key => $tmp_val)
        {
            if(!$found and strtolower($val[$subkey]) > strtolower($tmp_val[$subkey]))
            {
                $temp_array = array_merge(    (array)array_slice($temp_array,0,$offset),
                                            array($key => $val),
                                            array_slice($temp_array,$offset)
                                          );
                $found = true;
            }
            $offset++;
        }
        if(!$found) $temp_array = array_merge($temp_array, array($key => $val));
    }

    if ($sort_ascending) $array = array_reverse($temp_array);

    else $array = $temp_array;
}


?>