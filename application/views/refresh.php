<?php 



foreach ($json as $data )
{
	$json1[]  = array(
				0 =>$data['title'],
				1 =>$data['description'],
				2 =>$data['minimumsalary'],
				3 =>$data['maximumsalary'],
				4 =>$data['experience'],
				5 =>$data['qualification'],
				6 =>$data['createAt'],
				
			);
 } 
 echo json_encode($json1);
 ?>

 