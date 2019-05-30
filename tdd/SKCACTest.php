
<?php
use PHPUnit\Framework\TestCase as TestCase;
class SKCACTest extends TestCase
{
    private $participant;
    public function setUp()
    {
        $this->pariticipant = new Participant();
    }
    public function tearDown()
    {
        unset($this->participant);
    }
}
