<?php



$conn = new mysqli('localhost', 'id13776641_root', '<C7w&dh~A{?*BVl~', 'id13776641_ltgrill');

if ($conn->connect_error) {

    echo $error->$conn->connect_error;

}

if (!mysqli_set_charset($conn, 'utf8')) {

    printf('Error cargando los caracteres', mysqli_error($conn));

    exit();

}





//pass <C7w&dh~A{?*BVl~

//user id13776641_root

// id13776641_ltgrill

