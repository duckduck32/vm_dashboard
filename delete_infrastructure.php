<?php
include "connection.inc.php";

$id = $_GET['id'];

mysqli_query ($connection, "delete from infra_vulns where id='$id'");

header("location:infrastructure.php");




?>