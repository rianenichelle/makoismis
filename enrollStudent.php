<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body class="bg">
<?php
    include 'navbar.php';
?>
<div class="w-25 container bg-white p-5 mt-5 rounded border-top">
    <form action="enrollStudent.php" class="bg-white container" method="post">
        <h7>Choose Student:</h7><br>
        <select name="subject" class="form-control mb-3">
            <?php
            session_start();
            $servername = "sql9.freemysqlhosting.net";
            $username = "sql9379454";
            $password = "rNargfPVZy";
            $dbname = "sql9379454";
        
            $conn = new mysqli($servername, $username, $password, $dbname);
            $sql = "SELECT fname, lname, ID FROM users WHERE usertype='student' ORDER BY lname ASC";
            $result = $conn->query($sql);

            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $ID = $row['ID'];
                    echo "<option value='$ID'>".ucfirst($row['lname']).", ".ucfirst($row['fname'])."</option>";
                }
            }
            ?>
        </select>
        <input type="submit" name="submit" class="btn border-success" value="submit">
    </form>
    <?php
        if(isset($_POST['submit'])){
            $_SESSION['studID'] = $_POST['subject'];
            header("Location:pickSubj.php");
        }
    ?>
</div>
</body>
</html>