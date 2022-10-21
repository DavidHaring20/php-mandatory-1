<?php 


class FakePerson {
    public string $firstName;
    public string $lastName;
    public string $gender;
    public string $cprNumber;
    public string $dateOfBirth;
    public string $address;
    public string $mobilePhoneNumber;

    public function get_fake_cpr_number() {
        $dd = str_pad(strval(rand(1, 31)), 2, "0", STR_PAD_LEFT);
        $mm = str_pad(strval(rand(1, 12)), 2, "0", STR_PAD_LEFT);
        $yy = str_pad(strval(rand(0, 99)), 2, "0", STR_PAD_LEFT);
        $random = str_pad(strval(rand(1, 9999)), 4, "0", STR_PAD_LEFT);

        return $dd.$mm.$yy.$random;
    }

    public function get_fake_full_name_and_gender() {
        // check if the file exists
        if (!file_exists('data/person-names.json')) {
            return "File person-names.json is missing. Data from this file is required to make function get_fake_full_name_and_gender() work.";
        }

        // read from file 
        $jsonFile = file_get_contents('data/person-names.json');
        $array = json_decode($jsonFile, true);
        
        // process data 
        $personsArray = array_values($array)[0];
        
        // extract random person and random person data
        $randomPersonArray = $personsArray[rand(0, count($personsArray) - 1)];
        $fullNameAndGender = $randomPersonArray['name'] . " " . $randomPersonArray['surname'] . " - " . $randomPersonArray['gender'];

        // return data
        return $fullNameAndGender;
    }

    public function get_fake_full_name_gender_and_date_of_birth() {}

    public function get_fake_cpr_number_full_name_and_gender() {}

    public function get_fake_cpr_number_full_name_gender_and_date_of_birth() {}

    public function get_fake_address() {}

    public function get_fake_mobile_phone_number() {}

    public function get_fake_person() {}

    public function get_fake_persons() {}
}

?> 