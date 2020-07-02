<?php
require_once '../functions/bd_conn.php';
$action = $_POST['action'];

if ($action == 'create') {
    //die(json_encode($_POST));
    // obtener la fecha y convertirla
    $date = $_POST['date'];
    $fecha_formateada = date('Y-m-d', strtotime($date));
    $guest = $_POST['guest'];
    $location = $_POST['location'];
    $name = $_POST['name'];
    $phone =  $_POST['phone_number'];
    $s_instructions = $_POST['special_instructions'];
    // covertir la hora de 12 a 24 
    $time = $_POST['time'];
    //$hora_formateada = date('H:i', strtotime($time));

    try {
        $stmt = $conn->prepare("INSERT INTO reservation (id_location, guests, reservation_date, reservation_time, contact_name, phone, special_instructions) 
        VALUES ( ?, ?, ?, ?, ?, ?, ? )");
        $stmt->bind_param('iisssss', $location, $guest, $time, $hora_formateada, $name, $phone, $s_instructions);
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
