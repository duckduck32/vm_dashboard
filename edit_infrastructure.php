<?php
    include "connection.inc.php";
    $sql = mysqli_query($connection, "select * from infra_vulns where id='$_GET[id]'");
    $data=mysqli_fetch_array($sql);
?>

<h3>Edit Vulnerability</h3>

<form action="" method="post">
    <table>
        <tr>
            <label for="status">Status</label>
            <select id="status" name="status">
            <option value="open">Open</option>
            <option value="close">Close </option>
        </select>
        </tr>
        <tr>
            <td>Plugin ID</td>
            <td><input type="number" name="plugin_id" value="<?php echo $data['plugin_id']; ?>" ></td>
        </tr>
        <tr>
            <td>Vulnerability</td>
            <td><input type="text" name="vulnerability" value="<?php echo $data['vulnerability']; ?>"></td>
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
            <td><input type="text" name="hostname" value="<?php echo $data['hostname']; ?>"></td>
        </tr>
        <tr>
            <td>IP Address</td>
            <td><input type="text" name="ip" value="<?php echo $data['ip']; ?>"></td>
        </tr>
        <tr>
            <td>Count</td>
            <td><input type="number" name="count" id="" value="<?php echo $data['count']; ?>"></td>
        </tr>
        <tr>
            <td>Date Found</td>
            <td><input type="date" name="date_found" id="" value="<?php echo $data['date_found']; ?>"></td>
        </tr>
         <tr>
            <td>Date Remediated</td>
            <td><input type="date" name="date_remediated" id="" value="<?php echo $data['date_remediated']; ?>"></td>
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

if (isset($_POST['proses'])) {
    mysqli_query($connection, "update infra_vulns set
    status = '$_POST[status]',
    plugin_id = '$_POST[plugin_id]',
    vulnerability = '$_POST[vulnerability]',
    severity = '$_POST[severity]',
    hostname = '$_POST[hostname]',
    ip = '$_POST[ip]',
    count = '$_POST[count]',
    date_found = '$_POST[date_found]',
    date_remediated = '$_POST[date_remediated]'
    where id = '$_GET[id]'");


    echo "Data telah berhasil terupdate";
    echo "<meta http-equiv=refresh content=1;URL='infrastructure.php'>";
}
?>