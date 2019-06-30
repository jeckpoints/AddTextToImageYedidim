<?php
session_start();
?>
 <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/styles.css">
        <title>Text on image</title>
</head>

<body>
<?php

if(isset($_POST['login'])){  
    $pass = $_POST['pass']; 

    if( $pass == 'manager'){
        $_SESSION['pass'] ="ok";
        
        echo"
            <script>
             location.href = 'main.php';
            </script>
        ";
    }
    else{
        echo"
            <script>
            alert('Invalid Acsess!');
            window.history.go(-1);
            </script>
        ";
    }
}
else{
?>
    <div>
        <form action='index.php' method = 'post' class = 'pass_form'>
            <div class='form-group'>
                <label for='pass'>Please Input Your Password</label><br>
                <input type='password' class='form-control' id='pass' name = 'pass'>                   
            </div>
            <button type='submit' class = 'btn btn-success log_btn'  name = 'login'>Login</button>
        </form>
    </div>
<?php
}
?>

</body>
</html>