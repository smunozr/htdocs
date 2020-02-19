<?php
include "operaciones.php";

use PHPUnit\Framework\TestCase;

class Test extends TestCase
{
    public function testSum(){
        $this->assertSame(7,suma(4,3));
        $this->assertNotSame(11,suma(9,3));
        $this->assertIsInt(suma(7,8));
    }

    public function testResta(){
        $this->assertSame(1,resta(2,1));
        $this->assertNotSame(7,resta(9,3));
        $this->assertIsInt(resta(7,8));
    }

    public function testMult(){
        $this->assertSame(9, mult(3,3));
        $this->assertNotSame(26,mult(9,3));
        $this->assertIsInt(mult(7,8));
    }

    public function testDiv(){
        $this->assertSame(3, div(9,3));
        $this->assertNotSame(4,div(9,3));
        $this->assertIsFloat(div(7,8));
    }
}
