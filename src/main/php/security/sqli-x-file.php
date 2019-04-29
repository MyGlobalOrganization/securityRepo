<?php

include_once ('lib-sql.php');

function crossfile() {
  $sql = 'select * from t1';

  mysqli_query($conn, $sql); // Compliant
  mysqli_query($conn, $sql . getId()); // Noncompliant

  executeQueryLib(getId());
}

?>