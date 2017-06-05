<?php
namespace Linio\Recruiting\Service;

use Linio\Recruiting\Interfaces\IOutputFormat;
use Linio\Recruiting\Implementations\DefaultOutputFormat;

/**
 * Represents the backend challenge
 */
class BackendChallenge
{
    /**
     * IOutputFormat implementation for the instance.
     * @var IOutputFormat
     */
	private $outputFormat;

	/**
	 * Creates a BackendChallenge instance with the DefaultOutputFormat as default value.
	 */
	function __construct()
	{
		$this->outputFormat = new DefaultOutputFormat;
	}
	
	/**
	 * Sets the output format desired.
	 * @param IOutputFormat $outputFormat Output format desired.
	 */
	public function setOutputFormat(IOutputFormat $outputFormat)
	{
		$this->outputFormat = $outputFormat;
	}

	/**
	 * Prints all the numbers from 1 to $limit. For multiples of 3, 
	 * instead of the number will print "Linio". For multiples of 5 will print "IT".
	 * For numbers which are multiples of both 3 and 5 will print "Linianos".
	 * @param  int|integer $limit Set the top limit for printing numbers, default is 100.
	 */
	public function printChallenge(int $limit = 100)
	{
		$array = array();

		for ( $i = 1 ; $i <= $limit ; $i++ )
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

			$array[$i] = $msg;
		}

		$this->outputFormat->print($array);
	}
}