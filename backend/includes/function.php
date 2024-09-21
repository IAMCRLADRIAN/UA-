<?php
// functions.php - Utility functions for database operations

// Include the database connection
include('db.php');

/**
 * Sanitize input to prevent XSS and SQL Injection
 *
 * @param string $data The data to sanitize
 * @return string The sanitized data
 */
function sanitizeInput($data) {
    global $conn; // Use the database connection from db.php
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $conn->real_escape_string($data);  // Escaping for SQL safety
}

/**
 * Fetch all patients from the database
 *
 * @return array An array of patient records
 */
function fetchAllPatients() {
    global $conn;
    $sql = "SELECT * FROM patients"; // SQL query to fetch all patients
    $result = $conn->query($sql);

    // Fetch the patients as an associative array
    $patients = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $patients[] = $row;
        }
    }
    return $patients;
}

/**
 * Add a new patient to the database
 *
 * @param string $name Patient's name
 * @param int $age Patient's age
 * @param string $condition Patient's condition
 * @return bool True if added successfully, False otherwise
 */
function addPatient($name, $age, $condition) {
    global $conn;

    // Sanitize inputs
    $name = sanitizeInput($name);
    $age = (int) sanitizeInput($age);
    $condition = sanitizeInput($condition);

    // Prepare the SQL query to insert a new patient
    $sql = "INSERT INTO patients (name, age, condition) VALUES ('$name', '$age', '$condition')";

    // Return whether the query was successful
    return $conn->query($sql);
}

/**
 * Update an existing patient in the database
 *
 * @param int $id Patient's ID
 * @param string $name Updated patient's name
 * @param int $age Updated patient's age
 * @param string $condition Updated patient's condition
 * @return bool True if updated successfully, False otherwise
 */
function updatePatient($id, $name, $age, $condition) {
    global $conn;

    // Sanitize inputs
    $id = (int) sanitizeInput($id);
    $name = sanitizeInput($name);
    $age = (int) sanitizeInput($age);
    $condition = sanitizeInput($condition);

    // Prepare the SQL query to update a patient
    $sql = "UPDATE patients SET name='$name', age='$age', condition='$condition' WHERE id='$id'";

    // Return whether the query was successful
    return $conn->query($sql);
}

/**
 * Delete a patient from the database
 *
 * @param int $id Patient's ID
 * @return bool True if deleted successfully, False otherwise
 */
function deletePatient($id) {
    global $conn;

    // Sanitize the input
    $id = (int) sanitizeInput($id);

    // Prepare the SQL query to delete a patient
    $sql = "DELETE FROM patients WHERE id='$id'";

    // Return whether the query was successful
    return $conn->query($sql);
}

/**
 * Fetch a single patient's details by their ID
 *
 * @param int $id Patient's ID
 * @return array|bool The patient data, or false if not found
 */
function fetchPatientById($id) {
    global $conn;


    $id = (int) sanitizeInput($id);


    $sql = "SELECT * FROM patients WHERE id='$id'";
    $result = $conn->query($sql);

e
    return $result->num_rows > 0 ? $result->fetch_assoc() : false;
}
?>