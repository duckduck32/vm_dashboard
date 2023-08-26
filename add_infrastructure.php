<h3>Add Vulnerability</h3>

<form action="" method="post">
    <table>
        <tr>
            <td>Plugin ID</td>
            <td><input type="number" name="plugin_id" placeholder="Plugin ID" required></td>
        </tr>
        <tr>
            <td>Vulnerability</td>
            <td><input type="text" name="vulnerability" placeholder="Vulnerability" required></td>
        </tr>
        <tr>
            <label for="severity">Severity</label>
            <select id="severity" name="severity">
            <option value="critical">Critical</option>
            <option value="high">High</option>
            <option value="medium">Medium</option>
            <option value="low">Low</option>
        </select>
        </tr>
        <tr>
            <td>Hostname</td>
            <td><input type="text" name="hostname" id="" required></td>
        </tr>
        <tr>
            <td>IP Address</td>
            <td><input type="text" name="ip" id="" required></td>
        </tr>
        <tr>
            <td>Count</td>
            <td><input type="number" name="count" id="" required></td>
        </tr>
        <tr>
            <td>Date Found</td>
            <td><input type="date" name="date_found" id="" required></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="proses" id=""></td>
        </tr>
        <tr>
            <td></td>
            <td><button><a href="infrastructure.php">Back</a></button></td>
        </tr>
    </table>
</form>

<?php
include "connection.inc.php";

if (isset($_POST['proses'])) {
    mysqli_query($connection, "insert into infra_vulns set
    status = 'Open',
    plugin_id = '$_POST[plugin_id]',
    vulnerability = '$_POST[vulnerability]',
    severity = '$_POST[severity]',
    hostname = '$_POST[hostname]',
    ip = '$_POST[ip]',
    count = '$_POST[count]',
    date_found = '$_POST[date_found]',
    date_remediated = '0000-00-00'");


    echo "Data telah berhasil ditambahkan";
    echo "<meta http-equiv=refresh content=1;URL='infrastructure.php'>";
}

?>