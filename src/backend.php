<?php
session_start();
$servername = "mysql-server";
$username = "root";
$password = "secret";
$newdb = "mydatabase";


if (isset($_POST['sign_up'])) {
    $name = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['password'];

    try {
        $conn = new PDO("mysql:host=$servername;dbname=mydatabase", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = $conn->prepare("SELECT * FROM `Blog_users` WHERE `user_email`  = '$email' ");
        $query->execute();

        $count = $query->rowCount();
        if ($count > 0) {
            echo "<h1>Email Already Exist</h1>";
        } else {
            try {
                $conn = new PDO("mysql:host=$servername;dbname=mydatabase", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $query = $conn->prepare("INSERT INTO `Blog_users`(`user_id`, `username`, `user_email`, `user_password`) VALUES (null,'$name','$email','$pass')");
                $query->execute();

                echo '<h1>Hello ' . $name . ' ..!</h1>';
                echo '<br>';
                echo '<h1>Wait until admin allows you to go ahead<h1><br>';
                echo '<a href="blog_user.php" class="btn btn-lg bg-primary">Move to Login Page</a> ';
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
            $conn = null;
        }
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    $conn = null;
}
if (isset($_POST['login'])) {
    $login_mail = $_POST['login_email'];
    $login_pass = $_POST['user_pass'];
    try {
        $conn = new PDO("mysql:host=$servername;dbname=mydatabase", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = $conn->prepare("SELECT * FROM `Blog_users` WHERE `user_email` = '$login_mail' AND `user_password` = '$login_pass' ");
        $query->execute();

        $count = $query->rowCount();
        if ($count > 0) {
            $r = $query->fetch(PDO::FETCH_ASSOC);

            $_SESSION['id'] = $r['user_id'];
            echo $_SESSION['id'];

?>
            <script>
                location.href = 'blog_home.php';
            </script>
    <?php

            exit();
        } else {
            echo '<h1>Please check your email and Password<h1>';
        }
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
if (isset($_POST['blog'])) {
    $id = $_SESSION['id'];
    $blog_image = $_POST['blog_image'];
    $blog_heading = $_POST['blog_heading'];
    $blog_content = $_POST['blog_content'];
    echo $blog_image;
    echo $blog_heading;
    echo $blog_content;

    try {
        $conn = new PDO("mysql:host=$servername;dbname=mydatabase", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = $conn->prepare("INSERT INTO `Blogs`(`Id`, `user_id`, `blog_image`, `Heading`, `Content`) VALUES (null,' $id',' $blog_image',' $blog_heading','$blog_content')");
        $query->execute();
        echo 'success';
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    $conn = null;
}
function  display_users()
{
    $servername = "mysql-server";
    $username = "root";
    $password = "secret";
    $newdb = "mydatabase";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=mydatabase", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = $conn->prepare("SELECT * FROM `Blog_users`");
        $query->execute();
        $result = $query->setFetchMode(PDO::FETCH_ASSOC);
        echo '<form action="" method="POST"><table id="dataTable" class = "display border" style="width:100%;"><thead class="border"><tr><th>USER ID</th><th>USER NAME</th><th>USER EMAIL</th><th>DELETE</th></thead></tr>';
        echo '<tbody class="border">';
        foreach ($query->fetchAll() as $k => $r) {
            echo '<tr><td>' . $r['user_id'] . '</td><td>' . $r['username'] . '</td><td>' . $r['user_email'] . '</td><td><button class="btn btn-lg bg-danger"  type="submit" name="del" value="' . $r['user_id'] . '">X</button></td></tr>';
        }
        echo '</tbody></table></form>';
    } catch (PDOException $e) {
        // echo $sql . "<br>" . $e->getMessage();
    }
}
function  display_blog()
{
    $servername = "mysql-server";
    $username = "root";
    $password = "secret";
    $newdb = "mydatabase";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=mydatabase", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = $conn->prepare("SELECT * FROM `Blogs`");
        $query->execute();
        $result = $query->setFetchMode(PDO::FETCH_ASSOC);
        echo '<form action="" method="POST"><table id="dataTable" class = "display border" style="width:100%;"><thead class="border"><tr><th>USER ID</th><th>Heading</th><th>BLOG ID</th><th>EDIT</th><th>DELETE</th></thead></tr>';
        echo '<tbody class="border">';
        foreach ($query->fetchAll() as $k => $r) {
            echo '<tr><td>' . $r['user_id'] . '</td><td>' . $r['Heading'] . '</td><td>' . $r['Id'] . '</td><td><button type="submit" name="edit" value="' . $r['Id'] . '" class="btn btn-lg bg-dark text-white">EDIT</button></td><td><button type="submit" name="Del" value="' . $r['Id'] . '" class="btn btn-lg bg-danger">X</button></td></tr>';
        }
        echo '</tbody></table></form>';
    } catch (PDOException $e) {
        // echo $sql . "<br>" . $e->getMessage();
    }
}
function  display_dashboard_users()
{
    $servername = "mysql-server";
    $username = "root";
    $password = "secret";
    $newdb = "mydatabase";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=mydatabase", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = $conn->prepare("SELECT * FROM `Blog_users` LIMIT 3");
        $query->execute();
        $result = $query->setFetchMode(PDO::FETCH_ASSOC);
        echo '<form action="" method="POST"><table id="dataTable" class = "display border" style="width:100%;"><thead class="border"><tr><th>USER ID</th><th>USER NAME</th><th>USER EMAIL</th><th>DELETE</th></thead></tr>';
        echo '<tbody class="border">';
        foreach ($query->fetchAll() as $k => $r) {
            echo '<tr><td>' . $r['user_id'] . '</td><td>' . $r['username'] . '</td><td>' . $r['user_email'] . '</td><td><button class="btn btn-lg bg-danger"  type="submit" name="del" value="' . $r['user_id'] . '">X</button></td></tr>';
        }
        echo '</tbody></table></form>';
    } catch (PDOException $e) {
        // echo $sql . "<br>" . $e->getMessage();
    }
}
function  display_dashboard_blog()
{
    $servername = "mysql-server";
    $username = "root";
    $password = "secret";
    $newdb = "mydatabase";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=mydatabase", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = $conn->prepare("SELECT * FROM `Blogs` LIMIT 3");
        $query->execute();
        $result = $query->setFetchMode(PDO::FETCH_ASSOC);
        echo '<form action="" method="POST"><table id="dataTable" class = "display border" style="width:100%;"><thead class="border"><tr><th>USER ID</th><th>Heading</th><th>BLOG ID</th><th>EDIT</th><th>DELETE</th></thead></tr>';
        echo '<tbody class="border">';
        foreach ($query->fetchAll() as $k => $r) {
            echo '<tr><td>' . $r['user_id'] . '</td><td>' . $r['Heading'] . '</td><td>' . $r['Id'] . '</td><td><button type="submit" name="edit" value="' . $r['Id'] . '" class="btn btn-lg bg-dark text-white">EDIT</button></td><td><button type="submit" name="Del" value="' . $r['Id'] . '" class="btn btn-lg bg-danger">X</button></td></tr>';
        }
        echo '</tbody></table></form>';
    } catch (PDOException $e) {
        // echo $sql . "<br>" . $e->getMessage();
    }
}
if (isset($_POST['edit'])) {
    $id = $_POST['edit'];
    try {
        $conn = new PDO("mysql:host=$servername;dbname=mydatabase", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = $conn->prepare("SELECT * FROM `Blogs` WHERE `Id` =  '$id'");
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        echo '<form action="" method="POST"><table id="dataTable" class = "display border" style="width:100%;"><thead class="border"><tr><th>USER ID</th><th>Heading</th><th>BLOG ID</th><th>EDIT</th><th>DELETE</th></thead></tr>';
        $_SESSION['blog_id'] = $result['Id'];
        $_SESSION['blog_heading'] = $result['Heading'];
        $_SESSION['blog_content'] = $result['Content'];
    } catch (PDOException $e) {
        // echo $sql . "<br>" . $e->getMessage();
    }
    ?>

    <script>
        location.href = 'editblog.php';
    </script>
    <?php

}
if (isset($_POST['edit_blog'])) {
    $u_id =  $_SESSION['blog_id'];
    $u_heading = $_POST['edit_heading'];
    $u_content = $_POST['edit_content'];
    $u_image = $_POST['edit_image'];

    try {
        $conn = new PDO("mysql:host=$servername;dbname=mydatabase", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $query = "UPDATE `Blogs` SET `blog_image`='$u_image',`Heading`='$u_heading',`Content`='$u_content' WHERE `Id` =  '$u_id'";

        $conn->exec($query);

        echo 'value updated';
    ?>

        <script>
            alert('RECORD UPDATED')
            location.href = 'admin_blogs.php';
        </script>
    <?php
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;
}
if (isset($_POST['edit_userblog'])) {
    $u_id =  $_SESSION['blog_id'];
    $u_heading = $_POST['edit_heading'];
    $u_content = $_POST['edit_content'];
    $u_image = $_POST['edit_image'];

    try {
        $conn = new PDO("mysql:host=$servername;dbname=mydatabase", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $query = "UPDATE `Blogs` SET `blog_image`='$u_image',`Heading`='$u_heading',`Content`='$u_content' WHERE `Id` =  '$u_id'";

        $conn->exec($query);
    ?>

        <script>
            alert('RECORD UPDATED')
            location.href = 'myblog.php';
        </script>
    <?php
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;
}

if (isset($_POST['del'])) {
    $id = $_POST['del'];
    $servername = "mysql-server";
    $username = "root";
    $password = "secret";
    $newdb = "mydatabase";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=mydatabase", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $query = "DELETE FROM `Blog_users` WHERE `user_id` =  '$id'";

        $conn->exec($query);
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;
}
if (isset($_POST['Del'])) {
    $id = $_POST['Del'];
    $servername = "mysql-server";
    $username = "root";
    $password = "secret";
    $newdb = "mydatabase";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=mydatabase", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $query = "DELETE FROM `Blogs` WHERE `Id` =  '$id'";

        $conn->exec($query);
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;
}
function display_myblogs()
{
    $id = $_SESSION['id'];

    $servername = "mysql-server";
    $username = "root";
    $password = "secret";
    $newdb = "mydatabase";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=mydatabase", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = $conn->prepare("SELECT * FROM `Blogs` WHERE `user_id` = '$id'");
        $query->execute();
        $result = $query->setFetchMode(PDO::FETCH_ASSOC);
        foreach ($query->fetchAll() as $k => $r) {
            echo ' <div class="col mb-5" >
        <div class="card h-100">
        <img class="card-img-top" src="https://www.dreamhost.com/blog/wp-content/uploads/2019/01/Blog-experts-opt-750x498.jpg" alt="..." width="100" height="200"/>
        <div class="card-body p-4">
        <div class="text-center">
        <h5 class="fw-bolder">' . $r['Heading'] . '</h5>
        </div>
        </div>
        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
        <form action="output.php" method="POST" >
        <div class="text-center"><button name="openblog" value="' . $r['Id'] . '" class=" btn btn-outline-dark" data-id=" ' . $r['product_id'] . ' " data-name="' . $r['product_name'] . ' " data-image="' . $r['product_image'] . '" data-category="' . $r['product_category'] . '" >View Blog</button></div>
        </form>
        <form action="" method="POST">
        <div class="text-center mt-2"><button name="user_edit" value="' . $r['Id'] . '" class=" btn btn-primary text-light" data-id=" ' . $r['product_id'] . ' " data-name="' . $r['product_name'] . ' " data-image="' . $r['product_image'] . '" data-category="' . $r['product_category'] . '" >Edit Blog</button></div>
        <div class="text-center mt-2 "><button name="user_delete" value="' . $r['Id'] . '" class=" btn btn-danger" data-id=" ' . $r['product_id'] . ' " data-name="' . $r['product_name'] . ' " data-image="' . $r['product_image'] . '" data-category="' . $r['product_category'] . '" >Delete</button></div>
        
        </form>
        </div>
        </div>
        </div>';
        }
    } catch (PDOException $e) {
        // echo $sql . "<br>" . $e->getMessage();
    }
}
if (isset($_POST['user_edit'])) {
    $id = $_POST['user_edit'];
    try {
        $conn = new PDO("mysql:host=$servername;dbname=mydatabase", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = $conn->prepare("SELECT * FROM `Blogs` WHERE `Id` =  '$id'");
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        echo '<form action="" method="POST"><table id="dataTable" class = "display border" style="width:100%;"><thead class="border"><tr><th>USER ID</th><th>Heading</th><th>BLOG ID</th><th>EDIT</th><th>DELETE</th></thead></tr>';
        $_SESSION['blog_id'] = $result['Id'];
        $_SESSION['blog_heading'] = $result['Heading'];
        $_SESSION['blog_content'] = $result['Content'];
    } catch (PDOException $e) {
        // echo $sql . "<br>" . $e->getMessage();
    }
    ?>

    <script>
        location.href = 'edit_userblog.php';
    </script>
<?php
}
if (isset($_POST['user_delete'])) {
    $id = $_POST['user_delete'];
    $servername = "mysql-server";
    $username = "root";
    $password = "secret";
    $newdb = "mydatabase";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=mydatabase", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $query = "DELETE FROM `Blogs` WHERE `Id` =  '$id'";

        $conn->exec($query);
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;
}
if ($_POST['openblog']) {
    function myfunction()
    {
        $value = $_POST['openblog'];
        $servername = "mysql-server";
        $username = "root";
        $password = "secret";
        $newdb = "mydatabase";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=mydatabase", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $query = $conn->prepare("SELECT * FROM `Blogs` Where `Id` = '$value'");
            $query->execute();
            $r = $query->fetch(PDO::FETCH_ASSOC);
            echo '  <div >
         <img src="https://www.dreamhost.com/blog/wp-content/uploads/2019/01/Blog-experts-opt-750x498.jpg" width="100%" height="300" >
        </div>
        <div class="text-center " >
         <h2> ' . $r['Heading'] . '</h2>
         </div>
        <div class="text-center px-5">
        <p>' . $r['Content'] . '</p>
        </div>';
        } catch (PDOException $e) {
            // echo $sql . "<br>" . $e->getMessage();
        }
    }
}
if (isset($_POST['logout'])) {
    session_unset();

?>
    <script>
        location.href = 'blog_user.php';
    </script>
<?php

  
}
if (isset($_POST['login_admin'])) {
    $login_mail = $_POST['username_admin'];
    $login_pass = $_POST['password_admin'];
    try {
        $conn = new PDO("mysql:host=$servername;dbname=mydatabase", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = $conn->prepare("SELECT `user_id` FROM `Blog_users` WHERE `user_email` = '$login_mail' AND `user_password` = '$login_pass' ");
        $query->execute();
        $r = $query->fetch(PDO::FETCH_ASSOC);
        $count = $query->rowCount();
        if ($r['user_id'] == 3) {
            $r = $query->fetch(PDO::FETCH_ASSOC);

            $_SESSION['admin_id'] = $r['user_id'];
            echo $_SESSION['admin_id'];

?>
            <script>
                location.href = 'admin_users.php';
            </script>
    <?php

            exit();
        } else {
            echo '<h1>You are not an admin<h1>';
        }
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
if (isset($_POST['logout_admin'])) {
    session_unset();

?>
    <script>
        location.href = 'blog_adminlogin.php';
    </script>
<?php

  
}

// try {
//     $conn = new PDO("mysql:host=$servername;dbname=mydatabase", $username, $password);
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//     $query = $conn->prepare("SELECT * FROM `Users` WHERE `email` = '$sign_email' ");
//     $query->execute();

//     $count = $query->rowCount();
//     if ($count > 0) {
//         echo "<h1>Email Already Exist</h1>";
//     } else {
//         try {
//             $conn = new PDO("mysql:host=$servername;dbname=mydatabase", $username, $password);
//             $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//             $query = $conn->prepare("INSERT INTO `Users`(`id`, `name`, `username`, `email`, `password`, `User_status`,`User_role`) VALUES (null,'$sign_name','$sign_username','$sign_email','$sign_password','Pending','Customer')");
//             $query->execute();

//             echo '<h1>Hello ' . $sign_name . ' ..!</h1>';
//             echo '<br>';
//             echo '<h1>Wait until admin allows you to go ahead<h1><br>';
//             echo '<a href="log_in.php" class="btn btn-lg bg-primary">Move to Login Page</a> ';
//         } catch (PDOException $e) {
//             echo "Connection failed: " . $e->getMessage();
//         }
//         $conn = null;
//     }
// } catch (PDOException $e) {
//     echo "Connection failed: " . $e->getMessage();
// }
// $conn = null;

?>