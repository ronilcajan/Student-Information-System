<?php session_start();
    if(!$_SESSION['username']){
        header('location: login.php');
        echo $_SESSION['username'];
    }
    include('model/view_student.php');
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
                        <div class="mt-2 mb-2">
                            <div class="row">
                                <div class="col-md-4">
                                    <a class="btn btn-primary btn-sm" href="add_student.php"><i class="fas fa-plus mr-1"></i>Add New</a>
                                </div>
                                <div class="w-100 col-md-8" align="right">
                                    <form action="model/import_excel.php" method="post"
                                    name="frmExcelImport" enctype="multipart/form-data">
                                        <label>Choose Excel
                                            File</label> <input type="file" name="file"
                                            id="file" accept=".xls,.xlsx,.csv">
                                        <button type="submit" name="import"
                                            class="btn btn-success btn-sm"><i class="fas fa-file-excel mr-1"></i>Import Excel</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Student Table
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                                        <thead class="small">
                                            <tr>
                                                <th>Action</th>
                                                <th>Code Incription</th>
                                                <th>Name</th>
                                                <th>Surname</th>
                                                <th>Cin</th>
                                                <th>Etablissement</th>
                                                <th>Date Exam</th>
                                                <th>Heure Examen</th>
                                                <th>University</th>
                                                <th>Exam Type</th>
                                                <th>Semester</th>
                                                <th>Session</th>
                                                <th>Module</th>
                                                <th>Formation</th>
                                                <th>Promotion</th>
                                                <th>Niveau</th>
                                                <th>Year</th>
                                                <th>Salle</th>
                                                <th>Emplacement</th>
                                            </tr>
                                        </thead>
                                        <tbody class="small table-hover">
                                        <?php if(!empty($result)){ $i = 0;?>
                                            <?php while($row = mysqli_fetch_assoc($result)){?>
                                                <tr>
                                                    <td>
                                                        <a class="nav-link" href="edit_student.php?code=<?php echo $row['code_inscription'];?>" title="Edit student"><i class="fas fa-edit mr-2 text-success p-0"></i></a>
                                                        <a class="nav-link" href="model/delete_student.php?code=<?php echo $row['code_inscription'];?>" onclick="return confirm('Delete this student?');" title="Remove student"><i class="fas fa-trash mr-2 text-danger p-0"></i></a>
                                                    </td>
                                                    <td><?php echo $row['code_inscription'];?></td>
                                                    <td><?php echo $row['name'];?></td>
                                                    <td><?php echo $row['surname'];?></td>
                                                    <td><?php echo $row['cin'];?></td>
                                                    <td><?php echo $row['etablissement'];?></td>
                                                    <td><?php echo $row['date_exam'];?></td>
                                                    <td><?php echo $row['heure_examen'];?></td>
                                                    <td><?php echo $row['university'];?></td>
                                                    <td><?php echo $row['exam_type'];?></td>
                                                    <td><?php echo $row['semester'];?></td>
                                                    <td><?php echo $row['session'];?></td>
                                                    <td><?php echo $row['module'];?></td>
                                                    <td><?php echo $row['formation'];?></td>
                                                    <td><?php echo $row['promotion'];?></td>
                                                    <td><?php echo $row['niveau'];?></td>
                                                    <td><?php echo $row['year'];?></td>
                                                    <td><?php echo $row['salle'];?></td>
                                                    <td><?php echo $row['emplacement'];?></td>
                                                </tr>
                                            <?php $i++;} ?>
                                        <?php }else{ ?>
                                            <tr class="text-center">
                                                <td colspan="18"><small><span class="text-primary">No data to show</span></small></td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <?php include('templates/footer.php'); ?>
        <?php include('modal/modal.php'); ?>
    </body>
</html>
