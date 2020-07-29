<?php
include_once '../includes/functions/bd_conn.php';

if (isset($_POST['login-admin'])) {
    //die(json_encode($_POST));
    $user_name = $_POST['user'];
    $password = $_POST['password'];

    try {


        $stmt = $conn->prepare("SELECT * FROM admin WHERE user_name = ?");
        $stmt->bind_param("s", $user_name);
        $stmt->execute();
        $stmt->bind_result(
            $id_admin,
            $user_name,
            $password_bd,
            $name,
            $last_name,
            $img,
            $access,
            $location,
            $edited
        );





        if ($stmt->affected_rows) {
            $existe = $stmt->fetch();
            if ($existe) {
                // user_name si existe
                if (password_verify($password, $password_bd)) {



                    session_start();
                    $_SESSION['id_admin'] = $id_admin;
                    $_SESSION['user_name'] = $user_name;
                    $_SESSION['name'] = $name;
                    $_SESSION['l_name'] = $last_name;
                    $_SESSION['img'] = $img;
                    $_SESSION['access'] = $access;
                    $_SESSION['location'] = $location;
                    $_SESSION['time_zone'] = 'America/Managua';

                    $response = array(
                        'response' => 'success'
                    );
                } else {
                    $response = array(
                        'response' => 'passwordIncorrcto'
                    );
                }
            } else {
                // user_name no existe 
                $response = array(
                    'response' => 'no_existe'
                );
            }
        };
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    $stmt->close();

    $conn->close();

    die(json_encode($response));
}
