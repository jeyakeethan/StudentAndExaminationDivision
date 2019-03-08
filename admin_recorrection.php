<?php include 'header.php';
if (!isset($_SESSION['user']) || $_SESSION['user']->type != "admin") {logout($this_page);}
?>





<?php require_once 'footer.php'; ?>