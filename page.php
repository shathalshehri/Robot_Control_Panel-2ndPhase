
<!DOCTYPE html>
<html lang=en>

<head>
 <meta charset=utf-8>
    <meta name=viewport content="width=device-width,initial-scale=1">
	<title> Robot Control Panel</title><link rel=icon type="image/x-icon" href='/RobotProj/favicon.png'/>
    <link rel="stylesheet" href="/RobotProj/style.css"> <!--to link css -->
</head>


<body>

<div class="container">
<i class="typewriter" style="font-size:27px"><span>/robot.controller</span></i>
	<i class="grey"><br/>•──────────────•°•<i class="grey">❀</i>•°•─────────────•</i>
	<pre><i class="grey">Welcome to my humble robot control panel </i></pre>	
</div>

	<div class="container">


		<form action="" method="post">
			<input type="hidden" name="action" value="submit" />
           
			 <h1>
              <button  id="Forward" type="submit" name="Forward" class="other_btn" value="F" formaction="retrieve.php">Forward</button>
             </h1>
<!--formaction="F.php"-->
            <h2>
        <button  id="Left" type="submit" name="Left" class="other_btn" value="L" formaction="retrieve.php">Left</button>
        <button  id="Stop" type="submit" name="Stop" class="stopbtn" value="S" formaction="retrieve.php">      STOP     </button>
        <button id="Right" type="submit" name="Right" class="other_btn" value="R" formaction="retrieve.php">Right</button>
            </h2>

             <h3>
        <button  id="Backward" type="submit" name="Backward" class="other_btn" value="B" formaction="retrieve.php">Backward</button>
            </h3>
		</form>

	</div>
   
</body>

</html>

