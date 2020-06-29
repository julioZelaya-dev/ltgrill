<?php
//include_once '../../functions/functions.php';
include_once '../../../includes/functions/bd_conn.php';


if (($_POST['action'] == 'create')) {
    //die(json_encode($_POST));
    $access = $_POST['access'];
    $password = $_POST['password'];
    $l_name = $_POST['last_name'];
    $location = $_POST['location'];
    $name = $_POST['name'];
    $user = $_POST['user_name'];

    $opc = array(
        'cost' => 12
    );
    $password_hashed = password_hash($password, PASSWORD_BCRYPT, $opc);
    // img
    //$dir = '../../../assets/img/users/';
    $dir = '../../assets/images/avatars/';
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
    $temp_locat = $_FILES['admin_img']['tmp_name'];
    $file_name = rand(1, 1000000) . $_FILES['admin_img']['name'];
    if (move_uploaded_file($temp_locat, $dir . $file_name)) {
        $img_url = $file_name;
        $img_result = "upload successfull";
    } else {
        /* $response = array(

            'response' => error_get_last()
        ); */
    }

    //statement

    try { //throw $th;

        $s = "SELECT * FROM admin WHERE user_name = '$user' ";
        $res = $conn->query($s);
        //verify if the username is already taken
        if ($res->num_rows > 0) {
            $response = array(
                'response' => 'taken'
            );
        } else {
            if (($_FILES['admin_img']['size'] > 0)) {
                $stmt = $conn->prepare('INSERT INTO admin (user_name, password, name, last_name, img, access, id_location) VALUES (? ,? ,? ,? ,? ,? ,? )');
                $stmt->bind_param('sssssii', $user, $password_hashed, $name, $l_name, $img_url, $access, $location);
            } else {
                $stmt = $conn->prepare('INSERT INTO admin (user_name, password, name, last_name, access, id_location) VALUES (? ,? ,? ,? ,? ,? )');
                $stmt->bind_param('ssssii', $user, $password_hashed, $name, $l_name, $access, $location);
            }
            $stmt->execute();
            $id_insert = $stmt->insert_id;
            $affected = $stmt->affected_rows;

            if ($affected > 0) {
                $response = array(
                    'response' => 'success',
                    'id_insert' => $id_insert/* ,
                    'resultado_imagen' => $img_result */
                );
            } else {
                $response = array(
                    'response' => 'error'
                );
            }

            $stmt->close();
            $conn->close();
        }
    } catch (Exception $th) {
        $response = array(
            'response' => $th->getMessage()
        );
    }


    die(json_encode($response));
}

if ($_POST['action'] == 'update') {
    //die(json_encode($_POST));
    $access = $_POST['access'];
    $password = $_POST['password'];
    $l_name = $_POST['last_name'];
    $location = $_POST['location'];
    $name = $_POST['name'];
    $user = $_POST['user_name'];
    $id = $_POST['id'];
    $img = $_POST['img'];

    $opc = array(
        'cost' => 12
    );
    $password_hashed = password_hash($password, PASSWORD_BCRYPT, $opc);
    // img

    $dir = '../../assets/images/avatars/';
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
    $temp_locat = $_FILES['admin_img']['tmp_name'];
    $file_name = rand(1, 1000000) . $_FILES['admin_img']['name'];
    if (move_uploaded_file($temp_locat, $dir . $file_name)) {
        $img_url = $file_name;
        $img_result = "upload successfull";
    } else {
        $response = array(

            'response' => error_get_last()
        );
    }

    //statement

    try { //throw $th;


        if (($_FILES['admin_img']['size'] > 0)) {
            $stmt = $conn->prepare('UPDATE admin SET user_name = ?, password = ?, name = ?, last_name = ?, img = ?, access = ?, id_location = ?, edited = NOW() WHERE id_admin = ?');
            $stmt->bind_param('sssssiii', $user, $password_hashed, $name, $l_name, $img_url, $access, $location, $id);
        } else {
            $stmt = $conn->prepare('UPDATE admin SET user_name = ?, password = ?, name = ?, last_name = ?, access = ?, id_location = ?, edited = NOW() WHERE id_admin = ?');
            $stmt->bind_param('ssssiii', $user, $password_hashed, $name, $l_name, $access, $location, $id);
        }
        $stmt->execute();

        $affected = $stmt->affected_rows;

        if ($affected > 0) {

            if ($_FILES['admin_img']['size'] > 0 && $img != '') {
                //delete old img
                $path = '../../assets/images/avatars/' . $img;
                //chown($path, 666);
                if (unlink($path)) {
                    $response = array(
                        'response' => 'success-update',
                        'id_insert' => $id,
                        'resultado_imagen' => $img_result
                    );
                } else {
                    $response = array(
                        'response' => 'error img'
                    );
                }
            } else {

                $response = array(
                    'response' => 'success-update',
                    'id_insert' => $id/* ,
                    'resultado_imagen' => $img_result */
                );
            }
        } else {
            $response = array(
                'response' => 'error'
            );
        }

        $stmt->close();
        $conn->close();
    } catch (Exception $th) {
        $response = array(
            'response' => $th->getMessage()
        );
    }


    die(json_encode($response));
}

if ($_POST['action'] === 'delete') {
    //die(json_encode($_POST));
    $id = $_POST['id'];
    $img = $_POST['img'];
    try {

        $stmt = $conn->prepare('DELETE FROM admin WHERE id_admin = ? ');
        $stmt->bind_param('i', $id);
        $stmt->execute();
        if ($stmt->affected_rows && ($_POST['img'] != null || $_POST['img'] != "")) {

            //delete old img
            $path = '../../assets/images/avatars/' . $img;
            //chown($path, 0755);
            if (unlink($path)) {
                $response = array(
                    'response' => 'success',
                    'id_deleted' => $id,
                    'img_deleted' => $img
                );
            } else {
                $response = array(
                    'response' => 'error img'
                );
            }
        } elseif ($stmt->affected_rows) {
            $response = array(
                'response' => 'success',
                'id_deleted' => $id
            );
        } else {
            $response = array(
                'response' => 'error'
            );
        }
    } catch (Exception $e) {
        $response = array(
            'response' => $e->getMessage()
        );
    }
    die(json_encode($response));
}
