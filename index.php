<?php

for ( $i = 1 ; $i <= 100 ; $i++ )
{
	$msg = $i;

	switch ( $i % 3 )
	{
		case 0:
			$msg = "Linio";
	}
	
	switch ( $i % 5 )
	{
		case 0:
			$msg = "IT";
	}

	switch ( $i % 3 + $i % 5 )
	{
		case 0:
			$msg = "Linianos";
	}

	echo $msg . " ";
}

?>