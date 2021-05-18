<?php
    session_start();
    error_reporting(E_ERROR | E_PARSE);

    if (fopen('../php/install.php', 'r') != null) {
        exit("'install.php' still exists! Delete it to proceed!");
    }

    if (isset($_POST['save-changes-photo'])) {
        // echo '<h2>$_POST values</h2>';
        // echo '<pre>';
        // print_r($_POST);
        // echo '</pre>';
        // echo '<hr>';

        foreach($_POST as $field => $value) {
            $_SESSION[$field] = $value;
            // unset($_SESSION[$field]);
        }

        // echo '<h2>$_SESSION values</h2>';
        // echo '<pre>';
        // print_r($_SESSION);
        // echo '</pre>';
        // echo '<hr>';
        header('location: CMS.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>About Us CMS</title>
        <style>
            html body{
                margin: 0px;
                padding: 0px;
                width: 100%;
                height:100%;
            }

            .cms-main-title {
                text-align: center;
                font-size: 3rem;
                color: white;
                background: linear-gradient(90deg, rgba(0,0,0,1) 20%, rgba(37,51,170,1) 72%, rgba(0,255,229,1) 100%);    
                height: 200px;
                margin-top: -50px;
                padding-top: 35px;
                overflow: hidden;
            }

            #welcome {
                color: rgb(247, 60, 60);
            }

            #admin-name {
                font-size: 20px;
            }

            .label {
                background: rgb(0,0,0);
                color: white;
                padding: 10px 100px 10px 100px;
                font-size: 25px;
            }

            textarea {
                margin-bottom: 25px;
                resize: none;
                padding: 20px;
                border: 4px rgb(247, 60, 60) double;
            }

            textarea:focus {
                border: 4px green double;
                box-shadow: 0px 0px 12px 12px rgba(0, 0, 0, 0.2);
            }

            button {
                font-size: 2rem;
                font-family: "Times New Roman";
                margin-top: 50px;
                margin-bottom: 50px;
                padding: 20px 200px 20px 200px;
                background-color: rgb(247, 60, 60);
                color: white;
                border-radius: 20px;
            }

            button:hover {
                background-color: rgb(0, 0, 0);
            }
        </style>
    </head>

    <body>
        <header>
            <div class="cms-main-title">
                <p><strong id="welcome">ABOUT US EDITING</strong> <br> <span id="admin-name">Select desired content(s) to edit (please use online direct URL) and hit "Save All" to save changes<span></p>   
            </div>
        </header>

        <form method="post" action="About_Us_CMS.php" style="text-align: center; margin-top: 20px; padding-top: 35px;">
            <!--  Luan Vo -->
            <label class="label" for="luan" style='font-family: "Times New Roman";'>Luan Vo</label><br><br>
            <textarea id="luan" 
                    name="luan" 
                    rows=2
                    cols=50
                    style='font-family: "Times New Roman"; font-size: 18px; text-align: center;'

            ><?php
                        if (isset($_SESSION['luan'])) {
                            echo $_SESSION['luan'];
                        } else {
                            echo "https://i.imgur.com/wnuKAT5.jpg";
                        }
                        ?></textarea><br>
            <br>

            <!--  Andrew -->
            <label class="label" for="andrew" style='font-family: "Times New Roman";'>An Le</label><br><br>
            <textarea id="andrew" 
                    name="andrew" 
                    rows=2
                    cols=50
                    style='font-family: "Times New Roman"; font-size: 18px; text-align: center;'

            ><?php
                        if (isset($_SESSION['andrew'])) {
                            echo $_SESSION['andrew'];
                        } else {
                            echo "https://i.imgur.com/WfzZhTt.jpg";
                        }
                        ?></textarea><br>
            <br>

            <!--  Huy Duong -->
            <label class="label" for="huy" style='font-family: "Times New Roman";'>Huy Duong</label><br><br>
            <textarea id="huy" 
                    name="huy" 
                    rows=2
                    cols=50
                    style='font-family: "Times New Roman"; font-size: 18px; text-align: center;'

            ><?php
                        if (isset($_SESSION['huy'])) {
                            echo $_SESSION['huy'];
                        } else {
                            echo "https://i.imgur.com/HqKscdf.jpg";
                        }
                        ?></textarea><br>
            <br>

            <!--  Minh Nguyen -->
            <label class="label" for="minh" style='font-family: "Times New Roman";'>Minh Nguyen</label><br><br>
            <textarea id="minh" 
                    name="minh" 
                    rows=2
                    cols=50
                    style='font-family: "Times New Roman"; font-size: 18px; text-align: center;'

            ><?php
                        if (isset($_SESSION['minh'])) {
                            echo $_SESSION['minh'];
                        } else {
                            echo "https://i.imgur.com/cv75nwp.jpg";
                        }
                        ?></textarea><br>
            <br>
            
            <hr>
            <!-- Button -->
			<button type="submit" name="save-changes-photo" value="submit-photo">Save All</button>
            <hr style="margin-bottom: 50px;">
        </form>
    </body>
</html>