<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {

    if (isset($_POST['add'])) {
        if (isset($_FILES['book']['name'])) {
            $destination_path = getcwd() . DIRECTORY_SEPARATOR . "books/";
            $target_path = $destination_path . basename($_FILES["book"]["name"]);

            // get the file extension
            $extension = pathinfo($_FILES['book']['name'], PATHINFO_EXTENSION);

            // the physical file on a temporary uploads directory on the server
            $file = $_FILES['book']['tmp_name'];
            $size = $_FILES['book']['size'];

            if (!in_array($extension, ['pdf', 'docx'])) {
                echo "You file extension must be a .pdf or .docx";
            } elseif ($_FILES['book']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
                echo "File too large!";
            } else {
                ini_set('display_errors', 1);
                error_reporting(E_ALL);
                ini_set('display_errors', 1);
                error_reporting(E_ALL);
                // move the uploaded (temporary) file to the specified destination
                if (@move_uploaded_file($_FILES['book']['tmp_name'], $target_path)) {
                    $bookname = $_POST['bookname'];
                    $author = $_POST['author'];
                    $type = $_POST['type'];
                    $book = $_FILES["book"]["name"];

                    $sql = "INSERT INTO `books`(`author`, `name`, `price`, `book`) VALUES(:bookname, :author, :type, :book)";
                    $query = $dbh->prepare($sql);
                    $query->bindParam(':bookname', $bookname, PDO::PARAM_STR);
                    $query->bindParam(':author', $author, PDO::PARAM_STR);
                    $query->bindParam(':type', $type, PDO::PARAM_STR);
                    $query->bindParam(':book', $book, PDO::PARAM_STR);
                    $query->execute();
                    $lastInsertId = $dbh->lastInsertId();
                    if ($lastInsertId) {
                        $_SESSION['msg'] = "Book Added successfully";
                        header('location:manage-books.php');
                    } else {
                        $_SESSION['error'] = "Error 500: Something went wrong. Please try again";
                        header('location:manage-books.php');
                    }
                } else {
                    echo "Failed to upload file. Error: " . $_FILES["book"]["error"];
                }
            }
        } else {
            echo "Empty file";
        }
    }
?>
    <!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>E-Books System | Add Book</title>
        <!-- BOOTSTRAP CORE STYLE  -->
        <link href="assets/css/bootstrap.css" rel="stylesheet" />
        <!-- FONT AWESOME STYLE  -->
        <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLE  -->
        <link href="assets/css/style.css" rel="stylesheet" />
        <!-- GOOGLE FONT -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

    </head>

    <body>
        <!------MENU SECTION START-->
        <?php include('includes/header.php'); ?>
        <!-- MENU SECTION END-->
        <div class="content-wra">
            <div class=" content-wrapper">
                <div class="container">
                    <div class="row pad-botm">
                        <div class="col-md-12">
                            <h4 class="header-line">Add Book</h4>

                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <div class=" panel panel-info">
                                <div class="panel-heading">
                                    Book Info
                                    <p class="help-block">All field are required</p>
                                </div>
                                <div class="panel-body">
                                    <form enctype="multipart/form-data" role="form" method="POST" action="">
                                        <div class="form-group">
                                            <label>Book Name<span style="color:red;">*</span></label>
                                            <input class="form-control" type="text" name="bookname" autocomplete="off" />
                                        </div>

                                        <div class="form-group">
                                            <label>Author<span style="color:red;">*</span></label>
                                            <input class="form-control" type="text" name="author" autocomplete="off" />
                                        </div>

                                        <div class="form-group">
                                            <label>Book Type<span style="color:red;">*</span></label>
                                            <input class="form-control" type="text" name="type" autocomplete="off" placeholder="Eg. Journal, Magazine, Study book" />
                                        </div>

                                        <div class="form-group">
                                            <label>Book upload<span style="color:red;">*</span></label>
                                            <input class="form-control" type="file" id="book" name="book" />
                                        </div>

                                        <button type="submit" name="add" class="btn btn-info">Add </button>

                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
            <!-- CONTENT-WRAPPER SECTION END-->
            <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
            <!-- CORE JQUERY  -->
            <script src="assets/js/jquery-1.10.2.js"></script>
            <!-- BOOTSTRAP SCRIPTS  -->
            <script src="assets/js/bootstrap.js"></script>
            <!-- CUSTOM SCRIPTS  -->
            <script src="assets/js/custom.js"></script>
    </body>

    </html>
<?php } ?>