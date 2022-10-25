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

        $data = array();
        $data['cprNumber'] = $dd.$mm.$yy.$random;

        return $data;
    }

    public function get_fake_full_name_and_gender() {
        if (!file_exists('data/person-names.json')) {
            return "File person-names.json is missing. Data from this file is required to make function get_fake_full_name_and_gender() work.";
        }

        $jsonFile = file_get_contents('data/person-names.json');
        $array = json_decode($jsonFile, true);
        $personsArray = array_values($array)[0];
        
        $randomPersonArray = $personsArray[rand(0, count($personsArray) - 1)];

        $data = array();
        $data['firstName'] = $randomPersonArray['name'];
        $data['lastName'] = $randomPersonArray['surname'];
        $data['gender'] = $randomPersonArray['gender'];

        return $data;
    }

    public function get_fake_full_name_gender_and_date_of_birth() {
        $fakePerson = new FakePerson();
        $data = $fakePerson->get_fake_full_name_and_gender();

        $dd = str_pad(strval(rand(1, 31)), 2, "0", STR_PAD_LEFT);
        $mm = str_pad(strval(rand(1, 12)), 2, "0", STR_PAD_LEFT);
        $yy = strval(rand(1900, 2022));

        $data['dateOfBirth'] =  $dd . "/" . $mm . "/" . $yy;

        return $data;
    }

    public function get_fake_cpr_number_full_name_and_gender() {
        if (!file_exists('data/person-names.json')) {
            return "File person-names.json is missing. Data from this file is required to make function get_fake_full_name_and_gender() work.";
        }

        $jsonFile = file_get_contents('data/person-names.json');
        $array = json_decode($jsonFile, true);
        $personsArray = array_values($array)[0];
        
        $randomPersonArray = $personsArray[rand(0, count($personsArray) - 1)];

        $data = array();
        $data['firstName'] = $randomPersonArray['name'];
        $data['lastName'] = $randomPersonArray['surname'];
        $data['gender'] = $randomPersonArray['gender'];

        $dd = str_pad(strval(rand(1, 31)), 2, "0", STR_PAD_LEFT);
        $mm = str_pad(strval(rand(1, 12)), 2, "0", STR_PAD_LEFT);
        $yy = str_pad(strval(rand(0, 99)), 2, "0", STR_PAD_LEFT);
        $random = 0;

        if ($randomPersonArray["gender"] === "male") {
            // create odd number
            $random = floor(rand(4, 20000) / 2);
            if ($random % 2 === 0) {
                $random -= 1;
            }
        } else {
            // create even number
            $random = rand(1, 4999) * 2;
        }

        $random = str_pad(strval($random), 4, "0", STR_PAD_LEFT);
        $data['cprNumber'] = $dd.$mm.$yy.$random;
        
        return $data;
    }

    public function get_fake_cpr_number_full_name_gender_and_date_of_birth() {
        if (!file_exists('data/person-names.json')) {
            return "File person-names.json is missing. Data from this file is required to make function get_fake_full_name_and_gender() work.";
        }

        $jsonFile = file_get_contents('data/person-names.json');
        $array = json_decode($jsonFile, true);
        $personsArray = array_values($array)[0];
        
        $randomPersonArray = $personsArray[rand(0, count($personsArray) - 1)];

        $data = array();
        $data['firstName'] = $randomPersonArray['name'];
        $data['lastName'] = $randomPersonArray['surname'];
        $data['gender'] = $randomPersonArray['gender'];

        $dd = str_pad(strval(rand(1, 31)), 2, "0", STR_PAD_LEFT);
        $mm = str_pad(strval(rand(1, 12)), 2, "0", STR_PAD_LEFT);
        $year = strval(rand(1900, 2022));   
        $yy = substr($year, 2, 2);
        $random = 0;

        $data['dateOfBirth'] = $dd . "/" . $mm . "/" . $year;

        if ($randomPersonArray["gender"] === "male") {
            // create odd number
            $random = floor(rand(4, 20000) / 2);
            if ($random % 2 === 0) {
                $random -= 1;
            }
        } else {
            // create even number
            $random = rand(1, 4999) * 2;
        }

        $random = str_pad(strval($random), 4, "0", STR_PAD_LEFT);
        $data['cprNumber'] = $dd.$mm.$yy.$random;

        return $data;
    }

    public function get_fake_address() {
        if (!file_exists('data/postal-codes.json')) {
            return "File postal-codes.json is missing. Data from this file is required to make function get_fake_address() work.";
        }
        
        // Street name
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';    
        $streetName = '';
        $streetNameLength = rand(8, 16);

        for ($i = 0; $i < $streetNameLength; $i++) {
            $characterSelector = rand(0, strlen($characters) - 1);
            $streetName .= $characters[$characterSelector];
        }

        // Number
        $streetNumber = rand(1, 999);
        $streetNumberLetter = "";
        $floor = 'st';
        $door = 'th';
        $option1 = rand(1, 999);
        $option2 = rand(0, 1);
        $option3 = rand(0, 4);

        // Street Number Letter
        if ($option1 % 2 === 0) {
            $streetNumberLetter = $characters[rand(0, (strlen($characters) / 2 - 1))]; 
        } 

        // Floor 
        if ($option2 === 1) {
            $floor = strval(rand(1, 99)) . ". sal";
        }

        // Door
        if ($option3 === 1) {
            $door = 'mf';
        } elseif ($option3 === 2) {
            $door = 'tv';
        } elseif ($option3 === 3) {
            $door = strval(rand(1, 50));
        } elseif ($option3 === 4) {
            $option31 = rand(1, 3);
            $door = $characters[rand(strlen($characters) / 2, strlen($characters) - 1)]; 

            if ($option31 % 2 === 0) {
                $door .= '-';
            } 

            for ($i = 0; $i < $option31 % 4; $i++) {
                $door .= strval(rand(1, 9));
            }
        }

        // Town and postal code
        $jsonFile = file_get_contents('data/postal-codes.json');
        $postalCodes = json_decode($jsonFile, true);

        $randomPostalCodeArray = $postalCodes[rand(0, count($postalCodes) - 1)];
        $code = $randomPostalCodeArray["postal_code"];
        $town = $randomPostalCodeArray["town_name"];

        $data = array();
        $data['streetName'] = $streetName;
        $data['streetNumber'] = $streetNumber;
        $data['streetNumberLetter'] = $streetNumberLetter;
        $data['floor'] = $floor;
        $data['door'] = $door;
        $data['town'] = $town;
        $data['code'] = $code;

        return $data;
    }

    public function get_fake_mobile_phone_number() {
        if (!file_exists('data/phone-number-digit-combinations.json')) {
            return "File phone-number-digit-combinations.json is missing. Data from this file is required to make function get_fake_mobile_phone_number() work.";
        }

        $jsonFile = file_get_contents('data/phone-number-digit-combinations.json');
        $mobilePhoneNumberDigitCombinationArray = json_decode($jsonFile, true);

        $mobilePhoneNumber = $mobilePhoneNumberDigitCombinationArray[rand(0, count($mobilePhoneNumberDigitCombinationArray) - 1)]["combination"];

        while (strlen($mobilePhoneNumber) < 8) {
            $mobilePhoneNumber .= strval(rand(1, 9));
        }

        $data = array();
        $data['mobilePhoneNumber'] = $mobilePhoneNumber;

        return $data;
    }

    public function get_fake_person() {
        $fakePerson = new FakePerson();
        $cprNumberFullnameGenderAndDateOfBirth = $fakePerson->get_fake_cpr_number_full_name_gender_and_date_of_birth();
        $address = $fakePerson->get_fake_address();
        $mobilePhoneNumber = $fakePerson->get_fake_mobile_phone_number();
        $data = array_merge($cprNumberFullnameGenderAndDateOfBirth, $address, $mobilePhoneNumber);
        return $data;
    }

    public function get_fake_persons($numberOfFakePersons) {
        if ($numberOfFakePersons < 2 || $numberOfFakePersons > 100) {
            return "Number of required persons should be between 2 and 100. If you want to get one person, use get_fake_person() method.";
        }

        $fakePerson = new FakePerson();
        $data = array();

        for ($i = 0; $i < $numberOfFakePersons; $i++) {
            array_push($data, $fakePerson->get_fake_person());
        }

        return $data;
    }
}