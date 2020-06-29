<?php
//include_once '../../functions/functions.php';
include_once '../../../includes/functions/bd_conn.php';

if ($_POST['action'] == 'create') {
    //die(json_encode($_POST));
    (int) $name = $_POST['id_plate'];
    (int) $location = $_POST['location'];

    try { //throw $th;

        $stmt = $conn->prepare('INSERT INTO menu (id_location, id_plate) VALUES  (?, ?)');
        $stmt->bind_param('ii', $location, $name);

        $stmt->execute();
        $id_insert = $stmt->insert_id;
        $affected = $stmt->affected_rows;

        if ($affected > 0) {
            $response = array(
                'response' => 'success',
                'id_insert' => $id_insert
            );
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

if ($_POST['action'] == 'delete') {
    //die(json_encode($_POST));
    $id = $_POST['id'];

    try {

        $stmt = $conn->prepare('DELETE FROM menu WHERE id_plate = ? ');
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
