<?php session_start();

    if(!$_SESSION['username']){
        header('location: login.php');
        echo $_SESSION['username'];
    }
    include('server/server.php');

    if (isset($_GET['code'])){
        $code   =   $_GET['code'];
        $sql  =   "SELECT * FROM student WHERE code_inscription = '$code'";
        $result   = mysqli_query($db, $sql);
        $row  =   mysqli_fetch_array($result);
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
                                <i class="fas fa-edit mr-1"></i>
                                Edit Student Information
                            </div>
                            <div class="card-body">
                                <form method="POST" action="model/edit_student_submit.php">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="small mb-1" for="code_ins">Enter Code Inscription</label>
                                                <input class="form-control form-control-sm" id="code_ins" type="text" placeholder="Enter Code Inscription" name="code_ins" readonly value="<?php echo $row['code_inscription'];?>" />
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="small mb-1" for="name">Enter Name</label>
                                            <input class="form-control form-control-sm" id="name" type="text" placeholder="Enter Name" name="name" value="<?php echo $row['name'];?>" required />
                                      </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="small mb-1" for="surname">Enter Surname</label>
                                            <input class="form-control form-control-sm" id="surname" type="text" placeholder="Enter Surname" value="<?php echo $row['surname'];?>" name="surname" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="small mb-1" for="cin">Enter Cin</label>
                                            <input class="form-control form-control-sm" id="cin" type="text" placeholder="Enter Cin" value="<?php echo $row['cin'];?>" name="cin" required />
                                      </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="small mb-1" for="etab">Enter Etablissement</label>
                                            <input class="form-control form-control-sm" id="etab" type="text" placeholder="Enter Etablissement" value="<?php echo $row['etablissement'];?>" name="etab" required />
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="small mb-1" for="date_exam">Enter Date Exam</label>
                                            <input class="form-control form-control-sm" id="date_exam" type="date" placeholder="Enter Date Exam" value="<?php echo $row['date_exam'];?>" name="date_exam" required />
                                      </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="small mb-1" for="hrs_exam">Enter Heure Examen</label>
                                            <input class="form-control form-control-sm" id="hrs_exam" type="text" placeholder="Enter Hours" value="<?php echo $row['heure_examen'];?>" name="hrs_exam" required/>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="small mb-1" for="university">Enter University</label>
                                            <input class="form-control form-control-sm" id="university" type="text" placeholder="Enter University" value="<?php echo $row['university'];?>" name="university" required />
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="small mb-1" for="exam_type">Enter Exam Type</label>
                                            <input class="form-control form-control-sm" id="exam_type" type="text" placeholder="Enter Exam Type" value="<?php echo $row['exam_type'];?>" name="exam_type" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label class="small mb-1" for="semester">Enter Semester</label>
                                            <input class="form-control form-control-sm" id="semester" type="text" placeholder="Enter Semester" value="<?php echo $row['semester'];?>" name="semester" required />
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label class="small mb-1" for="session">Enter Session</label>
                                            <input class="form-control form-control-sm" id="session" type="text" placeholder="Enter Session" value="<?php echo $row['session'];?>" name="session" required />
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="small mb-1" for="module">Enter Module</label>
                                            <textarea class="form-control form-control-sm" id="module" type="text" placeholder="Enter Module" name="module" required><?php echo $row['module'];?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="small mb-1" for="Formation">Enter Formation</label>
                                            <textarea class="form-control form-control-sm" id="formation" type="text" placeholder="Enter Formation" name="formation" required><?php echo $row['formation'];?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="small mb-1" for="promotion">Enter Promotion</label>
                                            <input class="form-control form-control-sm" id="promotion" type="text" placeholder="Enter Promotion" value="<?php echo $row['promotion'];?>" name="promotion" required />
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label class="small mb-1" for="niveau">Enter Niveau</label>
                                            <input class="form-control form-control-sm" id="niveau" type="number" placeholder="Enter niveau" value="<?php echo $row['niveau'];?>" name="niveau" required />
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label class="small mb-1" for="year">Enter Year</label>
                                            <input class="form-control form-control-sm" id="year" type="text" placeholder="Enter Year" value="<?php echo $row['year'];?>" name="year" required />
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label class="small mb-1" for="salle">Enter Salle</label>
                                            <input class="form-control form-control-sm" id="salle" type="number" placeholder="Enter Salle" value="<?php echo $row['salle'];?>" name="salle" required />
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label class="small mb-1" for="emplacement">Enter Emplacement</label>
                                            <input class="form-control form-control-sm" id="emplacement" type="number" placeholder="Enter Emplacement" value="<?php echo $row['emplacement'];?>" name="emplacement" required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <input type="hidden" name="old_code" value="<?php echo $row['code_inscription'];?>">
                                <button type="submit" class="btn btn-success" name="edit_submit">Edit</button>
                            </div> 
                        </form>
                        </div>
                    </div>
                </main>
            </div>
        <?php } ?>
        </div>
        <?php include('templates/footer.php'); ?>
        <?php include('modal/modal.php'); ?>
    </body>
</html>
