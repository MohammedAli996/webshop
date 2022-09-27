<?php

/*
===============================================
== Manage Members Page
== You can Add | Edit | Delet Members From Here
===============================================
*/
session_start();

$pageTitle = 'Member';

if (isset($_SESSION['Username'])) {
    include 'init.php';
    $action = isset($_GET['action']) ? $_GET['action'] : 'Manage';
    // Start Manage Page
    if ($action == 'Manage') {

        //Manage page
        echo 'Welcome To Members Page<br>';

        echo '<a href="user.php?action=Add">Add New Members</a>';
    } elseif ($action == 'Add') { // Add Members Page
?>
<h1 class="text-center">Add New Member</h1>
<div class="container">
    <form class="form-horizontal" action="?action=Insert" method="POST">
        <!-- Start Username field-->
        <div class="form-group form-group-lg">
            <label class="col-sm-2 control-label">Username</label>
            <div class="col-sm-10 col-md-5">
                <input type="text" name="username" class="form-control" autocomplete="off" required="required"
                    placeholder="Username to Login Into Shop ">
            </div>
        </div>
        <!-- End Username field-->
        <!-- Start Password field-->
        <div class="form-group form-group-lg">
            <label class="col-sm-2 control-label">Password</label>
            <div class="col-sm-10 col-md-5">
                <input type="password" name="password" class="password form-control" autocomplete="new-password"
                    required="required" placeholder="Possword Must BE Hard and complete">
                <i class="show-pass fa fa-eye fa-2x"></i>
            </div>
        </div>
        <!-- End Password field-->
        <!-- Start Email field-->
        <div class="form-group form-group-lg">
            <label class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10 col-md-5">
                <input type="email" name="email" class="form-control" required="required"
                    placeholder="Email Must Be Valid">
            </div>
        </div>
        <!-- End Email field-->
        <!-- Start Full Name field-->
        <div class="form-group form-group-lg">
            <label class="col-sm-2 control-label">Full Name</label>
            <div class="col-sm-10 col-md-5">
                <input type="text" name="full" class="form-control" required="required"
                    placeholder="Full Name Appear In Your Profail Page">
            </div>
        </div>
        <!-- End Full Name field-->
        <!-- Start submit field-->
        <div class="form-group form-group-lg">
            <div class="col-sm-offset-2 col-sm-10 col-md-5">
                <input type="submit" value="Add Member" class="btn btn-primary btn-lg">
            </div>
        </div>
        <!-- End submit field-->
    </form>
</div>
<?php
    } elseif ($action == 'Insert') {

        //Insert Member Page
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            echo "<h1 class ='text-center'>Add member</h1>";
            echo "<div class='container'>";
            //Get Variable From The Form
            $user  = $_POST['username'];
            $pass  = $_POST['password'];
            $email = $_POST['email'];
            $name  = $_POST['full'];
            $hashPass = sha1($_POST['password']);
            //Password Trick
            // validate The Form
            $formErrors = array();
            if (strlen($user) > 20) {
                $formErrors[] = 'UserNAme Cant Be More then <strong>20 Characters</strong></div>';
            }
            if (empty($user)) {
                $formErrors[] = 'UserName Cant Be <strong>Empty</strong></div>';
            }
            if (empty($pass)) {

                $formErrors[] = 'Password Cant Be <strong>Empty</strong></div>';
            }
            if (empty($name)) {

                $formErrors[] = 'Name Cant Be <strong>Empty</strong></div>';
            }
            if (empty($email)) {

                $formErrors[] = 'E-Mail Cant Be <strong> Empty</strong></div>';
            }

            // Loop Into Erroes Proceed The Update Operation
            foreach ($formErrors as $error) {

                echo '<div class= "alert alert-danger">' . $error . '</div>';
            }
            // Check IF There's No Error Proceed THe Update operation
            if (empty($formErrors)) {

                // Insert User Info In Database


                // Echo Success Message 
                echo '<div class="alert alert-success">' .  $stmt->rowCount() . 'Record Insert</div>';
            }
        } else {
        }
        echo "</div>";
    } elseif ($action == 'Edit') { //Edit Page

        //check If Raquest userid is Numaric & Get The Integer value of it
        $userid = isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET['userid']) : 0;

        // Select All Data Depend On this ID
        $stmt = $con->prepare("SELECT * FROM users WHERE UserID = ? LIMIT 1");

        // execute Quwery
        $stmt->execute(array($userid));

        // Fetcht The Data
        $row = $stmt->fetch();

        //the Row Count
        $count = $stmt->rowCount();

        // If There's Such ID Show the Form
        if ($stmt->rowCount() > 0) { ?>

<h1 class="text-center">Edit Member</h1>
<div class="container">
    <form class="form-horizontal" action="?action=Update" method="POST">
        <input type="hidden" name="userid" value="<?php echo $userid ?>" />
        <!-- Start Username field-->
        <div class="form-group form-group-lg">
            <label class="col-sm-2 control-label">Username</label>
            <div class="col-sm-10 col-md-5">
                <input type="text" name="username" class="form-control" value="<?php echo $row['Username'] ?>"
                    autocomplete="off" required="required">
            </div>
        </div>
        <!-- End Username field-->
        <!-- Start Password field-->
        <div class="form-group form-group-lg">
            <label class="col-sm-2 control-label">Password</label>
            <div class="col-sm-10 col-md-5">
                <input type="hidden" name="oldpassword" value="<?php echo $row['Password'] ?>">
                <input type="password" name="newpassword" class="form-control" autocomplete="new-password"
                    placeholder="Leave lank If You dont to change">
            </div>
        </div>
        <!-- End Password field-->
        <!-- Start Email field-->
        <div class="form-group form-group-lg">
            <label class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10 col-md-5">
                <input type="email" name="email" value="<?php echo $row['Email'] ?>" class="form-control"
                    required="required">
            </div>
        </div>
        <!-- End Email field-->
        <!-- Start Full Name field-->
        <div class="form-group form-group-lg">
            <label class="col-sm-2 control-label">Full Name</label>
            <div class="col-sm-10 col-md-5">
                <input type="text" name="full" value="<?php echo $row['FullName'] ?>" class="form-control"
                    required="required">
            </div>
        </div>
        <!-- End Full Name field-->
        <!-- Start submit field-->
        <div class="form-group form-group-lg">
            <div class="col-sm-offset-2 col-sm-10 col-md-5">
                <input type="submit" value="Save" class="btn btn-primary btn-lg">
            </div>
        </div>
        <!-- End submit field-->
    </form>
</div>

<?php
            //IF There's No Such ID show Error Message
        } else {
            echo 'There No Such ID';
        }
    } elseif ($action == 'Update') {   // update page
        echo "<h1 class ='text-center'>Update member</h1>";
        echo "<div class='container'>";
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Get Variable From The Form
            $id    = $_POST['userid'];
            $user  = $_POST['username'];
            $email = $_POST['email'];
            $name  = $_POST['full'];

            //Password Trick
            $pass = empty($_POST['newpassword']) ?  $_POST['oldpassword'] : sha1($_POST['newpassword']);

            // validate The Form
            // validate The Form
            $formErrors = array();
            if (strlen($user) > 20) {
                $formErrors[] = 'UserNAme Cant Be More then <strong>20 Characters</strong></div>';
            }
            if (empty($user)) {
                $formErrors[] = 'UserNAme Cant Be <strong>Empty</strong></div>';
            }
            if (empty($name)) {

                $formErrors[] = 'Name Cant Be <strong>Empty</strong></div>';
            }
            if (empty($email)) {

                $formErrors[] = 'E-Mail Cant Be <strong> Empty</strong></div>';
            }

            // Loop Into Erroes Proceed The Update Operation
            foreach ($formErrors as $error) {

                echo '<div class= "alert alert-danger">' . $error . '</div>';
            }
            // Check IF There's No Error Proceed THe Update operation
            if (empty($formErrors)) {

                // Update  The Database with this Info

                $stmt = $con->prepare("UPDATE users SET Username = ?, Email = ?, FullName = ?, Password = ? WHERE UserID = ?");
                $stmt->execute(array($user, $email, $name, $pass, $id));

                // Echo Success Message 

                echo "<div class='alert alert-success'>" .  $stmt->rowCount() . 'Record Update</div>';
            }
        } else {
            echo 'Sorry You cant Browse This Page Directly';
        }
        echo "</div>";
    }
    include $tpl . 'footer.php';
} else {
    header('Location: index.php');
    exit();
}