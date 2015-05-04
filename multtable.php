<?php
	foreach ($_GET as $key=>$value)
	{

		if ($key == "min-multiplicand")
		{
			$minMultiRaw = $value;
		} elseif ($key == "max-multiplicand") {
			$maxMultiRaw = $value;
		} elseif ($key == "min-multiplier") {
			$minPlierRaw = $value;
		} elseif ($key == "max-multiplier") {
			$maxPlierRaw = $value;
		}

	}

	if (!filter_var($minMultiRaw, FILTER_VALIDATE_INT) === false) //I learned this line from W3 schools which allows me to verify that the number is an integer.
	{
		$minMulti = intval($minMultiRaw);
	}
	else
	{
		$minMulti = $minMultiRaw;
	}
	
	if (!filter_var($maxMultiRaw, FILTER_VALIDATE_INT) === false) 
	{
		$maxMulti = intval($maxMultiRaw);
	}
	else
	{
		$maxMulti = $maxMultiRaw;
	}
	
	if (!filter_var($minPlierRaw, FILTER_VALIDATE_INT) === false) 
	{
		$minPlier = intval($minPlierRaw);
	}
	else
	{
		$minPlier = $minPlierRaw;
	}
	
	if (!filter_var($maxPlierRaw, FILTER_VALIDATE_INT) === false) 
	{
		$maxPlier = intval($maxPlierRaw);
	}
	else
	{
		$maxPlier = $maxPlierRaw;
	}

	
	if (($minMulti != null) && ($maxMulti != null) && ($minPlier != null) && ($maxPlier != null)) //checks to make sure not null
	{
		if (is_int($minMulti) && is_int($maxMulti) && is_int($minPlier) && is_int($maxPlier)) //checks to make sure val is an int
		{
			if (( $minMulti <= $maxMulti) && ($minPlier <= $maxPlier))		//checks to make sure Min are less than Max
			{
				buildTable($minMulti, $maxMulti, $minPlier, $maxPlier);
			}
			elseif  ($minMulti > $maxMulti)
			{
				echo "Minimum multiplicand larger than maximum";
			}
			else
			{
				echo "Minimum multiplier larger than maximum";
			}
		}
		else
		{
			if (is_int($minMulti) == false)
			{
				echo "Minimum multiplicand must be an integer.";
			}
			if (is_int($maxMulti) == false)
			{
				echo "Maximum multiplicand must be an integer.";
			}
			if (is_int($minPlier) == false)
			{
				echo "Minimum multiplier must be an integer.";
			}
			if (is_int($maxPlier) == false)
			{
				echo "Maximum multiplier must be an integer.";
			}
		}
	}
	else
	{
		if ($minMulti == null)
		{
			echo "Missing parameter minimum multiplicand.";
		}
		if ($maxMulti == null)
		{
			echo "Missing parameter maximum multiplicand.";
		}
		if ($minPlier == null)
		{
			echo "Missing parameter minimum multiplier.";
		}
		if ($maxPlier == null)
		{
			echo "Missing parameter maximum multiplier.";
		}
	}

	function buildTable($minM, $maxM, $minP, $maxP) 
	{
		$tableOutput = "";

		echo '<table style="border: 1px solid black;"><thead><tr><th style="border: 1px solid black;"></th>';

		for ($x = $minP; $x <= $maxP; $x++)
		{
			echo '<th style="border: 1px solid black;">'.$x.'</th>';
		}
		echo '</tr></thead>';
		echo '<tbody>';
		
		for ($y = $minM; $y <= $maxM; $y++)
		{
			echo '<tr><th style="border: 1px solid black;">'.$y.'</th>';
			for ($x = $minP; $x <= $maxP; $x++)
			{
				$total = $y * $x;
				echo '<td style="border: 1px solid black;">'.$total.'</td>';
			}
			echo '</tr>';
		}
		
		echo '</tbody></table>';

	}
?>
