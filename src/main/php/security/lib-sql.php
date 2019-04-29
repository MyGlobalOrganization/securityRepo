<?php
function executeQueryLib($sql) {
  mysqli_query($conn, $sql);  // Noncompliant
}
?>