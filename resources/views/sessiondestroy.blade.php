<?php
session_start();
?>
<!DOCTYPE html>
<html>

<body>

    <?php
// remove all session variables
session_unset();

// destroy the session
session_destroy();

echo "session is destroyed";

?>

    <a href="/sessionset">Back to SessionSet page</a>
    <a href="/sessionget">Back to SessionGet page</a>
</body>

</html>
