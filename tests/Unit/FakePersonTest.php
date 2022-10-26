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

       $this->assertLessThanOrEqual(30, $days);
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
        
        $this->assertLessThanOrEqual(30, $days);
        $this->assertGreaterThanOrEqual(1, $days);
        $this->assertLessThanOrEqual(12, $months);
        $this->assertGreaterThanOrEqual(1, $months);
        $this->assertLessThanOrEqual(99, $years);
        $this->assertGreaterThanOrEqual(1 ,$years);
    }
}
?>