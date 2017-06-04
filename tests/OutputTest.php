<?php
namespace Linio\Recruiting;

class OutputTest extends \PHPUnit_Framework_TestCase
{

    public function testDefaultOutput()
    {
        require 'index.php';

        $outputString = ob_get_contents();
        $outputString = rtrim($outputString);

        $outputStringAsArray = explode(' ', $outputString);

        // Checks default number of elements
        $this->assertCount(100, $outputStringAsArray);

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

        $this->assertEquals(27, $linioCount);
        $this->assertEquals(14, $itCount);
        $this->assertEquals(06, $linianosCount);
        $this->assertEquals(53, $othersCount);

        // Check initial values from 1 to 15
        $expectedArraySubset = array(1, 2, "Linio", 4, "IT", "Linio", 7, 8, "Linio", "IT", 11, "Linio", 13, 14, "Linianos");

        $this->assertArraySubset($expectedArraySubset, $outputStringAsArray);

    }

}