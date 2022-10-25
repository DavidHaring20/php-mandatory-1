<?php 

use PHPUnit\Framework\TestCase;
require_once 'src/FakePerson.php';

class FakePersonTest extends TestCase {

    /** @test */
    public function getFakecprNumberNotNull(): void {
        // given that there is FakePerson object 
        $fakePerson = new FakePerson();

        // when getFakeCprNumber method is called
        $data = $fakePerson->getFakeCprNumber();

        // then asserted cprNumber should not be null
        $this->assertNotNull($data);
    }

    /** @test */
    public function getFakeCprNumberCorrectLength(): void{
        // given that there is FakePerson object
        $fakePerson = new FakePerson();

        // when getFakeCprNumber method is called
        $data = $fakePerson->getFakeCprNumber();
        $cprNumber = $data['cprNumber'];

        // then asserted cprNumber must be of correct length
        $this->assertSame(10, strlen($cprNumber));
    }

    /** @test */
    public function getFakeCprNumberValidDays(): void {
        // given that there is FakePerson object
        $fakePerson = new FakePerson();

        // when getFakeCprNumber method is called
        $data = $fakePerson->getFakeCprNumber();
        $cprNumber = $data['cprNumber']; 
        $days = intval(substr($cprNumber, 0, 2));

        // then asserted days must be less than or equal to 30
        $this->assertLessThanOrEqual(30, $days);
    }

    /** @test */
    public function getFakeCprNumberValidMonths(): void {
        // given that there is FakePerson object
        $fakePerson = new FakePerson();

        // when getFakeCprNumber method is called
        $data = $fakePerson->getFakeCprNumber();
        $cprNumber = $data['cprNumber']; 
        $months = intval(substr($cprNumber, 2, 2));

        // then asserted months must be less than or equal to 12
        $this->assertLessThanOrEqual(12, $months);
    }
}
?>