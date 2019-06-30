<?php
session_start();
if($_SESSION['pass']=='ok'){
function utf8_strrev($str){
    preg_match_all('/([^\d]|\d+)/us', $str, $ar);
    return join('',array_reverse($ar[0]));
}

function getCenter($imgWidth, $fontSize, $fontFile, $text) {
    $bbox = imagettfbbox($fontSize, 0, $fontFile, $text);
    $textWidth = $bbox[2] - $bbox[0];
    return ceil(($imgWidth - $textWidth)/2);
}

if(!empty($_GET['picture']) && !empty($_GET['text'])) {
    $imgPath = "img/".$_GET['picture'];
    $font = getcwd()."/almoni_tzar_aaa_bold_1_.ttf";
    $fontSize = 50;
    $text = utf8_strrev($_GET['text']);
    $text2 = (!empty($_GET['text2'])) ? utf8_strrev($_GET['text2']) : "";
    $x = getCenter(getimagesize($imgPath)[0], $fontSize, $font, $text);

    $image = imagecreatefromjpeg($imgPath);
    $black = imagecolorallocate($image, 0, 0, 0);
    
    $y = 0;
    switch($_GET['picture']) {
        case 'picture1.jpg': 
            $y = 1020;
            break;
        case 'picture2.jpg': 
            $y = 1025;
            break;
        case 'picture3.jpg':
            if ($_GET['pos'] == "top")
                $y = 1040;
            else  if ($_GET['pos'] == "bottom") {
                $fontSize = 43;
                $x = getCenter(getimagesize($imgPath)[0], $fontSize, $font, $text);
                $y = 1133;
            }
            else {
                $x1 = getCenter(getimagesize($imgPath)[0], 43, $font, $text2) + 15;
                $y = 1090;
                imagettftext($image, 43, 0, $x1, $y, $black, $font, $text2);
                $y = 1025;
            }
            break;
        case 'picture4.jpg': 
             if ($_GET['pos'] == "top")
                $y = 1070;
            else  if ($_GET['pos'] == "bottom") {
                $fontSize = 43;
                $x = getCenter(getimagesize($imgPath)[0], $fontSize, $font, $text)+80;
                $y = 1140;
            }
            else {
                $x2 = getCenter(getimagesize($imgPath)[0], 43, $font, $text2) + 80;
                $y = 1140;
                imagettftext($image, 43, 0, $x2, $y, $black, $font, $text2);
                $y = 1070;
            }
            break;
        case 'picture5.jpg': 
              if ($_GET['pos'] == "top")
                $y = 1070;
            else  if ($_GET['pos'] == "bottom") {
                $fontSize = 43;
                $x = getCenter(getimagesize($imgPath)[0], $fontSize, $font, $text)+75;
                $y = 1140;
            }
            else {
                $x3 = getCenter(getimagesize($imgPath)[0], 43, $font, $text2) + 75;
                $y = 1140;
                imagettftext($image, 43, 0, $x3, $y, $black, $font, $text2);
                $y = 1070;
            }
            break;
        case 'picture6.jpg': 
            $y = 1080;
            break;
        case 'picture7.jpg': 
            $y = 1090;
            break;
        case 'picture8.jpg': 
            $y = 1040;
            break;
        case 'picture9.jpg': 
            $y = 1040;
            break;
        case 'picture10.jpg': 
            $y = 1080;
            break;
        case 'picture11.jpg': 
            $y = 1080;
            break;
        case 'picture12.jpg': 
            $y = 1080;
            break;
        case 'picture13.jpg': 
            $y = 1080;
            break;
       
    }
    imagettftext($image, $fontSize, 0, $x, $y, $black, $font, $text);
    imagepng($image, "image.png");
    imagedestroy($image);
}
?>

<html>
    <head>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/styles.css">
        <title>Text on image</title>
    </head>
    <body>

    <div class="container">
        <div style = "float:right; font-size:18px;">
            <a href = "signout.php">Sign Out</a>
            
        </div>
        <div class="row">
            <div class="col-md-6">
                <form action="main.php">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="text">Set text: </label>
                            <input type="text" name="text" id="text" required>
                            <br>
                            <div id="text2" style="display: none">
                                <label for="textBottom">Set bottom text: </label>
                                <input type="text" name="text2" id="textBottom">
                            </div>
                            <br>
                            <div id="option" class="row" style="display:none">
                                <div class="col-md-12">
                                    Position: 
                                    <input type="radio" name="pos" id="pos1" value="top" onclick="hideText2()" checked>
                                    <label for="pos1">Top</label>
                                    <input type="radio" name="pos" id="pos2" value="bottom" onclick="hideText2()"
                                    <label for="pos2">Bottom</label>
                                    <input type="radio" name="pos" id="pos3" value="both" onclick="showText2()">
                                    <label for="pos3">Both</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="radio" value="picture1.jpg" name="picture" id="picture1" onclick="hideOption()" required>
                                </div>
                            </div>
                            <div class="row">
                                <label for="picture1">
                                    <div class="col-md-12 thumb-container">
                                        <img src="img/picture1.jpg" alt="Picture 1" class="thumb">
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="radio" value="picture2.jpg" name="picture" id="picture2" onclick="hideOption()" required>
                                </div>
                            </div>
                            <div class="row">
                                <label for="picture2">
                                    <div class="col-md-12 thumb-container">
                                        <img src="img/picture2.jpg" alt="Picture 2" class="thumb">
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="radio" value="picture3.jpg" name="picture" id="picture3" onclick="showOption()" required>
                                </div>
                            </div>
                            <div class="row">
                                <label for="picture3">
                                    <div class="col-md-12 thumb-container">
                                        <img src="img/picture3.jpg" alt="Picture 3" class="thumb">
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                             <div class="row">
                                <div class="col-md-12">
                                    <input type="radio" value="picture4.jpg" name="picture" id="picture4" onclick="showOption()" required>
                                </div>
                            </div>
                           
                            <div class="row">
                                <label for="picture4">
                                    <div class="col-md-12 thumb-container">
                                        <img src="img/picture4.jpg" alt="Picture 4" class="thumb">
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                           <div class="row">
                                <div class="col-md-12">
                                    <input type="radio" value="picture5.jpg" name="picture" id="picture5" onclick="showOption()" required>
                                </div>
                            </div>
                            <div class="row">
                                <label for="picture5">
                                    <div class="col-md-12 thumb-container">
                                        <img src="img/picture5.jpg" alt="Picture 5" class="thumb">
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="radio" value="picture6.jpg" name="picture" id="picture6" onclick="hideOption()" required>
                                </div>
                            </div>
                            <div class="row">
                                <label for="picture6">
                                    <div class="col-md-12 thumb-container">
                                        <img src="img/picture6.jpg" alt="Picture 6" class="thumb">
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="radio" value="picture7.jpg" name="picture" id="picture7" onclick="hideOption()" required>
                                </div>
                            </div>
                            <div class="row">
                                <label for="picture7">
                                    <div class="col-md-12 thumb-container">
                                        <img src="img/picture7.jpg" alt="Picture 7" class="thumb">
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="radio" value="picture8.jpg" name="picture" id="picture8" onclick="hideOption()" required>
                                </div>
                            </div>
                            <div class="row">
                                <label for="picture8">
                                    <div class="col-md-12 thumb-container">
                                        <img src="img/picture8.jpg" alt="Picture 8" class="thumb">
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="radio" value="picture9.jpg" name="picture" id="picture9" onclick="hideOption()" required>
                                </div>
                            </div>
                            <div class="row">
                                <label for="picture9">
                                    <div class="col-md-12 thumb-container">
                                        <img src="img/picture9.jpg" alt="Picture 9" class="thumb">
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="radio" value="picture10.jpg" name="picture" id="picture10" onclick="hideOption()" required>
                                </div>
                            </div>
                            <div class="row">
                                <label for="picture10">
                                    <div class="col-md-12 thumb-container">
                                        <img src="img/picture10.jpg" alt="Picture 10" class="thumb">
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="radio" value="picture11.jpg" name="picture" id="picture11" onclick="hideOption()" required>
                                </div>
                            </div>
                            <div class="row">
                                <label for="picture11">
                                    <div class="col-md-12 thumb-container">
                                        <img src="img/picture11.jpg" alt="Picture 5" class="thumb">
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="radio" value="picture12.jpg" name="picture" id="picture12" onclick="hideOption()" required>
                                </div>
                            </div>
                            <div class="row">
                                <label for="picture12">
                                    <div class="col-md-12 thumb-container">
                                        <img src="img/picture12.jpg" alt="Picture 6" class="thumb">
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="radio" value="picture13.jpg" name="picture" id="picture13" onclick="hideOption()" required>
                                </div>
                            </div>
                            <div class="row">
                                <label for="picture13">
                                    <div class="col-md-12 thumb-container">
                                        <img src="img/picture13.jpg" alt="Picture 13" class="thumb">
                                    </div>
                                </label>
                            </div>
                        </div>
                      
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="submit" value="Write">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6 gen">
                <?php if(!empty($_GET['picture']) && !empty($_GET['text'])) { ?>
                <div class="row">
                    <div class="col-md-12" id="imageContainer">
                        <img src="image.png" alt="..." id="main">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12" style = "text-align:center;">
                        <a id="downloadBtn" href="image.png" download>
                            Download
                        </a>
                    </div>
                </div>
                <?php }}
                else{
                     echo"
            <script>
            alert('Invalid Access');
             location.href = 'signout.php';
            </script>
        ";
                }
                ?>
            </div>
        </div>
    </div>

    <script>
        function showText2() {
            document.getElementById("text2").style.display = "block";
        }
        
        function hideText2() {
            document.getElementById("text2").style.display = "none";
        }
        
        function showOption() {
            document.getElementById("option").style.display = "block";
        }

        function hideOption() {
            document.getElementById("option").style.display = "none";
            hideText2();
        }
    </script>
    </body>
</html>
