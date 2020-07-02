<?php
include_once '../../../includes/functions/bd_conn.php';

$action = $_POST['action'];

if ($action == 'create') {
    //die(json_encode($_POST));
    // obtener la fecha y convertirla
    $date = $_POST['date_reservation'];
    $format_date = date('Y-m-d', strtotime($date));
    $guest = $_POST['guest'];
    $location = $_POST['location'];
    $name = $_POST['name'];
    $phone =  $_POST['phone_number'];
    $s_instructions = $_POST['special_instructions'];
    // covertir la hora de 12 a 24 
    $time = $_POST['time'];
    //$hora_formateada = date(strtotime($time));

    try {
        $stmt = $conn->prepare("INSERT INTO reservation (id_location, guests, reservation_date, reservation_time, contact_name, phone, special_instructions) 
        VALUES ( ?, ?, ?, ?, ?, ?, ? )");
        $stmt->bind_param('iisssss', $location, $guest, $format_date, $time, $name, $phone, $s_instructions);
        $stmt->execute();
        $inserted = $stmt->insert_id;
        if ($stmt->affected_rows) {
            $response = array(
                'response' => 'success',
                'inserted' => $inserted
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

if ($action == 'update') {
    //die(json_encode($_POST));
    // obtener la fecha y convertirla
    $date = $_POST['date_reservation'];
    $format_date = date('Y-m-d', strtotime($date));
    $guest = $_POST['guest'];
    $location = $_POST['location'];
    $name = $_POST['name'];
    $phone =  $_POST['phone_number'];
    $s_instructions = $_POST['special_instructions'];
    // covertir la hora de 12 a 24 
    $time = $_POST['time'];
    $id = $_POST['id'];
    //$hora_formateada = date(strtotime($time));

    try {
        $stmt = $conn->prepare("UPDATE reservation SET id_location = ?, guests = ?, reservation_date = ?, reservation_time = ?, contact_name = ?, phone = ?, special_instructions = ?, edited = NOW() WHERE id = ?");
        $stmt->bind_param('iisssssi', $location, $guest, $format_date, $time, $name, $phone, $s_instructions, $id);
        $stmt->execute();

        $affected = $stmt->affected_rows;

        if ($affected > 0) {
            $response = array(
                'response' => 'success-update',
                'id_insert' => $id
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

if ($_POST['action'] == 'delete') {
    //die(json_encode($_POST));

    $id = $_POST['id'];

    try {

        $stmt = $conn->prepare('DELETE FROM reservation WHERE id = ? ');
        $stmt->bind_param('i', $id);
        $stmt->execute();
        if ($stmt->affected_rows) {
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
