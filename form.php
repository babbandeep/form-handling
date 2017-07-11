<!DOCTYPE html>
    <html>
        <head>
		    <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta charset="utf-8">
            <link rel="stylesheet" href="css/bootstrap.css">
            <link rel="stylesheet" href="css/bootstrap.min.css">
			<link rel="stylesheet" href="style1.css">
	        <link rel="stylesheet" href="font-awe/css/font-awesome.min.css">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		</head>
		<body>
		    <div class="container">
		        <div class="row">
				    <div class="col-sm-12">
					<form action= "data.php" method="post">
					   
						<div class="form-group form">
			                <input type="character" class="form-control form_" id="name" placeholder="Name" name="name" required>
                        </div>
                        <div class="form-group form">
                            <input type="email" class="form-control form_" id="email" placeholder="email" name="email" required>
                        </div>	
                        <div class="form-group form">
                            <input type="digits" class="form-control form_" id="phone" placeholder="phone" name="phone" required>
                        </div>
						<div class="form-group form">
                            <textarea type="charset" class="form-control form_1" id="msg" placeholder="message" name="message" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-default qty_btn button" value="insert"><b><span class="quote">Submit</b></button></span>
					</form>
					</div>
				</div>
			</div>
		</body>
	</html>
	
	
