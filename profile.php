<?php
    //Preprocess
    session_start();
    $usertmp = $_SESSION["User"];
    include 'db.php';
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $user = $_GET["user"];
    $sql = "SELECT * 
            FROM Anggota
            WHERE USERNAME = '" .$user. "'";
    $result = mysqli_query($conn,$sql);
    if(!mysqli_num_rows($result)){
        header("Location: 404.html");
    }
    else{
        $row = mysqli_fetch_array($result);
        $nim = $row["NIM"];
        $nama = $row["NAMA"];
        $gender = $row["GENDER"];
        $photo = $row["FOTO"];
        $jurusan = $row["JURUSAN"];
        $bgimg = $row["BG"];
        $bbm = $row["BBM"];
        if(empty($photo)){
            if($gender=="Pria") $photo = "profile/defaultM.jpg";
            else if($gender=="Wanita") $photo = "profile/defaultF.jpg";
        }
        else{
            $photo = "profile/".$photo;
        }
        if(empty($bgimg)){
            $bgimg = "style/img/kmb-bg.jpg";
        }
        else{
            $bgimg = "profile/".$bgimg;
        }
    }
    mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="kmb,keluarga,mahasiswa,buddhis,indonesia,mikroskil,kmb mikroskil">
    <meta name="author" content="Divisi Web KMB Mikroskil">
	<title><?php echo $nama?>'s Profile</title>
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
    <section id="profile" style="background-image:url('<?php echo $bgimg ?>')">
       	<div class="overlay">
    		<div class="container-fluid">
	    		<div class="row">
		    		<div class="col-lg-push-1 col-lg-5 col-md-6">
		    			<img src="<?php $photo ?>" class="img-circle img-center img-responsive wow tada">
		    		</div>
		    		<div class="col-lg-5 col-md-6 id-desc">
		    			<h2 class="text-center"><?php echo $nama ?></h2>
		    			<table>
		    				<tr>
		    					<td>NIM :</td>
		    					<td><?php echo $nim ?></td>
		    				</tr>
		    				<tr>
		    					<td>Jurusan :</td>
		    					<td><?php echo $jurusan ?></td>
		    				</tr>
		    				<tr>
		    					<td>Gender :</td>
		    					<td><?php echo $gender ?></td>
		    				</tr>
		    				<tr>
		    					<td>BBM PIN :</td>
		    					<td><?php echo $bbm ?></td>
		    				</tr>
		    			</table>
		    		</div>
		    	</div>
	    	</div>	
    	</div>
    </section>
    <footer class="text-center navbar-fixed-bottom">
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