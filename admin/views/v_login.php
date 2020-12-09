<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../assets/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
	<script>
		$(document).ready(function(){
  			$("form").submit(function(){
   			 alert("Masuk Ke Portal");
 	 		});
		});	
	</script>
	<script>
		$(document).ready(function(){
  			$("input").focus(function(){
    			$(this).css("background-color", "#00FFFF");
  			});
  		$("input").blur(function(){
    		$(this).css("background-color", "#40E0D0");
  			});
		});
	</script>
</head>
<body>
	<script type="text/javascript">
	$(document).ready(function(){
		$('#loginform').submit(function(e){
			e.prevenDefault();
			$.ajax({
//tipe post
            type: "POST",
//url aksi php
            url: '..controller/login.php',
//data form dikirim menggunakan serialize
            data: $(this).serialize(),
//umpan balik
            success: function(response)
            {
//parsing data ke json
                var jsonData = JSON.parse(response);  
//logika sesuai kebutuhan pengembang
                // user is logged in successfully in the back-end
                // let's redirect
                if (jsonData.success == "1")
                {
                    location.href = 'http://localhost/SIKAS/admin/index.php?mod=home';
                }
                else
                {
                    alert('Invalid Credentials!');
                }
           }
       });
		});
	});
	</script>
	<form name="login" action="" method="POST" class="login-form">
		<h1>Login</h1>
		<div class="txt">
			<input type="text" name="email" placeholder="Masukkan email Anda">
			<span data-placeholder="email"></span>	
		</div>
		<div class="txt">
			<input type="Password" name="password" placeholder="Masukkan Password Anda">
            <span data-placeholder="Password"></span>
            <span><?=(isset($msg))?$msg:'';?></span>
            <hr>	
        </div>
        <div>
		<button type="Submit" class="logbtn">Submit</button>
        <!--<input type="Submit" class="logbtn">-->
        </div>
	</form>
</body>
</html>
