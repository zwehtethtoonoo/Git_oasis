<?php 
    include("inc/header.php");
    include_once("inc/autoid.php");
    include_once("inc/connect.php");

if (!isset($_SESSION['staffid'])) 
{
    echo "<script>window.alert('Please Login first to continue.')</script>";
    echo "<script>window.location='login.php'</script>";
}


 if(isset($_SESSION['staffid'])) 
{
    $staffid=$_SESSION['staffid'];

    $sql="SELECT * FROM tblstaff WHERE staffid='$staffid'";
    $query=mysqli_query($connection,$sql);
    $count=mysqli_num_rows($query);
    $row=mysqli_fetch_array($query);
    $username=$row['username'];

    if ($count < 1) 
    {
        echo "<script>window.alert('ERROR : Staff Profile Not Found.')</script>";
        echo "<script>window.location='login.php'</script>";
    }

 else
 {
    $staffid="";
 }
}
 ?>
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="news_feed.php?ft=LI">Newsfeed</a></li>
                            <li class="breadcrumb-item"><a style="color:darkblue;" href="#">Profile</a></li>
                        </ol>
                    </div>
                </div>
                <!-- row -->


                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Staff Profile</h4>
                            </div>
                            <div class="card-body">
                           <div class="form-validation">
                                    <form class="form-valide" action="#" method="POST">
                                        <input type="hidden" name="staffid" value="<?php echo $staffid;?>"/>
                                        <div class="row">
                                            <div class="col-xl-6">

                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="">Name                    
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>" disabled />
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="">Staff Email Address
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="email" class="form-control" name="email" value="<?php echo $row['email']; ?>" disabled />
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="">UserName                    
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" name="username" value="<?php echo $username ?>" disabled />
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="">Password
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="password" class="form-control" id="val-password" name="password" value="<?php echo $row['password']; ?>" disabled />
                                                    </div>
                                                </div>

                                                    <button type="submit" class="btn btn-primary"> <a style="color:white;" href="staff-edit.php?staffid=<?php echo  $row['staffid']; ?>" >Edit</a></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- row -->
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
<?php 
    include("inc/footer.php");
?>