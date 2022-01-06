<?php
session_start();
if (!isset($_SESSION["access"])) {
    header("location: login.php");
    die("Login first!!!");
}
if (isset($_FILES['profile'])) {
    move_uploaded_file(realpath($_FILES['profile']['tmp_name']), '../images/my image.jpg');
}
if (isset($_FILES['icon'])) {
    move_uploaded_file(realpath($_FILES['icon']['tmp_name']), '../images/my icon.jpg');
}
include("../db.php");
$sql = "SELECT * FROM about WHERE id = '1'";
$result = $con->query($sql);
$about = $result->fetch_assoc();
if (isset($_POST["about"])) {
    // $name = $_POST["name"];
    $title = $_POST["title"];
    $tagline = $_POST["tagline"];
    $first_message = $_POST["first-message"];
    $second_message = $_POST["second-message"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $fb = $_POST["fb"];
    $tw = $_POST["tw"];
    $git = $_POST["git"];
    $ig = $_POST["ig"];
    $sql = "UPDATE about SET title='$title', tagline='$tagline', first_message='$first_message', second_message='$second_message', email='$email', phone='$phone', fb='$fb', tw='$tw', ig='$ig', git='$git'  where id=1";
    $result1 = $con->query($sql);
    if ($result1 == false) {
        die("$con->error");
    }
}

if (isset($_POST["skills"])) {
    $name = $_POST["name"];
    $value = $_POST["value"];
    $id = $_POST["id"];
    $sql = "UPDATE skills SET name='$name', value='$value' where id=$id";
    $result1 = $con->query($sql);
    if ($result1 == false) {
        die("$con->error");
    }
}
if (isset($_POST["addSkill"])) {
    $name = $_POST["name"];
    $value = $_POST["value"];
    $sql = "INSERT INTO skills (name, value) VALUES ('$name', '$value')";
    $result1 = $con->query($sql);
    if ($result1 == false) {
        die("$con->error");
    }
}
if (isset($_POST["expirences"])) {
    $name = $_POST["name"];
    $value = $_POST["position"];
    $id = $_POST["id"];
    $sql = "UPDATE expirences SET name='$name', position='$value' where id=$id";
    $result1 = $con->query($sql);
    if ($result1 == false) {
        die("$con->error");
    }
}
if (isset($_POST["addExp"])) {
    $name = $_POST["name"];
    $value = $_POST["position"];
    $sql = "INSERT INTO expirences (name, position) VALUES ('$name', '$value')";
    $result1 = $con->query($sql);
    if ($result1 == false) {
        die("$con->error");
    }
}
if (isset($_POST["projects"])) {
    $name = $_POST["name"];
    $link = $_POST["link"];
    $details = $_POST["details"];
    // $image = $_FILES["image"]['name'];
    // move_uploaded_file(realpath($_FILES['image']['tmp_name']), '../images/projects/' . $image);
    $id = $_POST["id"];
    $sql = "UPDATE projects SET name='$name', link='$link', details='$details' where id=$id";
    $result1 = $con->query($sql);
    if ($result1 == false) {
        die("$con->error");
    }
}
if (isset($_POST["AddProject"])) {
    $name = $_POST["name"];
    $link = $_POST["link"];
    $details = $_POST["details"];
    $image = time() . $_FILES["image"]['name'];
    // die($image);
    move_uploaded_file(realpath($_FILES['image']['tmp_name']), '../images/projects/' . $image);
    $sql = "INSERT INTO projects (name, link, details, image) VALUES ('$name', '$link', '$details', '$image')";
    $result1 = $con->query($sql);
    if ($result1 == false) {
        die("$con->error");
    }
}
if (isset($_POST["testimonial"])) {
    $name = $_POST["name"];
    $link = $_POST["link"];
    $details = $_POST["details"];
    // $image = $_FILES["image"]['name'];
    // move_uploaded_file(realpath($_FILES['image']['tmp_name']), '../images/projects/' . $image);
    $id = $_POST["id"];
    $sql = "UPDATE testimonials SET name='$name', position='$link', message='$details' where id=$id";
    $result1 = $con->query($sql);
    if ($result1 == false) {
        die("$con->error");
    }
}
if (isset($_POST["AddTestimonial"])) {
    $name = $_POST["name"];
    $link = $_POST["link"];
    $details = $_POST["details"];
    $image = time() . $_FILES["image"]['name'];
    // die($image);
    move_uploaded_file(realpath($_FILES['image']['tmp_name']), '../images/testimonials/' . $image);
    $sql = "INSERT INTO testimonials (name, position, message, image) VALUES ('$name', '$link', '$details', '$image')";
    $result1 = $con->query($sql);
    if ($result1 == false) {
        die("$con->error");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Details</title>
    <style>
        label {
            font-weight: bold;
            color: whitesmoke;
        }

        .m {
            color: whitesmoke;
            font-size: 12px;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row" style="background-color: #333647;">
            <div class="col-sm-3" style="border-right: #333fff solid 2px">
                <center>
                    <h3 style="color: white;">Profile Image</h3>
                    <img src="../images/my image.jpg" style="width: 50%; padding:5px; background-color:white" alt=""><br>
                    <button class="btn btn-primary" onclick="document.getElementById('profile').click()">Change image</button>
                    <form action="" method="post" enctype="multipart/form-data" id="profile-image">
                        <input type="file" style="display: none;" name="profile" id="profile" onchange="document.getElementById('profile-image').submit()">
                    </form>
                    <hr>
                    <hr>
                    <h3 style="color: white;">Site Icon</h3>
                    <img src="../images/my icon.jpg" style="width: 50%; padding:5px; background-color:white" alt=""><br>
                    <button class="btn btn-primary" onclick="document.getElementById('icon').click()">Change image</button>
                    <form action="" method="post" enctype="multipart/form-data" id="icon-image">
                        <input type="file" style="display: none;" name="icon" id="icon" onchange="document.getElementById('icon-image').submit()">
                    </form>
                    <hr>
                    <hr>
                    <h3 style="color: white;">Manage skills</h3>
                </center>
                <form class="form-inline" method="POST" action="">
                    <div class="form-group mb-2">
                        <label for="staticEmail2">Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group mx-sm-3 mb-1">
                        <label for="inputPassword2">Confidence</label>
                        <input type="number" class="form-control" name="value" id="inputPassword2" placeholder="Confidence">
                    </div>
                    <button type="submit" name="addSkill" class="btn btn-primary mb-2">Add skill</button>
                </form>

                <table>
                    <tr style="color:whitesmoke">
                        <th>Topic</th>
                        <th>value in %</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    $sql = "SELECT * FROM skills";
                    $result = $con->query($sql);
                    $i = 0;
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $id = $row["id"];
                            $topic = $row["name"];
                            $value = $row["value"];
                            $i++;
                            echo "<tr><form method='post' action=''>
                                <td>
                                <input type='text' name='name' value='$topic' style='width:100%'>
                                <input type='text' name='id' value='$id' style='display:none'>
                                </td>
                                <td><input type='number' name='value' value='$value' style='width:100%'></td>
                                <td><button type='submit' style='padding:3px' name='skills' class='btn btn-primary'><i class='fas fa-save'></i>
                                </button><button onclick='dele($id)' class='btn btn-secondary' type='button' style='padding:3px;margin-left:5px'><i class='fas fa-minus-circle'></i>
                                </button>'</td>
                        </form></tr>";
                        }
                    }
                    ?>
                </table>
                <style>
                    table,
                    th,
                    td {
                        border: 1px whitesmoke solid;
                    }

                    th,
                    td {
                        width: 20%;
                        text-align: center;
                    }

                    #addnew {
                        display: none;
                    }
                </style>
                <script>
                    function dele(filename) {
                        var r = confirm("Are you sure you want to delete this Skill from site?")
                        if (r == true) {
                            var xhttp = new XMLHttpRequest();
                            xhttp.open("GET", "deleskill.php?q=" + filename, true);
                            xhttp.send();
                            xhttp.onreadystatechange = function() {
                                if (this.readyState == 4 && this.status == 200) {
                                    alert(this.responseText);
                                    window.location.reload();
                                }
                            };
                        }
                    }
                </script>
            </div>
            <div class="col-sm-5">
                <form action="" method="post">
                    <label for="Name">Name: </label>
                    <input type="text" name="name" value="<?php echo $about['name']; ?>" class="form-control" disabled> <br>
                    <label for="Title">Title: </label>
                    <input type="text" name="title" value="<?php echo $about['title']; ?>" class="form-control"> <br>
                    <label for="Tagline">Tagline: </label>
                    <input type="text" name="tagline" value="<?php echo $about['tagline']; ?>" class="form-control"> <br>
                    <label for="first-message">first-message: </label>
                    <textarea type="text" name="first-message" style="height:100px" class="form-control"><?php echo $about['first_message']; ?> </textarea><br>
                    <label for="second-message">second-message: </label>
                    <textarea type="text" name="second-message" style="height:300px" class="form-control"><?php echo $about['second_message']; ?></textarea> <br>
                    <div class="row">
                        <div class="col-sm">
                            <label for="email">email: </label>
                            <input type="email" name="email" value="<?php echo $about['email']; ?>" class="form-control"> <br>
                            <label for="fb">Facebook link: </label>
                            <input type="text" name="fb" value="<?php echo $about['fb']; ?>" class="form-control"> <br>
                            <label for="ig">Instagram link: </label>
                            <input type="text" name="ig" value="<?php echo $about['ig']; ?>" class="form-control"> <br>
                        </div>
                        <div class="col-sm">
                            <label for="phone">phone: </label>
                            <input type="text" name="phone" value="<?php echo $about['phone']; ?>" class="form-control"> <br>
                            <label for="tw">Twitter link: </label>
                            <input type="text" name="tw" value="<?php echo $about['tw']; ?>" class="form-control"> <br>
                            <label for="git">Github link: </label>
                            <input type="text" name="git" value="<?php echo $about['git']; ?>" class="form-control"> <br>
                        </div>
                    </div>
                    <button class="btn btn-primary" name="about">Save</button>
                </form>
            </div>
            <div class="col-sm-4">
                <h3 style="color: white;">Messages
                    <hr>
                    <hr>
                </h3>
                <?php
                if (isset($_REQUEST["a"])) {
                    $a = $_REQUEST["a"];
                } else {
                    $a = 0;
                }
                $b = number_format($a);
                $off = $b * 5;
                $sql = "SELECT * FROM messages ORDER BY id DESC LIMIT 5 OFFSET $off";
                $result = $con->query($sql);
                while ($row = $result->fetch_assoc()) {
                    $name = $row["name"];
                    $email = $row["email"];
                    $subject = $row["subject"];
                    $message = $row["message"];
                    $ip = $row["ip"];
                    $time = $row["time"];
                    $date = $row["date"];
                    echo "<div class='m' title = 'ip: $ip'>
                        <b>Message From: </b>$name<br>
                        <b>Email: </b>$email</br>
                        <b>Date/time: </b>$date $time</br>
                        <b>Subject: </b>$subject<br>
                        <b>Message: </b>$message<br>
                        <hr>
                        </div>";
                }
                $result = $con->query("SELECT * FROM messages");
                $num = $result->num_rows;
                $req = $num / 5;
                $c = $b - 1;
                $b++;
                if ($c >= 0) {
                    echo "<a href='?a=$c'><button style='float:left'>Prev</button></a>";
                }
                if ($b < $req) {
                    echo "<a href='?a=$b'><button style='float:right'>Next</button></a>";
                }

                ?>

                <h3 style="color: white;">
                    <hr>Expirences
                </h3>
                <form class="form-inline" method="POST" action="">
                    <div class="form-group mb-2">
                        <label for="staticEmail2">Company Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group mx-sm-3 mb-1">
                        <label for="inputPassword2">Position</label>
                        <input type="text" class="form-control" name="position" id="inputPassword2" placeholder="">
                    </div>
                    <button type="submit" name="addExp" class="btn btn-primary mb-2">Add Expirence</button>
                </form>
                <table>
                    <tr style="color:whitesmoke">
                        <th>Company Name</th>
                        <th>Position</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    $sql = "SELECT * FROM expirences";
                    $result = $con->query($sql);
                    $i = 0;
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $id = $row["id"];
                            $topic = $row["name"];
                            $position = $row["position"];
                            $i++;
                            echo "<tr><form method='post' action=''>
                                <td>
                                <input type='text' name='name' value='$topic' style='width:100%'>
                                <input type='text' name='id' value='$id' style='display:none'>
                                </td>
                                <td><input type='text' name='position' value='$position' style='width:100%'></td>
                                <td><button type='submit' style='padding:3px' name='expirences' class='btn btn-primary'><i class='fas fa-save'></i>
                                </button><button onclick='deleExp($id)' class='btn btn-secondary' type='button' style='padding:3px;margin-left:5px'><i class='fas fa-minus-circle'></i>
                                </button>'</td>
                        </form></tr>";
                        }
                    }
                    ?>
                </table>
                <script>
                    function deleExp(filename) {
                        var r = confirm("Are you sure you want to delete this Expirence Record from site?")
                        if (r == true) {
                            var xhttp = new XMLHttpRequest();
                            xhttp.open("GET", "deleExp.php?q=" + filename, true);
                            xhttp.send();
                            xhttp.onreadystatechange = function() {
                                if (this.readyState == 4 && this.status == 200) {
                                    alert(this.responseText);
                                    window.location.reload();
                                }
                            };
                        }
                    }
                </script>
            </div>
        </div>
        <div class="row" style="background-color: #344648;">
            <div class="col-sm-6">
                <h3 style="color: whitesmoke;">Projects</h3>
                <form action="" method="POST" enctype="multipart/form-data">
                    <label for="Name">Name: </label>
                    <input type="text" name="name" class="form-control" required> <br>
                    <label for="Link">Link: </label>
                    <input type="text" name="link" class="form-control" required> <br>
                    <label for="Details">Details: </label>
                    <textarea type="text" name="details" style="height:100px" required class="form-control"></textarea><br>
                    <label for="Image">Image: </label>
                    <input type="file" name="image" style="color: whitesmoke;" required><br>
                    <button class="btn btn-primary" name="AddProject">Add Project</button>
                </form>
                <table>
                    <tr style="color:whitesmoke">
                        <th>Name</th>
                        <th>Link</th>
                        <th>Details</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    $sql = "SELECT * FROM projects";
                    $result = $con->query($sql);
                    $i = 0;
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $id = $row["id"];
                            $topic = $row["name"];
                            $link = $row["link"];
                            $image = $row["image"];
                            $details = $row["details"];
                            $i++;
                            echo "<tr><form method='post' action=''>
                                <td>
                                <input type='text' name='name' value='$topic' style='width:100%'>
                                <input type='text' name='id' value='$id' style='display:none'>
                                </td>
                                <td><input type='text' name='link' value='$link' style='width:100%'></td>
                                <td><textarea type='text' name='details' style='width:100%;height:100px'>$details</textarea></td>
                                <td><img src='../images/projects/$image' style='width:100%'></td>
                                <td><button type='submit' style='padding:3px' name='projects' class='btn btn-primary'><i class='fas fa-save'></i>
                                </button><button onclick='deleProject($id)' class='btn btn-secondary' type='button' style='padding:3px;margin-left:5px'><i class='fas fa-minus-circle'></i>
                                </button>'</td>
                        </form></tr>";
                        }
                    }
                    ?>
                </table>
                <script>
                    function deleProject(filename) {
                        var r = confirm("Are you sure you want to delete this Project Record from site?")
                        if (r == true) {
                            var xhttp = new XMLHttpRequest();
                            xhttp.open("GET", "deleProject.php?q=" + filename, true);
                            xhttp.send();
                            xhttp.onreadystatechange = function() {
                                if (this.readyState == 4 && this.status == 200) {
                                    alert(this.responseText);
                                    window.location.reload();
                                }
                            };
                        }
                    }
                </script>
            </div>
            <div class="col-sm-6">
                <h3 style="color: whitesmoke;">Testimonials</h3>
                <form action="" method="POST" enctype="multipart/form-data">
                    <label for="Name">Name: </label>
                    <input type="text" name="name" class="form-control" required> <br>
                    <label for="Link">Position: </label>
                    <input type="text" name="link" class="form-control" required> <br>
                    <label for="Details">Message: </label>
                    <textarea type="text" name="details" style="height:100px" required class="form-control"></textarea><br>
                    <label for="Image">Image: </label>
                    <input type="file" name="image" style="color: whitesmoke;" required><br>
                    <button class="btn btn-primary" name="AddTestimonial">Add Testimonial</button>
                </form>
                <table>
                    <tr style="color:whitesmoke">
                        <th>Name</th>
                        <th>Position</th>
                        <th>Message</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    $sql = "SELECT * FROM testimonials";
                    $result = $con->query($sql);
                    $i = 0;
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $id = $row["id"];
                            $topic = $row["name"];
                            $link = $row["position"];
                            $image = $row["image"];
                            $details = $row["message"];
                            echo "<tr><form method='post' action=''>
                                <td>
                                <input type='text' name='name' value='$topic' style='width:100%'>
                                <input type='text' name='id' value='$id' style='display:none'>
                                </td>
                                <td><input type='text' name='link' value='$link' style='width:100%'></td>
                                <td><textarea type='text' name='details' style='width:100%;height:100px'>$details</textarea></td>
                                <td><img src='../images/testimonials/$image' style='width:100%'></td>
                                <td><button type='submit' style='padding:3px' name='testimonial' class='btn btn-primary'><i class='fas fa-save'></i>
                                </button><button onclick='deleTestimonial($id)' class='btn btn-secondary' type='button' style='padding:3px;margin-left:5px'><i class='fas fa-minus-circle'></i>
                                </button>'</td>
                        </form></tr>";
                        }
                    }
                    ?>
                </table>
                <script>
                    function deleTestimonial(filename) {
                        var r = confirm("Are you sure you want to delete this Project Record from site?")
                        if (r == true) {
                            var xhttp = new XMLHttpRequest();
                            xhttp.open("GET", "deleTestimonial.php?q=" + filename, true);
                            xhttp.send();
                            xhttp.onreadystatechange = function() {
                                if (this.readyState == 4 && this.status == 200) {
                                    alert(this.responseText);
                                    window.location.reload();
                                }
                            };
                        }
                    }
                </script>
            </div>
        </div>
    </div>
</body>

</html>