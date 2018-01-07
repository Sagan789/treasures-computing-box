<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 05/01/2018
 * Time: 16:42
 */

namespace App\Tests\Model;

use App\Model\PiCalculator;
use PHPUnit\Framework\TestCase;

class PiCalculatorTest extends TestCase
{

    public function testLiebniz13Decimals()
    {

        $result = PiCalculator::liebniz_method(1000000);

        // assert that calculator get the correct value
        $this->assertEquals(3.1415936535888, $result);
    }
}