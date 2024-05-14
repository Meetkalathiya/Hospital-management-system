<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<style>
		body {
			background-color: #f1f1f1;
			font-family: Arial, sans-serif;
            background-image: url("image/hospital background.png");
            background-size: 1710px 855px;
            background-repeat: no-repeat;
		}
		
		.container {
			background-color: #ffffff;
			border-radius: 5px;
			box-shadow: 0px 0px 10px #999999;
            border-radius:20px;
            margin-left:500px;
			margin-top: 100px;
			max-width: 400px;
			padding: 20px;
		}
		
		h1 {
			text-align: center;
		}
		
		input[type=tel] {
			width: 100%;
			padding: 12px 20px;
			margin: 8px 0;
			box-sizing: border-box;
			border: 2px solid #ccc;
			border-radius: 4px;
			background-color: #f8f8f8;
			font-size: 16px;
		}
		
		input[type=submit] {
			background-color: #4CAF50;
			color: white;
			padding: 14px 20px;
			margin: 8px 0;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			width: 100%;
			font-size: 16px;
		}
		
		input[type=submit]:hover {
			background-color: #45a049;
		}
		
		.error {
			color: red;
			font-size: 14px;
			margin-top: 5px;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1>Login</h1>
		<form action="data.php" method="post">
			<label for="mobile">Mobile Number:</label>
			<input type="tel" id="mobile" name="mobile" pattern="[0-9]{10}" required>
			<div class="error"></div>
			<input type="submit" value="Submit">
		</form>
	</div>
	<script>
		// Validate mobile number format
		const mobileInput = document.getElementById('mobile');
		mobileInput.addEventListener('input', () => {
			if (!mobileInput.checkValidity()) {
				mobileInput.classList.add('invalid');
				mobileInput.nextElementSibling.textContent = 'Please enter a valid 10-digit mobile number.';
			} else {
				mobileInput.classList.remove('invalid');
				mobileInput.nextElementSibling.textContent = '';
			}
		});
	</script>
</body>
</html>
