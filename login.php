<?php 
    session_start();
    include('model/login.php');

    if(isset($_SESSION['username'])){
        header('location: dashboard.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include('templates/header.php'); ?>
        <title>Login</title>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form method="POST" action="">
                                            <?php if (isset($_SESSION['errors'])): ?>
                                                <div class="form-errors">
                                                    <?php foreach($_SESSION['errors'] as $error): ?>
                                                        <p><span class="text-danger"><small><?php echo $error ?></small></span></p>
                                                    <?php endforeach; ?>
                                                </div>
                                            <?php endif; ?>
                                            <div class="form-group">
                                                <label class="small mb-1" for="Username">Username</label>
                                                <input class="form-control py-4" id="Username" type="text" placeholder="Enter username" name="username" required />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                                <input class="form-control py-4" id="inputPassword" type="password" placeholder="Enter password" name="password" required />
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button class="btn btn-primary" type="submit" name="login">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <?php include('templates/footer.php'); ?>
    </body>
</html>
