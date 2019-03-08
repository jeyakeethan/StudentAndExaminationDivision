<?php
require_once 'main/config.inc.php';
$this_page = implode("/",array_slice(explode("/",$_SERVER['REQUEST_URI']),2));
session_start();
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    $links = $user->links;
}
if (isset($_GET['logout']) && $_GET['logout'] == 'true') {
    logout();
}

function logout($return_page = "")
{
    global $home,$this_page;
    unset($_SESSION['user']);
	header("Location: ".((empty($return_page))?$home:$home."?return=".$return_page));
	exit;
}
?>

<!DOCTYPE HTML>
<html>
<head>
    <title>Student and Examination Department</title>
    <meta name="description" content="website description"/>
    <meta name="keywords" content="website keywords, website keywords"/>
    <meta http-equiv="content-type" content="text/html; charset=windows-1252"/>
    <link rel="stylesheet" type="text/css" href="style/style.css"/>
</head>

<body>

<script type="text/javascript" src="./main/scripts/jquery.js"></script>
<div id="main">
    <div id="header">
        <div id="logo">
            <div id="logo_text">
                <!-- class="logo_colour", allows you to change the colour of the text -->
                <h1><a href="index.php">STUDENT AND EXAMINATION DEPARTMENT<span class="logo_colour"></span></a></h1>
                <h2 style="text-indent:10px;"><?php if(isset($_SESSION['user']->id))echo "Have a nice day, ".strtoupper($_SESSION['user']->id); ?>...</h2>
            </div>
            <div id="accdet">
                <h4><?php
                    if (isset($_SESSION['user'])) {
                        echo 'loggedin: ' . strtoupper($_SESSION['user']->id) . ' &nbsp;<a href="?logout=true"><strong>logout</strong></a>';
                    }
                    ?></h4>
            </div>

        </div>

        <div id="menubar">
            <ul id="menu">
                <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
                <li class="selected">
                    <a href="<?php if (isset($_SESSION['user'])) echo $_SESSION['user']->type . "_home.php"; else echo $home; ?>">Home</a>
                </li>
                <li><a href="<?php echo $gallery; ?>">Gallery</a></li>
                <li><a href="<?php echo $aboutus; ?>">About</a></li>
                <li><a href="<?php echo $contactus; ?>">Contact</a></li>
            </ul>
        </div>
    </div>


    <div id="site_content">
        <div id="sidebar_container">
            <div class="sidebar">
                <div class="sidebar_top"></div>
                <div class="sidebar_item">

                    <!-- insert your sidebar items here -->

                    <div id="dashboard">
                        <?php
                        if (isset($links)) {
                            echo '<h3>' . ucfirst($user->type) . ' Dashboard' . '</h3><ul>';
                            echo '<li><a style ="font-size: 16px" href="' . $_SESSION["user"]->type . '_home.php' . '">Welcome Page</a></li>';
                            foreach ($links as $title => $link) {
                                echo '<li><a style ="font-size: 16px" href="' . $link . '">' . $title . '</a></li>';
                            }
                            echo '</ul>';
                        } else {
                            $logname = 'Login for Dashboard';
                            echo '<ul><li><a class="nav-link" href="' . $login . '"><strong>' . $logname . '</strong></a></li></ul>';
                        }

                        ?>
                    </div>

                </div>
                <div class="sidebar_base"></div>
            </div>

            <div class="sidebar">
                <div class="sidebar_top"></div>
                <div class="sidebar_item">
                    <h3>Useful Links</h3>
                    <ul>
                        <li><a href="https://mrt.ac.lk">UOM Site</a></li>
                        <li><a href="https://online.mrt.ac.lk">Moodle</a></li>
                        <li><a href="https://lms.mrt.ac.lk">LMS</a></li>
                        <li><a href="https://webmail.mrt.ac.lk">UOM Mail</a></li>
                    </ul>
                </div>
                <div class="sidebar_base"></div>
            </div>
        </div>
        <div id="content">
            <!-- insert the page content here -->

