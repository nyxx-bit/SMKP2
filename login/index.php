<?php 

include ("../config.php");

error_reporting(0);

session_start();

// if (isset($_SESSION['username'])) {
//     header("Location: ../");
// }

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($mysqli, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        $_SESSION['role'] =$row['role'];
        header("Location: ../");
    } else {
        echo "<script>alert('Username atau password Anda salah. Silahkan coba lagi!')</script>";
    }
}

?>

<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <title>Login - SMKP RPL</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" />
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-flex">
                                <div class="flex-grow-1 bg-login-image"
                                    style="background-image: url('../img/perusahaan.jpg');"></div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <!-- <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        Something it's wrong:
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <ul>
                                            <li><?php echo $_SESSION['error']?></li>
                                        </ul>
                                    </div>

                                    <div class="alert alert-success">

                                    </div>
                                    <div class="alert alert-danger">
                                        <?php echo $_SESSION['error']?>
                                    </div> -->
                                    <div class="text-center">
                                        <h4 class="text-dark mb-4">Welcome Back!</h4>
                                    </div>
                                    <form class="user" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                                        <div class="form-group"><input type="text"
                                                class="form-control form-control-user" id="exampleInputEmail"
                                                aria-describedby="emailHelp" placeholder="Enter Username..."
                                                name="username" /></div>
                                        <div class="form-group"><input type="password"
                                                class="form-control form-control-user" id="exampleInputPassword"
                                                placeholder="Password" name="password" /></div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <div class="form-check"><input type="checkbox"
                                                        class="form-check-input custom-control-input"
                                                        id="formCheck-1" /><label
                                                        class="form-check-label custom-control-label"
                                                        for="formCheck-1">Remember Me</label></div>
                                            </div>
                                        </div><button class="btn btn-primary btn-block text-white btn-user"
                                            type="submit" name="submit">Login</button>
                                        <hr />
                                        <hr />
                                    </form>
                                    <div class="text-center"></div>
                                    <div class="text-center"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>