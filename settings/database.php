<?php
    // Database connection
    /*
    To test connection, please go to:
    http://localhost/main-store/settings/database.php
    */
    
    // Local connection (Usando MySQLi para XAMPP)
    $local_host = "localhost";
    $local_user = "root";       // Usuario por defecto en XAMPP
    $local_password = "";       // Contraseña por defecto en XAMPP (usualmente vacía)
    $local_dbname = "mainstore";
    // Nota: XAMPP usa normalmente el puerto 3306 por defecto para MySQL

    $local_conn = mysqli_connect($local_host, $local_user, $local_password, $local_dbname);

    // Supa connection (Mantiene pg_connect porque Supabase es PostgreSQL)
    $supa_host = "aws-1-us-west-2.pooler.supabase.com";
    $supa_port = "6543";
    $supa_dbname = "postgres";
    $supa_user = "postgres.bjoqnpszpqgxxgficomw";
    $supa_password = "main-store@@";
 
    $supa_conn = pg_connect("
        host=$supa_host
        port=$supa_port
        dbname=$supa_dbname
        user=$supa_user
        password=$supa_password
    ");

    // Validaciones de conexión
    if (!$local_conn) {
        die("Error local connection: " . mysqli_connect_error());
    } else {
        echo "Success database local connection !!!";
    }

    if (!$supa_conn) {
        die("<br>Error supa connection");
    } else {
        echo "<br>Success database supa connection !!!";
    }
?>