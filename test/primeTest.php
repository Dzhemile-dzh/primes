<?php
declare(strict_types=1);
require 'src/prime.php';
 
class MultiplicationPrimesTablesTests extends PHPUnit_Framework_TestCase
{
    private $primes;
 
    protected function setUp()
    {
        $this->primes = new MultiplicationPrimesTables();
    }
 
    protected function tearDown()
    {
        $this->primes = NULL;
    }
 
    public function testAdd()
    {
        $result = $this->primes->print(14);
        $this->assertEquals([17, 19, 23], $result);
    }

    public function testAddWithZero()
    {
        $result = $this->primes->print(0);
        $this->assertStringStartsWith("\n\n Error : invalid input\n\n", $result);
    }

    public function testAddWithNegative()
    {
        $result = $this->primes->print(-1);
        $this->assertEquals("Negative numbers are not allowed!", $result);
    }
 
}