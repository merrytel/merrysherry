<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $nombre = $_POST['nombre'];

    try {
        $conn = new PDO("odbc:Driver={SQL Server};Server=192.168.0.223;Database=AZURE; Uid=report;Pwd=R3p0rt1ng$;");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::SQLSRV_ATTR_DIRECT_QUERY, true);

        $insertQuery = "INSERT INTO rw.RobinsonShtl VALUES ('$telefono', '$email', '$nombre', GETDATE(), GETDATE())";
        $conn->query($insertQuery);

        $conn = null;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
