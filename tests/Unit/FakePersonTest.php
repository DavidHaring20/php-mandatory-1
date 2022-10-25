<?php 

use PHPUnit\Framework\TestCase;
require_once 'src/FakePerson.php';

class FakePersonTest extends TestCase {

    public function test_get_fake_cpr_number_not_null(): void 
    {
        // given that there is FakePerson object 
        $fakePerson = new FakePerson();

        // when get_fake_cpr_number method is called
        $cprNumber = $fakePerson->get_fake_cpr_number();

        // then asserted cprNumber should not be null
        $this->assertNotNull($cprNumber);
    }
}
?>