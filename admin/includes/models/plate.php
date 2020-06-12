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
    $file_name = $_FILES['plate_img']['name'];
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
        $stmt2->close();
        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        $response = array(
            'response' => $e->getMessage()
        );
    }
    die(json_encode($response));
}
