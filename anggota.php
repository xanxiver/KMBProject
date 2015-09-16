<?php
    session_start();
    $usertmp = $_SESSION["User"];
    $n = strlen($usertmp);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="kmb,keluarga,mahasiswa,buddhis,indonesia,mikroskil,kmb mikroskil">
        <meta name="author" content="Divisi Web KMB Mikroskil">
    	<title>Anggota KMB Mikroskil</title>
        <link rel="icon" href="img/LogoKMB.jpg">
    	<!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="stylesheet" type="text/css" href="css/animation.css">
    	<!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>
<body>
	<nav class="nav navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand page-scroll" href="#page-top">KMB Mikroskil</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#info" class="page-scroll"><span class="fa-inline-b text-center"><i class="fa fa-info fa-inverse"></i></span>Info KMB</a></li>
                        <li><a href="#about" class="page-scroll"><span class="fa-inline-b text-center"><i class="fa fa-group fa-inverse"></i></span>Tentang Kami</a></li>
                        <li><a href="#contact" class="page-scroll"><span class="fa-inline-b text-center"><i class="fa fa-phone fa-inverse"></i></span>Hubungi Kami</a></li>           
                        <li class="dropdown">
                          <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="fa-inline-b text-center"><i class="fa fa-user fa-inverse fa-inl text-center"></i></span>Keanggotaan
                          <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            <li><a href="form.php">Form</a></li>
                            <li><a href="anggota.php">Member</a></li>
                            <li><a href="eventkmb.php">Event</a></li>
                          </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <header>
            <div id="header-bg" class="carousel slide" data-ride="carousel">
                  <!-- Indicators -->
                  <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                    <li data-target="#myCarousel" data-slide-to="3"></li>
                  </ol>
                  <!-- Wrapper for slides -->
                  <div class="carousel-inner" role="listbox">
                    <div class="overlay">
                        <div class="row item">
                            <div class="col-md-7">
                                <div class="inner">
                                    <img src="img/kmbmikroskil.png" class="img-responsive img-right logo">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="img-holder wow zoomInDown" data-wow-delay="0.4s">
                                    <img src="img/kmb-bg-5.jpg" class="img-responsive">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item active" style="background-image:url('img/kmb-bg.jpg');">
                        </div>

                        <div class="item" style="background-image:url('img/kmb-bg-2.jpg');">
                        </div>

                        <div class="item" style="background-image:url('img/kmb-bg-3.jpg');">
                        </div>
                        <div class="item" style="background-image:url('img/kmb-bg-4.jpg');">
                    </div>
                  </div>
                  <!-- Left and right controls -->
                  <a class="left carousel-control" href="#header-bg" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="right carousel-control" href="#header-bg" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
            </div>
        </header>
        <section id="mem">
        	<div class="container-fluid over-x-scroll">
                <div class="row">
                  <div class="col-lg-12">
                    <h2 class="section-heading text-center">member</h2>
                  </div>
                </div>
                    <?php 
                        include 'db.php';

                        // Create connection
                        $conn = mysqli_connect($servername, $username, $password, $dbname);
                        // Check connection
                        if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        }

                        $sql = "SELECT * FROM Anggota ORDER BY JURUSAN,NAMA";
                        $result = mysqli_query($conn, $sql);
                        $size = mysqli_num_rows($result);
                        echo "<h4 class='text-center'>Jumlah Anggota : " .$size. " orang</h4>";
                        echo "<table class='table table-striped table-bordered'>";
                            echo "<thead>";
                            echo "<tr>";
                            echo "<th>NIM</th>";
                            echo "<th>Nama</th>";
                            echo "<th>Jurusan</th>";
                            echo "<th>Gender</th>";
                            echo "<th>Pin BBM</th>";
                            echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                        if ($size > 0) {
                            // output data of each row
                            while($row = mysqli_fetch_assoc($result)) {
                                $user=$row["USERNAME"];
                                echo "<tr>";
                                echo "<td>" .$row["NIM"]. "</td>";
                                echo "<td><a href=profile.php?user=".$user.">" .$row["NAMA"]. "</a></td>";
                                echo "<td>" .$row["JURUSAN"]. "</td>";
                                echo "<td>" .$row["GENDER"]. "</td>";
                                echo "<td>" .$row["BBM"]. "</td>";
                                echo "</tr>";
                        }
                    }
                        else {
                            echo "0 results";
                        }

                        mysqli_close($conn);
                    ?>
                </tbody>
            </table>
        </div>
        </section>
        <footer class="text-center">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-xs-5">
                        <span class="copyright">Copyright &copy; KMB Mikroskil</span>
                    </div>
                    <div class="col-sm-6 col-xs-7">
                        <ul class="list-inline social-buttons">
                            <li class="yahoo" data-toggle="tooltip" data-original-title="kmb_mikroskil@yahoo.co.id"><a href="/" onclick="return false;"><i class="fa fa-yahoo">!</i></a>
                            </li>   
                            <li class="twitter"><a href="https://twitter.com/kmb_mikroskil" target="_blank"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li class="fb"><a href="http://facebook.com/kmbmikroskil2015" target="_blank"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li class="ig"><a href = "http://instagram.com/p/1FSaZ9B49v/" target="_blank"><i class="fa fa-instagram"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

        <!-- Plugin JavaScript -->
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
        <script src="js/wow.js" type="text/javascript"></script>

        <!-- Custom Javascript -->
        <script src="js/custom.js"></script>
</body>
</html>