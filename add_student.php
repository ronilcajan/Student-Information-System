<?php session_start();

    if(!$_SESSION['username']){
        header('location: login.php');
        echo $_SESSION['username'];
    }
    include('server/server.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Dashboard</title>
        <link href="css/styles.css" rel="stylesheet"/>
        <?php include('templates/header.php');?>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="dashboard.php">LOGO</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i>
            </button>
            <ul class="navbar-nav d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="server/logout.php" onclick="return confirm('Are you sure to logout?');">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <?php include("templates/sidebar.php");?>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <?php include('alert/alerts.php');?>
                        <div class="card mb-4 mt-3">
                            <div class="card-header">
                                <i class="fas fa-user-plus mr-1"></i>
                                Add New Student 
                            </div>
                            <div class="card-body">
                                <form method="POST" action="model/add_new_student.php">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="small mb-1" for="code_ins">Enter Code Inscription</label>
                                                <input class="form-control form-control-sm" id="code_ins" type="text" placeholder="Enter Code Inscription" name="code_ins" required/>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="small mb-1" for="name">Enter Name</label>
                                            <input class="form-control form-control-sm" id="name" type="text" placeholder="Enter Name" name="name" required />
                                      </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="small mb-1" for="surname">Enter Surname</label>
                                            <input class="form-control form-control-sm" id="surname" type="text" placeholder="Enter Surname" name="surname" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="small mb-1" for="cin">Enter Cin</label>
                                            <input class="form-control form-control-sm" id="cin" type="text" placeholder="Enter Cin" name="cin" required />
                                      </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="small mb-1" for="etab">Enter Etablissement</label>
                                            <input class="form-control form-control-sm" id="etab" type="text" placeholder="Enter Etablissement" name="etab" required />
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="small mb-1" for="date_exam">Enter Date Exam</label>
                                            <input class="form-control form-control-sm" id="date_exam" type="date" placeholder="Enter Date Exam" name="date_exam" required />
                                      </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="small mb-1" for="hrs_exam">Enter Heure Examen</label>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <input class="form-control form-control-sm" id="hrs_exam" type="number" placeholder="Enter Hours" name="hrs_exam1" required/>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input class="form-control form-control-sm" id="hrs_exam" type="number" placeholder="Enter Minutes" name="hrs_exam2" required/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="small mb-1" for="university">Enter University</label>
                                            <input class="form-control form-control-sm" id="university" type="text" placeholder="Enter University" name="university" required />
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="small mb-1" for="exam_type">Enter Exam Type</label>
                                            <input class="form-control form-control-sm" id="exam_type" type="text" placeholder="Enter Exam Type" name="exam_type" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label class="small mb-1" for="semester">Enter Semester</label>
                                            <input class="form-control form-control-sm" id="semester" type="number" placeholder="Enter Semester" name="semester" required />
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label class="small mb-1" for="session">Enter Session</label>
                                            <input class="form-control form-control-sm" id="session" type="number" placeholder="Enter Session" name="session" required />
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="small mb-1" for="module">Enter Module</label>
                                            <textarea class="form-control form-control-sm" id="module" type="text" placeholder="Enter Module" name="module" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="small mb-1" for="Formation">Enter Formation</label>
                                            <textarea class="form-control form-control-sm" id="formation" type="text" placeholder="Enter Formation" name="formation" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="small mb-1" for="promotion">Enter Promotion</label>
                                            <input class="form-control form-control-sm" id="promotion" type="text" placeholder="Enter Promotion" name="promotion" required />
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label class="small mb-1" for="niveau">Enter Niveau</label>
                                            <input class="form-control form-control-sm" id="niveau" type="number" placeholder="Enter niveau" name="niveau" required />
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label class="small mb-1" for="year">Enter Year</label>
                                            <input class="form-control form-control-sm" id="year" type="text" placeholder="Enter Year" name="year" required />
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label class="small mb-1" for="salle">Enter Salle</label>
                                            <input class="form-control form-control-sm" id="salle" type="number" placeholder="Enter Salle" name="salle" required />
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label class="small mb-1" for="emplacement">Enter Emplacement</label>
                                            <input class="form-control form-control-sm" id="emplacement" type="number" placeholder="Enter Emplacement" name="emplacement" required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" name="add_user">Submit</button>
                            </div> 
                        </form>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <?php include('templates/footer.php'); ?>
        <?php include('modal/modal.php'); ?>
    </body>
</html>
