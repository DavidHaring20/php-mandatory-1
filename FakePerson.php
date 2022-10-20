<?php 


class FakePerson {
    public string $first_name;
    public string $last_name;
    public string $gender;
    public string $cpr_number;
    public string $date_of_birth;
    public string $address;
    public string $mobile_phone_number;

    public function get_fake_cpr_number() {
        $dd = str_pad(strval(rand(1, 31)), 2, "0", STR_PAD_LEFT);
        $mm = str_pad(strval(rand(1, 12)), 2, "0", STR_PAD_LEFT);
        $yy = str_pad(strval(rand(0, 99)), 2, "0", STR_PAD_LEFT);
        $random = str_pad(strval(rand(1, 9999)), 4, "0", STR_PAD_LEFT);

        return $dd.$mm.$yy.$random;
    }

    public function get_fake_full_name_and_gender() {}

    public function get_fake_full_name_gender_and_date_of_birth() {}

    public function get_fake_cpr_number_full_name_and_gender() {}

    public function get_fake_cpr_number_full_name_gender_and_date_of_birth() {}

    public function get_fake_address() {}

    public function get_fake_mobile_phone_number() {}

    public function get_fake_person() {}

    public function get_fake_persons() {}
}

?> 