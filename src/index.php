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
        // print_r($fakePerson->getFakeCprNumber()); 
        // print_r($fakePerson->getFakeFullNameAndGender());
        // print_r($fakePerson->getFakeFullNameGenderAndDateOfBirth());
        // print_r($fakePerson->getFakeCprNumberFullNameAndGender());
        // print_r($fakePerson->getFakeCprNumberFullNameGenderAndDateOfBirth());
        // print_r($fakePerson->getFakeAddress());
        // print_r($fakePerson->getFakeMobilePhoneNumber());
        // print_r($fakePerson->getFakePerson());
        print_r($fakePerson->getFakePersons(5));
?>
</body>
</html>