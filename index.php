<?php
include("db.php");
$sql = "SELECT * FROM about WHERE id = '1'";
$result = $con->query($sql);
$about = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php echo $about["name"] . " | " . $about["tagline"]; ?></title> <!-- about used -->
  <link rel="icon" href="./Images/my icon.jpg" type="image/gif" sizes="16x16">

  <link href="./Styles/index.css" rel="stylesheet" type="text/css" />

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

</head>

<body>
  <div class="container" id="particles-js">
    <div class="nav_section">
      <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand text-white" href="#">
          <span><?php echo $about["title"]; ?></span> <!-- about used -->
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fa fa-bars text-white"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" style="color: #f87652 !important" href="#home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#about_me">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#skills">Skills</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#portfolio">Portfolio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#blogs">Blog</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#contact_info">Contact</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </div>
  <!-- HERO SECTION -->
  <div class="hero_section" id="home">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <h3>Hello!</h3>
          <h1>I<span style="color: #f87652">'</span>m <?php echo $about["name"]; ?></h1> <!-- about used -->
          <h2><?php echo $about["tagline"]; ?></h2> <!-- about used -->
          <p>
            <?php echo $about["first-message"]; ?>
            <!-- about used -->
          </p>
          <div class="btn_container">
            <button class="btn btn-light animate__animated">Hire Me</button>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <center>
            <img src="./Images/my image.jpg" />
          </center>
        </div>
      </div>
    </div>
  </div>

  <!-- --------------------------------------------- -->
  <!-- my About section   -->

  <div class="about_section">
    <div class="container">
      <div class="row m-0">

        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" cols="50">
          <h2 id="heading">Let's grab a <span style="color: #f87652;">coffee</span> and jump on conversation <span style="color: #f87652;">chat</span> with me<span style="color: #f87652;">.</span> </h2>
          <div>
            <h5><span style="color: #f87652;">-----------------</span></h5>
          </div>
          <!-- soical site -->
          <div class="contact_info">

            <div class="links">
              <a href="<?php echo $about["fb"]; ?>" target="_blank"><i class="fa fa-facebook-square animate__animated "></i></a>
              <a href="<?php echo $about["ig"]; ?>" target="_blank"><i class="fa fa-instagram px-1 animate__animated"></i></a>
              <a href="<?php echo $about["tw"]; ?>" target="_blank"><i class="fa fa-twitter-square animate__animated "></i></a>
              <a href="<?php echo $about["git"]; ?>" target="_blank"><i class="fa fa-github-square"></i></a>
            </div>
            <h5><span style="color: #17c92f;">What's app</span><span style="color: #f87652;">:-</span><br><?php echo $about["phone"]; ?></h5>
          </div>
        </div>
        <!-- about details -->
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12  about_me_right_section" id="about_me" cols="50">
          <H2 id="heading">About Me</H2>
          <hr>
          <p id="txt">
            <?php echo $about["tagline"]; ?>
          </p>
          <p id="txt" style="color:white !important"><?php echo $about["second-message"] ?></p>

          <br>
          <button class="btn btn-light btn-sm animate__animated "> <a href="./cv.pdf" download> Download CV </a></button>
        </div>
      </div>
    </div>
  </div>

  <!-- --------------------------------------------- -->

  <!-- skills section -->
  <div class="skills_section" id="skills">
    <div class="container">
      <h1 class="text-white" id="heading">My Skills &amp; Expirences<span style="color: #f87652;">.</span> </h1>
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 skills_section_left_section">
          <div>
            <hr id="hr">
            <p>Companies I worked with <span style="color: #f87652;">.</span></p>
            <div class="social_media_icon">
              <ul class="list_group">
                <?php
                $sql = "SELECT * FROM expirences";
                $result = $con->query($sql);
                while ($row = $result->fetch_assoc()) {
                ?>
                  <li class="list_group_item">
                    <a class="text-white"> <?php echo $row["name"]; ?></a>
                  </li>
                <?php
                }
                ?>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 skills_section_right_section">
          <div>
            <?php
            $sql = "SELECT * FROM skills";
            $result = $con->query($sql);
            while ($row = $result->fetch_assoc()) {
            ?>
              <div class="each_skills">
                <span><?php echo $row["name"]; ?></span>
                <div class="progress">
                  <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo $row["value"]; ?>%" aria-valuenow="<?php echo $row["value"]; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            <?php
            }
            ?>
          </div>

        </div>
      </div>
    </div>
  </div>

  <!-- --------------------------------------------- -->

  <!-- portfolio section -->

  <div class="portfolio_section" id="portfolio">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <h1 class="text-white text-center my_portfolio_animation"><span>My portfolio</span><span style="color: #f87652;">.</span></h1>
        </div>
      </div>
      <div class="row mt-5">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <nav class="d-flex justify-content-center">
            <!-- <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
              <a class="nav-item nav-link active text-white " id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Web Development</a>
              <a class="nav-item nav-link text-white" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Android Development</a>

            </div> -->
          </nav>
          <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
              <div class="card-columns">
                <?php
                $sql = "SELECT * FROM projects ORDER BY id DESC";
                $result = $con->query($sql);
                while ($row = $result->fetch_assoc()) {
                ?>
                  <div class="card border-0 padding-0" style="background-color:#232532;color:white;padding: 5px;">
                    <img class="card-img-top" src="./Images/web site image/<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>">
                    <h4 class="title" style="padding: 5px;"><?php echo $row['name'] ?></h4>
                    <p style="color: whitesmoke; padding:10px">
                      <?php echo $row['details'] ?>
                      <a href="<?php echo $row['link']; ?>" target="_blank" title="<?php echo $row['details'] ?>">
                        <div class="btn_container">
                          <button class="btn btn-light animate__animated" style="background-color: #F87652;color:white;border:none;margin-left:10px">See more</button>
                        </div>
                      </a>
                    </p>
                  </div>
                <?php
                }
                ?>
              </div>
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
              <div class="card-columns">
                <div class="card border-0 padding-0">
                  <img class="card-img-top" src="./Images/web site image/Screenshot 2021-09-05 215450.jpg" alt="1 images">
                </div>
                <div class="card border-0 padding-0">
                  <img class="card-img-top" src="./Images/web site image/2.jpg" alt="1 images">
                </div>
                <div class="card border-0 padding-0">
                  <img class="card-img-top" src="./Images/web site image/6.jpg" alt="1 images">
                </div>
                <div class="card border-0 padding-0">
                  <img class="card-img-top" src="./Images/web site image/5.jpg" alt="1 images">
                </div>

                <div>
                </div>

              </div>
            </div>

          </div>
        </div>
      </div>

      <!-- --------------------------------------------- -->
      <!-- blogs section -->
      <div class="blogs_section" id="blogs">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <h1 id="heading" class="text-white text-center">Blogs<span style="color: #f87652;">.</span></h1>
            </div>
          </div>
          <div class="row mt-5">
            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
              <div class="card animate__animated border-0 ">
                <div class="card-header border-0 p-0">
                  <img src="./Images/web site image/1.jpg" width="100%" alt="blog_image_1">
                </div>
                <div class="card-body">
                  <h3 class="title">Web Development </h3>
                  <p class="date">Post On <span>05.12.2020</span> By <span>SK</span></p>
                  <p class="txt">It is a Long established fact that a reader will be distracted by the readable content of a page when looking at it's layout</p>
                  <a class="text-decoration-none read_more" href="#">Read more</a>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
              <div class="card animate__animated border-0 ">
                <div class="card-header border-0 p-0">
                  <img src="./Images/web site image/2.jpg" width="100%" alt="blog_image_2">
                </div>
                <div class="card-body">
                  <h3 class="title">Android Development </h3>
                  <p class="date">Post On <span>05.12.2020</span> By <span>SK</span></p>
                  <p class="txt">It is a Long established fact that a reader will be distracted by the readable content of a page when looking at it's layout</p>
                  <a class="text-decoration-none read_more" href="#">Read more</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


      <!-- --------------------------------------------- -->
      <!-- Contact Section -->
      <div class="contact_section" id="contact_info">
        <div class="container">
          <div class="row m-0">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
              <div>
                <h3 class="heading">Contact Me. </h3>
                <hr>
                <p class="txt">Feel Free to Contact With Me.</p>
                <?php
                if (isset($_POST["send"])) {
                  $name = $_POST["name"];
                  $email = $_POST["email"];
                  $subject = $_POST["subject"];
                  $message = $_POST["message"];
                  if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                    $ip = $_SERVER['HTTP_CLIENT_IP'];
                  } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                  } else {
                    $ip = $_SERVER['REMOTE_ADDR'];
                  }

                  date_default_timezone_set('Asia/Kathmandu');
                  $date = date('y-m-d');
                  $time = date('h:i:s');
                  $sql = "INSERT INTO messages (name, email, subject, message, ip, date, time) VALUES ('$name', '$email', '$subject', '$message', '$ip', '$date', '$time')";
                  if ($con->query($sql)) {
                    echo ("<h6 style='border:green 2px solid; border-radius:10px;color:white;background-color:#90ee90;padding:10px;'>Message sent Successfully</h6>");
                  } else {
                    echo ($con->error);
                  }
                }
                ?>
                <form action="" method="POST">
                  <div class="form-group ">
                    <input class="form-control" name="name" placeholder="Your Name" type="text" required />
                  </div>
                  <div class="form-group ">
                    <input class="form-control" name="email" placeholder="Your E-mail" type="email" required />
                  </div>
                  <div class="form-group ">
                    <input class="form-control" name="subject" placeholder="Subject" type="text" required />
                  </div>
                  <div class="form-group ">
                    <textarea class="form-control" name="message" placeholder="Type your Message...." name="" id="textarea" cols="30" rows="10"></textarea>
                  </div>
                  <div class="form-group">
                    <button class="btn btn-light animate__animated" name="send" type="submit">Submit</button>
                  </div>
                </form>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
              <div>
                <ul class="list-unstyled">
                  <li>
                    <i class="fa fa-envelope-o"></i> <?php echo $about['email']; ?>
                  </li>
                  <li>
                    <i class="fa fa-phone"></i> <?php echo $about['phone']; ?>
                  </li>
                </ul>
              </div>
              <div class="map_wrapper">
                <div class="mapouter">
                  <div class="gmap_canvas"><iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d7065.712148626692!2d83.4637009!3d27.6908429!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2snp!4v1641300155270!5m2!1sen!2snp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    <style>
                      .gmap_canvas {
                        overflow: hidden;
                        background: none !important;
                        height: 327px;
                        width: 525px;
                      }
                    </style>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- footer section -->
      <div class="footer-area">
        <div class="container">
          <div class="row py-5">
            <div class="logo-area col-lg-4 col-md-4 col-sm-12 col-12">
              <a class="navbar-brand text-white" href="#">
                <?php echo $about['name']; ?><span style="color: #f87652;">.</span>
              </a>
              <p>Let's grab a coffee and jump on conversation chat with me.</p>
              <div class="links">
                <a href="<?php echo $about["fb"]; ?>" target="_blank"><i class="fa fa-facebook-square animate__animated "></i></a>
                <a href="<?php echo $about["ig"]; ?>" target="_blank"><i class="fa fa-instagram px-1 animate__animated"></i></a>
                <a href="<?php echo $about["tw"]; ?>" target="_blank"><i class="fa fa-twitter-square animate__animated "></i></a>
                <a href="<?php echo $about["git"]; ?>" target="_blank"><i class="fa fa-github-square"></i></a>
              </div>
            </div>
            <div class=" col-lg-4 col-md-4 col-sm-12 col-12 column">
              <h4 class="heading">Skills<span style="color: #f87652;">.</span></h4>
              <ul class="list-group">
                <?php
                $sql = "SELECT * FROM skills";
                $result = $con->query($sql);
                while ($row = $result->fetch_assoc()) {
                  if ($row['value'] >= 80) {
                ?>
                    <li class="list-group-item border-0 bg-transparent">
                      <i class="fa fa-chevron-right"></i> <span><?php echo $row['name']; ?></span>
                    </li>
                <?php
                  }
                }
                ?>
              </ul>
            </div>
            <div class=" col-lg-4 col-md-4 col-sm-12 col-12 column">
              <h4 class="heading">UseFull Link<span style="color: #f87652;">.</span></h4>
              <ul class="list-group">

                <?php
                $sql = "SELECT * FROM projects ORDER BY id DESC";
                $result = $con->query($sql);
                while ($row = $result->fetch_assoc()) {
                ?>
                  <li class="list-group-item border-0 bg-transparent">
                    <i class="fa fa-chevron-right"></i> <a href="<?php echo $row['link']; ?>" title="<?php echo $row['details'] ?>"><span style="color:white"><?php echo $row['name'] ?></span></a>
                  </li>
                <?php
                }
                ?>
              </ul>
            </div>
          </div>
        </div>
      </div>




      <footer class="text-white text-center">&copy;Sulabh Nepal</footer>

      <!-- ____________________________________________________________________ -->
      <!-- ----------------------------------------------------------------- -->
      <script type="text/javascript" src="./Js/particles.js"></script>
      <script type="text/javascript" src="./Js/app.js"></script>
</body>

</html>