<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
    <?php
        include("FakePerson.php");

        $fakePerson = new FakePerson();
        // print_r($fakePerson->get_fake_cpr_number()); 
        // print_r($fakePerson->get_fake_full_name_and_gender());
        // print_r($fakePerson->get_fake_full_name_gender_and_date_of_birth());
        // print_r($fakePerson->get_fake_cpr_number_full_name_and_gender());
        // print_r($fakePerson->get_fake_cpr_number_full_name_gender_and_date_of_birth());
        // print_r($fakePerson->get_fake_address());
        // print_r($fakePerson->get_fake_mobile_phone_number());
        // print_r($fakePerson->get_fake_person());
        print_r($fakePerson->get_fake_persons(100));
?>
</body>
</html>