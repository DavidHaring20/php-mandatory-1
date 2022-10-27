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

        // then asserted days must be less than or equal to 31
        $this->assertLessThanOrEqual(31, $days);
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
    public function getFakeCprNumberValidYears(): void {
        // given that there is FakePerson object
        $fakePerson = new FakePerson();

        // when getFakeCprNumber method is called
        $data = $fakePerson->getFakeCprNumber();
        $years = intval(substr($data['cprNumber'], 4, 2));

        // then asserted years must be less than or equal to 99
        $this->assertLessThanOrEqual(99, $years);
    }

    /** @test */
    public function getFakeFullNameAndGenderDataFileExists(): void {
        // given that there is FakePerson object

        // when getFakeFullNameAndGender method is called 
    
        // then person-names.json file must exist
        $this->assertFileExists('src/data/person-names.json'); 
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

    /** @test */
    public function getFakeFullNameAndGenderOriginateFromFile(): void {
        // given that there is FakePerson object and file with data 
        $fakePerson = new FakePerson();
        $jsonFile = file_get_contents('src/data/person-names.json');
        $array = json_decode($jsonFile, true);
        $personsArray = array_values($array)[0];
        $mergedArray = array();

        for ($i = 0; $i < count($personsArray); $i++) {
            array_push($mergedArray, $personsArray[$i]['name']);
            array_push($mergedArray, $personsArray[$i]['surname']);
        }
        array_push($mergedArray, 'male');
        array_push($mergedArray, 'female');

        // when getFakeFullNameAndGender method is called
        $data = $fakePerson->getFakeFullNameAndGender();

        // then asserted firstName, lastName and gender must originate from file
        $this->assertContains($data['firstName'], $mergedArray);
        $this->assertContains($data['lastName'], $mergedArray);
        $this->assertContains($data['gender'], $mergedArray);
    }

    /** @test */
    public function getFakeFullNameGenderAndDateOfBirthDataFileExists(): void {
        // given that there is FakePerson object

        // when getFakeFullNameGenderAndDateOfBirth method is called 
    
        // then person-names.json file must exist
        $this->assertFileExists('src/data/person-names.json'); 
    }

    /** @test */
    public function getFakeFullNameGenderAndDateOfBirthNotNull(): void {
        // given that there is FakePerson object
        $fakePerson = new FakePerson();

        // when getFakeFullNameGenderAndDateOfBirth method is called 
        $data = $fakePerson->getFakeFullNameGenderAndDateOfBirth();

        // then asserted firstName, lastName, gender and dateOfBirth must not be null
        $this->assertNotNull($data['firstName']);
        $this->assertNotNull($data['lastName']);
        $this->assertNotNull($data['gender']);
        $this->assertNotNull($data['dateOfBirth']);
   }

   /** @test */
   public function getFakeFullNameGenderAndDateOfBirthOriginateFromFile(): void {
       // given that there is FakePerson object and file with data 
       $fakePerson = new FakePerson();
       $jsonFile = file_get_contents('src/data/person-names.json');
       $array = json_decode($jsonFile, true);
       $personsArray = array_values($array)[0];
       $mergedArray = array();

       for ($i = 0; $i < count($personsArray); $i++) {
           array_push($mergedArray, $personsArray[$i]['name']);
           array_push($mergedArray, $personsArray[$i]['surname']);
       }

       // when getFakeFullNameAndGender method is called
       $data = $fakePerson->getFakeFullNameGenderAndDateOfBirth();

       // then asserted firstName, lastName and gender must originate from file
       $this->assertContains($data['firstName'], $mergedArray);
       $this->assertContains($data['lastName'], $mergedArray);
   }

   /** @test */
   public function getFakeFullNameGenderAndDateOfBirthCorrectDateOfBirthFormat(): void {
       // given that there is FakePerson object
       $fakePerson = new FakePerson();

       // when getFakeFullNameGenderAndDateOfBirth method is called 
       $data = $fakePerson->getFakeFullNameGenderAndDateOfBirth();

       // then asserted dateOfBirth's days, months and years must be correct
       $days = intval(substr($data['dateOfBirth'], 0, 2));
       $months = intval(substr($data['dateOfBirth'], 3, 2));
       $years = intval(substr($data['dateOfBirth'], 6, 4));

       $this->assertLessThanOrEqual(31, $days);
       $this->assertGreaterThanOrEqual(1, $days);
       $this->assertLessThanOrEqual(12, $months);
       $this->assertGreaterThanOrEqual(1, $months);
       $this->assertLessThanOrEqual(2023, $years);
       $this->assertGreaterThanOrEqual(1900 ,$years);
    }

    /** @test */
    public function getFakeCprNumberFullNameAndGenderDataFileExists():void {
        // given that there is FakePerson object

        // when getFakeCprNumberFullNameAndGender method is called

        // then person-names.json file must exist
        $this->assertFileExists('src/data/person-names.json'); 
    }

    /** @test */
    public function getFakeCprNumberFullNameAndGenderNotNull():void {
        // given that there is FakePerson object
        $fakePerson = new FakePerson();

        // when getFakeCprNumberFullNameAndGender method is called
        $data = $fakePerson->getFakeCprNumberFullNameAndGender();

        // then asserted firstName, lastName, gender and cprNumber must not be null
        $this->assertNotNull($data['firstName']);
        $this->assertNotNull($data['lastName']);
        $this->assertNotNull($data['gender']);
        $this->assertNotNull($data['cprNumber']);
    }

    /** @test */
    public function getFakeCprNumberFullNameAndGenderOriginateFromFile():void {
        // given that there is FakePerson object and file with data 
        $fakePerson = new FakePerson();
        $jsonFile = file_get_contents('src/data/person-names.json');
        $array = json_decode($jsonFile, true);
        $personsArray = array_values($array)[0];
        $mergedArray = array();

        for ($i = 0; $i < count($personsArray); $i++) {
            array_push($mergedArray, $personsArray[$i]['name']);
            array_push($mergedArray, $personsArray[$i]['surname']);
        }
        array_push($mergedArray, 'male');
        array_push($mergedArray, 'female');

        // when getFakeCprNumberFullNameAndGender method is called
        $data = $fakePerson->getFakeCprNumberFullNameAndGender();

        // then asserted firstName, lastName and gender must originate from file
        $this->assertContains($data['firstName'], $mergedArray);
        $this->assertContains($data['lastName'], $mergedArray);
        $this->assertContains($data['gender'], $mergedArray);
    }

    /** @test */
    public function getFakeCprNumberFullNameAndGenderCprNumberCorrectLength():void {
        // given that there is FakePerson object
        $fakePerson = new FakePerson();

        // when getFakeCprNumberFullNameAndGender method is called
        $data = $fakePerson->getFakeCprNumberFullNameAndGender();

        // then asserted cprNumber must be of correct length
        $this->assertEquals(10, strlen($data['cprNumber']));
    }

    /** @test */
    public function getFakeCprNumberFullNameAndGenderCprNumberCorrectFormat():void {
        // given that there is FakePerson object
        $fakePerson = new FakePerson();

        // when getFakeCprNumberFullNameAndGender method is called
        $data = $fakePerson->getFakeCprNumberFullNameAndGender();

        // then asserted cprNumber must be of correct format
        $days = intval(substr($data['cprNumber'], 0, 2));
        $months = intval(substr($data['cprNumber'], 2, 2));
        $years = intval(substr($data['cprNumber'], 4, 2));
        
        $this->assertLessThanOrEqual(31, $days);
        $this->assertGreaterThanOrEqual(1, $days);
        $this->assertLessThanOrEqual(12, $months);
        $this->assertGreaterThanOrEqual(1, $months);
        $this->assertLessThanOrEqual(99, $years);
        $this->assertGreaterThanOrEqual(1 ,$years);
    }

    /** @test */
    public function getFakeCprNumberFullNameGenderAndDateOfBirthDataFileExits(): void {
        // given that there is FakePerson object

        // when getFakeCprNumberFullNameGenderAndDateOfBirth method is called

        // then person-names.json file must exist
        $this->assertFileExists('src/data/person-names.json'); 
    }

    /** @test */
    public function getFakeCprNumberFullNameGenderAndDateOfBirthNotNull(): void {
        // given that there is FakePerson object
        $fakePerson = new FakePerson();

        // when getFakeCprNumberFullNameGenderAndDateOfBirth method is called
        $data = $fakePerson->getFakeCprNumberFullNameGenderAndDateOfBirth();

        // then asserted firstName, lastName, gender and cprNumber must not be null
        $this->assertNotNull($data['firstName']);
        $this->assertNotNull($data['lastName']);
        $this->assertNotNull($data['gender']);
        $this->assertNotNull($data['cprNumber']);
        $this->assertNotNull($data['dateOfBirth']);
    }

    /** @test */
    public function getFakeCprNumberFullNameGenderAndDateOfBirthOriginateFromFile(): void {
        // given that there is FakePerson object and file with data 
        $fakePerson = new FakePerson();
        $jsonFile = file_get_contents('src/data/person-names.json');
        $array = json_decode($jsonFile, true);
        $personsArray = array_values($array)[0];
        $mergedArray = array();

        for ($i = 0; $i < count($personsArray); $i++) {
            array_push($mergedArray, $personsArray[$i]['name']);
            array_push($mergedArray, $personsArray[$i]['surname']);
        }
        array_push($mergedArray, 'male');
        array_push($mergedArray, 'female');

        // when getFakeCprNumberFullNameGenderAndDateOfBirth method is called
        $data = $fakePerson->getFakeCprNumberFullNameGenderAndDateOfBirth();

        // then asserted firstName, lastName and gender must originate from file
        $this->assertContains($data['firstName'], $mergedArray);
        $this->assertContains($data['lastName'], $mergedArray);
        $this->assertContains($data['gender'], $mergedArray);
    }

    /** @test */
    public function getFakeCprNumberFullNameGenderAndDateOfBirthCprNumberCorrectLength(): void {
        // given that there is FakePerson object
        $fakePerson = new FakePerson();

        // when getFakeCprNumberFullNameGenderAndDateOfBirth method is called
        $data = $fakePerson->getFakeCprNumberFullNameGenderAndDateOfBirth();

        // then asserted cprNumber must be of correct length
        $this->assertEquals(10, strlen($data['cprNumber']));
    }

    /** @test */
    public function getFakeCprNumberFullNameGenderAndDateOfBirthCprNumberAndDateOfBirthCorrectFormat(): void {
        // given that there is FakePerson object
        $fakePerson = new FakePerson();

        // when getFakeCprNumberFullNameGenderAndDateOfBirth method is called
        $data = $fakePerson->getFakeCprNumberFullNameGenderAndDateOfBirth();

        // then asserted cprNumber and dateOfBirth must be of correct format
        $daysFromCprNumber = intval(substr($data['cprNumber'], 0, 2));
        $monthsFromCprNumber = intval(substr($data['cprNumber'], 2, 2));
        $yearsFromCprNumber = intval(substr($data['cprNumber'], 4, 2));
        $daysFromDateOfBirth = intval(substr($data['dateOfBirth'], 0, 2));
        $monthsFromDateOfBirth = intval(substr($data['dateOfBirth'], 3, 2));
        $yearsFromDateOfBirth = intval(substr($data['dateOfBirth'], 8, 2));
        
        $this->assertLessThanOrEqual(31, $daysFromCprNumber);
        $this->assertGreaterThanOrEqual(1, $daysFromCprNumber);
        $this->assertLessThanOrEqual(12, $monthsFromCprNumber);
        $this->assertGreaterThanOrEqual(1, $monthsFromCprNumber);
        $this->assertLessThanOrEqual(99, $yearsFromCprNumber);
        $this->assertGreaterThanOrEqual(1 ,$yearsFromCprNumber);
        
        $this->assertLessThanOrEqual(31, $daysFromDateOfBirth);
        $this->assertGreaterThanOrEqual(1, $daysFromDateOfBirth);
        $this->assertLessThanOrEqual(12, $monthsFromDateOfBirth);
        $this->assertGreaterThanOrEqual(1, $monthsFromDateOfBirth);
        $this->assertLessThanOrEqual(99, $yearsFromDateOfBirth);
        $this->assertGreaterThanOrEqual(1 ,$yearsFromDateOfBirth);
    }

    /** @test */
    public function getFakeCprNumberFullNameGenderAndDateOfBirthCprNumberEqualsDateOfBirth(): void {
        // given that there is FakePerson object
        $fakePerson = new FakePerson();

        // when getFakeCprNumberFullNameGenderAndDateOfBirth method is called
        $data = $fakePerson->getFakeCprNumberFullNameGenderAndDateOfBirth();

        // then cprNumber and dateOfBirth must be equal
        $daysFromDateOfBirth = substr($data['dateOfBirth'], 0, 2);
        $monthsFromDateOfBirth = substr($data['dateOfBirth'], 3, 2);
        $yearsFromDateOfBirth = substr($data['dateOfBirth'], 8, 2);
        $cprPart = substr($data['cprNumber'], 0, 6);

        $this->assertEquals($cprPart, $daysFromDateOfBirth.$monthsFromDateOfBirth.$yearsFromDateOfBirth);
    }

    /** @test */
    public function getFakeAddressDataFileExists(): void {
        // given that there is FakePerson object

        // when getFakeAddress method is called

        // then postal-codes.json file must exist
        $this->assertFileExists('src/data/postal-codes.json');
    }
    
    /** @test */
    public function getFakeAddressNotNull(): void {
        // given that there is FakePerson object
        $fakePerson = new FakePerson();

        // when getFakeAddress method is called
        $data = $fakePerson->getFakeAddress();

        // then streetName, streetNumber, floor, door, town and postal code must not be null
        $this->assertNotNull($data['streetName']);
        $this->assertNotNull($data['streetNumber']);
        $this->assertNotNull($data['floor']);
        $this->assertNotNull($data['door']);
        $this->assertNotNull($data['town']);
        $this->assertNotNull($data['code']);
    }
    
    /** @test */
    public function getFakeAddressOriginateFromFile(): void {
        // given that there is FakePerson object and file with data 
        $fakePerson = new FakePerson();
        $jsonFile = file_get_contents('src/data/postal-codes.json');
        $array = json_decode($jsonFile, true);
        $personsArray = array_values($array);
        $mergedArray = array();

        for ($i = 0; $i < count($personsArray); $i++) {
            array_push($mergedArray, $personsArray[$i]['postal_code']);
            array_push($mergedArray, $personsArray[$i]['town_name']);
        }

        // when getFakeAddress method is called
        $data = $fakePerson->getFakeAddress();

        // then asserted code and town must originate from file
        $this->assertContains($data['code'], $mergedArray);
        $this->assertContains($data['town'], $mergedArray);
    }

    /** @test */
    public function getFakeMobilePhoneNumberDataFileExists(): void {
        // given that there is a FakePerson object

        // when getFakeMobilePhoneNumber method is called 

        // then phone-number-digit-combinations.json file must exist
        $this->assertFileExists('src/data/phone-number-digit-combinations.json');
    }

    /** @test */
    public function getFakeMobilePhoneNumberNotNull(): void {
        // given that there is a FakePerson object
        $fakePerson = new FakePerson();

        // when getFakeMobilePhoneNumber method is called 
        $data = $fakePerson->getFakeMobilePhoneNumber();

        // then mobilePhoneNumber must not be null 
        $this->assertNotNull($data['mobilePhoneNumber']);
    }

    /** @test */
    public function getFakeMobilePhoneNumberOriginatesFromFile(): void {
        // given that there is a FakePerson object
        $fakePerson = new FakePerson();

        // when getFakeMobilePhoneNumber method is called 
        $data = $fakePerson->getFakeMobilePhoneNumber();
        $jsonFile = file_get_contents('src/data/phone-number-digit-combinations.json');
        $array = json_decode($jsonFile, true);
        $combinationsArray = array_values($array);
        $mergedArray = array();

        for ($i = 0; $i < count($combinationsArray); $i++) {
            array_push($mergedArray, $combinationsArray[$i]['combination']);
        }

        $oneDigit = substr($data['mobilePhoneNumber'], 0, 1);
        $twoDigits = substr($data['mobilePhoneNumber'], 0, 2);
        $threeDigits = substr($data['mobilePhoneNumber'], 0, 3);

        // then either first oneDigit, first twoDigits or firstThree digits should originate from phone-number-digit-combinations.json file
        if (in_array($oneDigit, $mergedArray)) {
            $this->assertTrue(in_array($oneDigit, $mergedArray));
        } elseif (in_array($twoDigits, $mergedArray)) {
            $this->assertTrue(in_array($twoDigits, $mergedArray));
        } else {
            $this->assertTrue(in_array($threeDigits, $mergedArray));
        }
    }

    /** @test */
    public function getFakeMobilePhoneNumberCorrectLength(): void {
        // given that there is a FakePerson object
        $fakePerson = new FakePerson();

        // when getFakeMobilePhoneNumber method is called 
        $data = $fakePerson->getFakeMobilePhoneNumber();

        // then mobilePhoneNumber must be of correct length
        $this->assertEquals(8, strlen($data['mobilePhoneNumber']));
    }

    /** @test */
    public function getFakePersonNotNull(): void {
        // given that there is a FakePerson object
        $fakePerson = new FakePerson();

        // when getFakePerson method is called 
        $data = $fakePerson->getFakePerson();

        // then asserted FakePerson data must not be null
        $this->assertNotNull($data['firstName']);
        $this->assertNotNull($data['lastName']);
        $this->assertNotNull($data['gender']);
        $this->assertNotNull($data['dateOfBirth']);
        $this->assertNotNull($data['cprNumber']);
        $this->assertNotNull($data['streetName']);
        $this->assertNotNull($data['streetNumber']);
        $this->assertNotNull($data['floor']);
        $this->assertNotNull($data['door']);
        $this->assertNotNull($data['town']);
        $this->assertNotNull($data['code']);
        $this->assertNotNull($data['mobilePhoneNumber']);
    }
    
    /** @test */
    public function getFakePersonsNotNull(): void {
        // given that there is a FakePerson object
        $fakePerson = new FakePerson();

        // when getFakePersons method is called 
        $data = $fakePerson->getFakePersons(5);

        // then asserted FakePersons data must not be null
        $this->assertNotNull($data[0]);
        $this->assertNotNull($data[1]);
        $this->assertNotNull($data[2]);
        $this->assertNotNull($data[3]);
    }
    
    /** @test */
    public function getFakePersonsCorrectNumberOfPersons(): void {
        // given that there is a FakePerson object
        $fakePerson = new FakePerson();

        // when getFakePersons method is called 
        $data = $fakePerson->getFakePersons(5);

        // then asserted number of persons can't be lesser than 2 or greater than 100
        $this->assertGreaterThanOrEqual(2, count($data));
        $this->assertLessThanOrEqual(100, count($data));
    }
}
?>