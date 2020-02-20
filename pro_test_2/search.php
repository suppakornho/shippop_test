<?php 
    header('Content-Type: application/json');

    $keyword = $_POST['keyword'];
    $array = explode(",",$_POST['list']);
    $array_size = count($array);

    switch ($_POST['type']) {
    	case '1':
    		$data = array();

    		for($i = 0; $i < $array_size; $i++){
    			if($keyword != $array[$i]){
    				array_push($data,$array[$i]);
    			}else{
    				array_push($data,$array[$i]);
    				break;
    			}
    		}
    		break;
    	case '2':
    		$data = $array;

    		$swapped=true;
		    $n=count($data);
		    $temp=null;
		    while($swapped)//outer loop
		    {
		        $swapped = false;
		        for($i=0; $i<$n-1; $i++)//inner loop
		        {
		            if( $data[$i]>$data[$i+1]) //swap if the current value is greater the next value. change > to > for descending order
		            {
		                $temp=$data[$i];
		                $data[$i]=$data[$i+1];
		                $data[$i+1]=$temp;
		                $swapped=true;
		            }
		        }
		    }
	    
		    $low = 0; 
		    $high = $array_size - 1; 
		    $array_push = array();
		      
		    while ($low <= $high) { 
		          
		        // compute middle index 
		        $mid = floor(($low + $high) / 2); 
		   
		        // element found at mid 
		        if($data[$mid] == $keyword) { 
		        	array_push($array_push,$data[$mid]);
		            break; 
		        } 
		  
		        if ($keyword < $data[$mid]) { 
		            array_push($array_push,$data[$mid]);
		            $high = $mid -1; 
		        } 
		        else { 
		            array_push($array_push,$data[$mid]);
		            $low = $mid + 1; 
		        } 
		    }

		    $data = $array_push;

    		break;
    	case '3':
    		$data = $array;

    		$swapped=true;
		    $n=count($data);
		    $temp=null;
		    while($swapped)//outer loop
		    {
		        $swapped = false;
		        for($i=0; $i<$n-1; $i++)//inner loop
		        {
		            if( $data[$i]>$data[$i+1]) //swap if the current value is greater the next value. change > to > for descending order
		            {
		                $temp=$data[$i];
		                $data[$i]=$data[$i+1];
		                $data[$i+1]=$temp;
		                $swapped=true;
		            }
		        }
		    }
    		break;    	
    	default:
    		break;
    }

	echo json_encode($data);
	exit;
?>