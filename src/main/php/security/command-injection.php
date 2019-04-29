<?php

$cmd = $_GET['cmd'];

exec($cmd); // Noncompliant
shell_exec($cmd); // Noncompliant

assert($cmd); // Compliant; 'assert' is not a sink for Command Injection vulnerability (S2076)

shell_execshell_exec($cmd); // Compliant

// sanitizers
exec(escapeshellarg($cmd)); // Compliant

?>