<?php 
	$max1_1 = 5;

	for($i = 1; $i <= $max1_1; $i++){
		for($j = $max1_1; $j >=1 ; $j--){
			if($j > $i){
				echo "_";
			}else{
				echo "o";
			}

		}
		echo "<br>";
	}

	echo "<br>";echo "<br>";echo "<br>";echo "<br>";

	$max1_2 = 5;
	$c = 0;

	for($i = 1; $i <= $max1_2; $i++){
		for($j = $max1_2-$i; $j >=1 ; $j--){
			echo "_";
		}

		$show = ($i*2)-1;

		for($s = 1; $s <= $show; $s++){
			echo "o";
		}
		echo "<br>";		
	}
?>