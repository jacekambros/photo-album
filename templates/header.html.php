<html>
<head>
    <title>Bieszczady 2017</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link href="zasoby/css/style.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<header>
    <div class="tytul">
        <h1>Bieszczady lipiec 2017</h1>
    </div>
    <div class="login">
        <?php if (isset($_SESSION['user_login_status']) && ($_SESSION['user_login_status']==1)) {
            echo "<a href=\"index.php?logout\">Logout</a>";
        } else {
            echo "<a href=\"index.php?login\">Login</a>";
        } ?>
    </div>

</header>
<main>