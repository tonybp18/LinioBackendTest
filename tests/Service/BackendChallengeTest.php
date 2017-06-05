<?php
namespace Linio\Recruiting\Service;

use Linio\Recruiting\Implementations\DefaultOutputFormat;
use Linio\Recruiting\Implementations\JsonOutputFormat;
use Linio\Recruiting\Implementations\XmlOutputFormat;

/**
 * @package Linio\Recruiting\Service
 * @coversDefaultClass \Linio\Recruiting\Service\BackendChallenge
 */
class BackendChallengeTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @covers ::__construct
	 */
	public function test_construct_not_null()
    {
    	$backendChallenge = new BackendChallenge(new DefaultOutputFormat);
    	
    	$this->assertNotNull($backendChallenge);
    }

    /**
	 * @covers ::__construct
	 * @expectedException \TypeError
	 */
	public function test_construct_must_recive_an_IOutputFormat_implementation()
    {
    	$backendChallenge = new BackendChallenge();    	
    }

    /**
     * @runInSeparateProcess
	 * @covers ::printChallenge
	 */
	public function test_printChallenge_prints_100_elements_by_default()
    {
    	$backendChallenge = new BackendChallenge(new DefaultOutputFormat);
    	$backendChallenge->printChallenge();

    	$outputString = ob_get_contents();
        $outputString = rtrim($outputString);

        $outputStringAsArray = explode(' ', $outputString);

        // Checks default number of elements
        $this->assertCount(100, $outputStringAsArray);
    }

    /**
     * @runInSeparateProcess
	 * @covers ::printChallenge
	 */
	public function test_printChallenge_prints_0_elements_with_cero_or_negative_parameter()
    {
    	$backendChallenge = new BackendChallenge(new DefaultOutputFormat);
    	
    	// Call with parameter equals 0
    	$backendChallenge->printChallenge(0);

    	$outputString = ob_get_contents();
        $outputString = rtrim($outputString);

        $outputStringAsArray = explode(' ', $outputString);
        
        // Checks if has one element and is an empty string
        $this->assertCount(1, $outputStringAsArray);
        $this->assertEquals("", $outputStringAsArray[0]);


    	// Call with a negative number
        $backendChallenge->printChallenge(-20);

    	$outputString = ob_get_contents();
        $outputString = rtrim($outputString);

        $outputStringAsArray = explode(' ', $outputString);
        
        // Checks if has one element and is an empty string
        $this->assertCount(1, $outputStringAsArray);
        $this->assertEquals("", $outputStringAsArray[0]);
    }
}
