<?php
	$items = array();
	$count = 0;
	$total = 0;

	
	if ($_SERVER['REQUEST_METHOD'] == 'GET')
	{
		foreach ($_GET as $key=>$value)
		{
			if ($value == "")
			{
				$value = 'Undefined';
			}

			$keyVal = array(
				$key => $value
			);
			array_push($items, $keyVal);
		}
	}

	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		foreach ($_POST as $key=>$value)
		{
			if ($value == "")
			{
				$value = 'Undefined';
			}

			$keyVal = array(
				$key => $value
			);
			array_push($items, $keyVal);
		}
	}

	//print_r($items);


	foreach ($items as $outerArray)
	{
		foreach ($outerArray as $value) 
		{
			//echo $value;
			if ($value == 'Undefined')
			{
				$count++;
			}
		
		}

		$total++;
	}

	//echo $count;
	//echo $total;

	if ($count == $total)
	{
		$sType = array(
		'Type' => $_SERVER['REQUEST_METHOD'],
		'parameters' => null
		);

		$jsonObj = json_encode($sType);
		echo $jsonObj;
	}
	else
	{
		$sType = array(
			'Type' => $_SERVER['REQUEST_METHOD'],
			'parameters' => $items
		);

		$jsonObj = json_encode($sType);
		$jsonObj = str_replace(array('[',']'), '', $jsonObj); //I learned the array in str_replace trick that saved me a line of code from: http://www.codingforums.com/ajax-and-design/250776-return-json-output-without-square-brakets.html
		$jsonObj = str_replace('},{', ',', $jsonObj);
		echo $jsonObj;
	}
?>





