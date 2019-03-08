<?php include 'header.php';
if (!isset($_SESSION['user']) || $_SESSION['user']->type != "student") {logout($this_page);}
?>





<?php require_once 'footer.php'; ?>