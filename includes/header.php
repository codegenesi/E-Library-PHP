<?php if ($_SESSION['login']) {
?>
    <section class="menu-section">
        <div class="container">
            <div class="row ">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a href="#" class="menu-top-active">DASHBOARD</a></li>

                            <li><a href="view-books.php">View Books</a></li>
                            <li><a href="my-enrollments.php">Enrolled Books</a></li>
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
<?php } else { ?>
    <section class="menu-section">
        <div class="container">
            <div class="row ">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="adminlogin.php">Admin Login</a></li>
                            <li><a href="login.php">User Login</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php } ?>