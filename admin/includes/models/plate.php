<?php

include_once '../../../includes/functions/bd_conn.php';


if ($_POST['action'] === 'create') {

    $plate_cat = $_POST['plate_categories'];
    $plate_ingredients = $_POST['plate_ingredients'];
    $plate_name = $_POST['plate_name'];
    $plate_price = $_POST['plate_price'];

    // img
    $dir = '../../../assets/img/plates/';
    /* if (is_dir($dir)) {
    } else {
        mkdir($dir, 0755, true);
    } */

    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
    $temp_locat = $_FILES['plate_img']['tmp_name'];


    $file_name = rand(1, 1000000) . $_FILES['plate_img']['name'];

    // los archivos se guardan en ubicaciones temporales 
    // para moverlos al server se usa move_uploaded_file
    if (move_uploaded_file($temp_locat, $dir . $file_name)) {
        $img_url = $file_name;
        $img_result = "upload successfull";
    } else {
        $response = array(

            'response' => error_get_last()
        );
    }

    // statement 

    try {
        $stmt = $conn->prepare('INSERT INTO plate (plate_name, price, ingredients, img) VALUES (?, ?, ?, ?)');
        $stmt->bind_param('ssss', $plate_name, $plate_price, $plate_ingredients, $img_url);
        $stmt->execute();
        $id_insert = $stmt->insert_id;

        foreach ($plate_cat as $key => $value) {
            $stmt2 = $conn->prepare('INSERT INTO cat_detail ( id_plate, id_cat ) VALUES (?, ?)');
            $stmt2->bind_param('ii', $id_insert, $value);
            $stmt2->execute();
        }

        if ($stmt->affected_rows) {
            $response = array(
                'response' => 'success',
                'id_insert' => $id_insert,
                'resultado_imagen' => $img_result
            );
        } else {
            $response = array(
                'response' => 'error'
            );
        }

        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        $response = array(
            'response' => $e->getMessage()
        );
    }
    die(json_encode($response));
}

if ($_POST['action'] === "update") {
    //die(json_encode($_POST));

    $plate_cat = $_POST['plate_categories'];
    $plate_ingredients = $_POST['plate_ingredients'];
    $plate_name = $_POST['plate_name'];
    $plate_price = $_POST['plate_price'];
    $id_plate = $_POST['id_plate'];
    $actual_img = $_POST['actual_img'];

    // img
    $dir = '../../../assets/img/plates/';
    /* if (is_dir($dir)) {
    } else {
        mkdir($dir, 0755, true);
    } */

    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
    if (isset($_FILES['plate_img'])) {
        $temp_locat = $_FILES['plate_img']['tmp_name'];
        $file_name = rand(1, 1000000) . $_FILES['plate_img']['name'];

        //$file_name = 'plate-' . $id_plate . "jpg";

        // los archivos se guardan en ubicaciones temporales 
        // para moverlos al server se usa move_uploaded_file
        if (move_uploaded_file($temp_locat, $dir . $file_name)) {
            $img_url = $file_name;
            $img_result = "upload successfull";
        } else {
            $response = array(

                'response' => error_get_last()
            );
        }
    }


    // statement 

    try {
        if ($_FILES['plate_img']['size'] > 0) {
            $stmt = $conn->prepare('UPDATE plate SET plate_name = ?, price = ?, ingredients = ?, img = ?, edited = NOW() WHERE id_plate = ?');
            $stmt->bind_param('ssssi', $plate_name, $plate_price, $plate_ingredients, $img_url, $id_plate);
        } else if ((int) $_FILES['plate_img']['size'] === 0) {
            $stmt = $conn->prepare('UPDATE plate SET plate_name = ?, price = ?, ingredients = ?, edited = NOW() WHERE id_plate = ?');
            $stmt->bind_param('sssi', $plate_name, $plate_price, $plate_ingredients, $id_plate);
        }
        $stmt->execute();




        $stmtdelete = $conn->prepare('DELETE FROM cat_detail WHERE id_plate = ?');
        $stmtdelete->bind_param('i', $id_plate);
        $stmtdelete->execute();
        $stmtdelete->close();

        foreach ($plate_cat as $key => $value) {
            $stmt2 = $conn->prepare('INSERT INTO cat_detail ( id_plate, id_cat ) VALUES (?, ?)');
            $stmt2->bind_param('ii', $id_plate, $value);
            $stmt2->execute();
        }
        $stmt2->close();
        $affected = $stmt->affected_rows;
        if ($affected > 0) {
            if ($_FILES['plate_img']['size'] > 0) {
                //delete old img
                $path = '../../../assets/img/plates/' . $actual_img;
                chown($path, 666);
                if (unlink($path)) {
                    $response = array(
                        'response' => 'success-update',
                        'id_insert' => $id_plate,
                        'resultado_imagen' => $img_result
                    );
                } else {
                    $response = array(
                        'response' => 'error img'
                    );
                }
            } else if ((int) $_FILES['plate_img']['size'] === 0) {
                $response = array(
                    'response' => 'success-update',
                    'id_insert' => $id_plate
                );
            }
        } else {
            $response = array(
                'response' => 'error'
            );
        }

        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        $response = array(
            'response' => $e->getMessage()
        );
    }
    die(json_encode($response));
}

if ($_POST['action'] == 'delete') {
    //die(json_encode($_POST));
    $id = $_POST['id'];
    $img = $_POST['img'];
    try {

        $stmt = $conn->prepare('DELETE FROM plate WHERE id_plate = ? ');
        $stmt->bind_param('i', $id);
        $stmt->execute();
        if ($stmt->affected_rows) {

            //delete old img
            $path = '../../../assets/img/plates/' . $img;
            chown($path, 666);
            if (unlink($path)) {
                $response = array(
                    'response' => 'success',
                    'id_deleted' => $id
                );
            } else {
                $response = array(
                    'response' => 'error img'
                );
            }
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
