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
        $this->assertNotNull($data['cprNumber']);
    }

    /** @test */
    public function getFakeCprNumberCorrectLength(): void{
        // given that there is FakePerson object
        $fakePerson = new FakePerson();

        // when getFakeCprNumber method is called
        $data = $fakePerson->getFakeCprNumber();

        // then asserted cprNumber must be of correct length
        $this->assertSame(10, strlen($data['cprNumber']));
    }

    /** @test */
    public function getFakeCprNumberValidDays(): void {
        // given that there is FakePerson object
        $fakePerson = new FakePerson();

        // when getFakeCprNumber method is called
        $data = $fakePerson->getFakeCprNumber();
        $days = intval(substr($data['cprNumber'], 0, 2));

        // then asserted days must be less than or equal to 30
        $this->assertLessThanOrEqual(30, $days);
    }

    /** @test */
    public function getFakeCprNumberValidMonths(): void {
        // given that there is FakePerson object
        $fakePerson = new FakePerson();

        // when getFakeCprNumber method is called
        $data = $fakePerson->getFakeCprNumber();
        $months = intval(substr($data['cprNumber'], 2, 2));

        // then asserted months must be less than or equal to 12
        $this->assertLessThanOrEqual(12, $months);
    }

    /** @test */
    public function getFakeFullNameAndGenderNotNull(): void {
        // given that there is FakePerson object
        $fakePerson = new FakePerson();

        // when getFakeFullNameAndGender method is called 
        $data = $fakePerson->getFakeFullNameAndGender();

        // then asserted firstName, lastName and gender must not be null
        $this->assertNotNull($data['firstName']);
        $this->assertNotNull($data['lastName']);
        $this->assertNotNull($data['gender']);
    }
}
?>