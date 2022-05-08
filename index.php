<html>
<head>
<meta name="viewport" content="width=device-width" />
</head>
       <body>
       <center>
           
        <div style="background-color: #999; color: white; font-size: 40px; padding: 20px; position: absolute; top: 0; left: 0; right: 0; height: 60;">
            Raspberry Pi WiFi Controlled Morse Code
        </div>     
         <form method="get" action="index.php" style="margin-top: 120;">                
            <input type="text" style = "margin-left: 5vw; font-size: 30px; height: 90; width: 70vw; text-align: center;" value="" name="text" placeholder='Input a word to hear it in morse!' />
            <input type="submit" style = "background-color: #04aa6d; border: none; color: white; padding: 40px 32px; text-decoration: none; cursor: pointer;" value="SUBMIT" name="submit" />
         </form>​​​
    </center>
<?php
    system ("gpio mode 26 out");
    if($_GET['text'] != '')
        {
                        system("gpio -g write 26 0");
                        
                        $length = strlen($_GET['text']);

                        $array = array(
                            ' ' => [0],
                            'a' => [600, 1000],
                            'b' => [1000, 600, 600, 600],
                            'c' => [1000, 600, 1000, 600],
                            'd' => [1000, 600, 600],
                            'e' => [600],
                            'f' => [600, 600, 1000, 600],
                            'g' => [1000, 1000, 600],
                            'h' => [600, 600, 600, 600],
                            'i' => [600, 600],
                            'j' => [600, 1000, 1000, 1000],
                            'k' => [1000, 600, 1000],
                            'l' => [600, 1000, 600, 600],
                            'm' => [1000, 1000],
                            'n' => [1000, 600],
                            'o' => [1000, 1000, 1000],
                            'p' => [600, 1000, 1000, 600],
                            'q' => [1000, 1000, 600, 1000],
                            'r' => [600, 1000, 600],
                            's' => [600, 600, 600],
                            't' => [1000],
                            'u' => [600, 600, 1000],
                            'v' => [600, 600, 600, 1000],
                            'w' => [600, 1000, 1000],
                            'x' => [1000, 600, 600, 1000],
                            'y' => [1000, 600, 1000, 1000],
                            'z' => [1000, 1000, 600, 600]
                        );

                        for($x = 0; $x < $length; $x++){
                            print($_GET['text'][$x]);
                            print('        ');
                            for($y = 0; $y < count($array[$_GET['text'][$x]]); $y++){
                                system("gpio -g write 26 1");
                                print($array[$_GET['text'][$x]][$y] / 1000);
                                print('s, ');
                                sleep($array[$_GET['text'][$x]][$y] / 1000);
                                system("gpio -g write 26 0");
                                sleep(1);
                            }
                            sleep(2);
                        }


        }
?>
   </body>
</html>