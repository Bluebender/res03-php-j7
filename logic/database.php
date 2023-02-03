<?php

function loadUser(string $email){
    $db = new PDO(
        "mysql:host=db.3wa.io;port=3306;dbname=vincentollivier_phpj7",
        "vincentollivier",
        "98f74e8350a6f9da22f312f5162d2994"
    );
    $query = $db->prepare('SELECT * FROM `users` WHERE email=:value');
    $parameters = ['value' => $email];
    $query->execute($parameters);
    $loadedUser = $query->fetch(PDO::FETCH_ASSOC);
    var_dump ($loadedUser);
}

function saveUser(User $user){
    $db = new PDO(
        "mysql:host=db.3wa.io;port=3306;dbname=vincentollivier_phpj7",
        "vincentollivier",
        "98f74e8350a6f9da22f312f5162d2994"
    );
    $query = $db->prepare('INSERT INTO users VALUES (null, :value1, :value2, :value3, :value4)');
    $parameters = [
    'value1' => $user->getFirst_name(),
    'value2' => $user->getLast_name(),
    'value3' => $user->getEmail(),
    'value4' => $user->getPassword()
    ];
    $query->execute($parameters);
    // $userAdded = $query->fetch(PDO::FETCH_ASSOC);
    // var_dump ($userAdded);
    
}

loadUser("ollivier@mail.com");
require "../models/User.php";
$userToSave = new User("Kiki", "Gerard", "to@mail.com", 122);
var_dump ($userToSave);
saveUser($userToSave);

?>