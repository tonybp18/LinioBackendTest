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

    /**
     * Check if printChallenge prints N elements correctly.
     * N is a random number from 1 to 500.
     * @runInSeparateProcess
	 * @covers ::printChallenge
	 */
	public function test_printChallenge_prints_N_elements_correctly()
    {
    	$backendChallenge = new BackendChallenge(new DefaultOutputFormat);
    	
    	define("TOP", rand(1, 500));

    	// Call with parameter equals 0
    	$backendChallenge->printChallenge(TOP);

    	$outputString = ob_get_contents();
        $outputString = rtrim($outputString);

        $outputStringAsArray = explode(' ', $outputString);
        
        // Checks if has one element and is an empty string
        $this->assertCount(TOP, $outputStringAsArray);
        //$this->assertEquals(TOP, $outputStringAsArray[0]);
        
		// Expected values
        $div15 = floor(TOP / 15);
        $div5  = floor(TOP / 5 ) - $div15;
        $div3  = floor(TOP / 3 ) - $div15;
        $nbrs  = TOP - $div15 - $div5 - $div3;

		// Actual values
		// Check number of elements of each type
        $linioCount = 0;
        $itCount = 0;
        $linianosCount = 0;
        $othersCount = 0;

        foreach ($outputStringAsArray as $value)
        {
            switch ($value)
            {
                case 'Linio':
                    $linioCount++;
                    break;

                case 'IT':
                    $itCount++;
                    break;

                case 'Linianos':
                    $linianosCount++;
                    break;

                default:
                    $othersCount++;
            }
        }

        $this->assertEquals($div15, $linianosCount);
        $this->assertEquals($div5 , $itCount);
        $this->assertEquals($div3 , $linioCount);
        $this->assertEquals($nbrs , $othersCount);
    }
}
