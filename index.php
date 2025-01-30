<?php
    require 'model/ContactDAO.php';
    error_reporting(E_ERROR | E_PARSE);
    if(isset($_GET['submit'])){
        $submit = $_GET['submit'];

        if($submit=="ADD"){
            header("Location: addContact.php");
            exit;
        }

    }


    $contactDAO = new ContactDAO();
    $contacts=$contactDAO->getContacts();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comment Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"></head>
<body>

    <!-- Image and text -->
    <nav class="navbar navbar-light bg-light" style="margin-bottom: 20px">
    <a class="navbar-brand" href="">
        <img src="images/lion.png" width="12%" height="12%" class="d-inline-block align-middle" alt="">
        Leave a comment!
    </a>
    </nav>
    <div class="container">
        <div class="col">
            <form action="index.php" method="GET">
            <button class="btn btn-primary" type="submit" name="submit" value="ADD">Add Comment</button>
            <table class="table table-bordered table-striped">
                <thead><tr><th>First Name</th><th>Last Name</th><th>Comment</th></tr></thead>
                <tbody>
                    <?php
                    if($contacts==null){
                        echo 'Add a comment!';
                    }else{
                        for($index=0;$index<count($contacts);$index++){
                            echo "<tr><td>".$contacts[$index]->getContactID()."</td>";
                            echo "<td>".$contacts[$index]->getUsername()."</td>";
                            echo "<td>".$contacts[$index]->getEmail()."</td></tr>";
                        }
                    }

                    ?>
                </tbody>        
            </table>  
            </form>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
