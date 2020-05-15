<?php

    $secret='1234567890abcdefhijklmnopqrstuvwxyz1234567890';

    if(isset($_GET["a"]))
        $a = $_GET[a];
        
    if(isset($_GET["b"]))
        $b = $_GET[b];
    
    if(isset($_GET["c"]))
        $c = $_GET[c];
        
    if(isset($_GET["d"]))
        $d = $_GET[d];

    $cA = substr($secret, $a, 1);
    $cB = substr($secret, $b, 1);
    $cC = substr($secret, $c, 1);
    $cD = substr($secret, $d, 1);  
    
    $text = $cA.$cB.$cC.$cD;

//set header
  header('content-type: image/jpeg');

//setting image size
  $image_width=150;
  $image_height=50;
  $image = imagecreate($image_width, $image_height);
  //background = white
  imagecolorallocate($image, 255 ,255, 255);

//Create text
  for ($i=1; $i<=4;$i++){

    //set font size
      $font_size=rand(22,27);

    //take random text font
      $index=rand(1,10);

    //rnd pos and orientation
      $x=15+(30*($i-1));
      $x=rand($x-6,$x+6);
      $y=rand(35,45);
      $o=rand(-30,30);

    //set font color
      $font_color = imagecolorallocate($image, 33 , 167, 155);

    //set text
      imagettftext($image, $font_size, $o, $x, $y ,  $font_color,'fonts/'.$index.'.ttf',$text[$i-1]);
  }

//create random lines in the picture
  for($i=1; $i<=20;$i++){

    //start / end pos
      $x1= rand(1,150);
      $y1= rand(1,150);
      $x2= rand(1,150);
      $y2= rand(1,150);

    //set color
      $font_color = imagecolorallocate($image, 33 ,167, 155);

    //add lines to image
      imageline($image,$x1,$y1,$x2,$y2,$font_color);
  }

  //create the image (captcha)
  imagejpeg($image);
?>