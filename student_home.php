<?php include 'header.php';
if (!isset($_SESSION['user']) || $_SESSION['user']->type != "student") {logout($this_page);}
?>
    <h1>Welcome to Student and Examination Department</h1>
    <h3 style="color:#ff0000;">Announcement:</h3>
    <div class="announcement">
        No anouncement there for you now
        <br><br><br>
    </div>
<?php include 'footer.php'; ?>