<?php

namespace Programmerzamannow\BelajarPhpUnitTest;

use PHPUnit\Framework\TestCase;

class PersonTest extends TestCase
{
    private Person $person;

    protected function setUp(): void
    {

    }

    /**
     * @before
     */
    public function createPerson(): void
    {
        $this->person = new Person("Yasir");
    }

    public function testSuccess()
    {
        self::assertEquals("Hello Budi, my name is Yasir", $this->person->sayHello("Budi"));
    }

    public function testException()
    {
        $this->expectException(\Exception::class);
        $this->person->sayHello(null);
    }

    public function testGoodByeSuccess()
    {
        $this->expectOutputString("Good bye Budi" . PHP_EOL);
        $this->person->sayGoodBye("Budi");
    }
}