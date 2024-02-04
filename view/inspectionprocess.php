<?php
include "../controller/dbConnection.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['inspectionId'])) {
    // Sanitize and set the session variable
    $_SESSION['inspectionId'] = filter_var($_POST['inspectionId'], FILTER_SANITIZE_STRING);

    // Fetch unit details based on the received unitId
    $inspectionDetails = fetchUnitDetails($_SESSION['inspectionId']);

    // Respond to the client with unit details (in JSON format)
    echo json_encode($inspectionDetails);

    $_SESSION['inspection_edit'] = true;
} else {
    // Handle invalid requests
    echo 'Invalid request';
}

function fetchUnitDetails($inspectionId) {
    // Use the global keyword to access the global $db2 variable
    global $db2;

    // Perform the database query or any other action to fetch details
    // Adjust the following lines based on your actual database and query
    $query = $db2->prepare("SELECT * FROM inspection WHERE id = :inspectionId");
    $query->execute(['inspectionId' => $inspectionId]);
    $inspectionDetails = $query->fetch(PDO::FETCH_ASSOC);

    return $inspectionDetails;
}
?>

