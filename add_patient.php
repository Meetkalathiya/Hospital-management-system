<!DOCTYPE html>
<html lang="en">
  <head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <script type = "text/javascript" >  
    function preventBack() { window.history.forward(); }  
    setTimeout("preventBack()", 0);  
    window.onunload = function () { null };  
  </script> 

    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add Patient</title>
    <style>
      * {
  margin: 0;
  padding: 0;
}


#h1 {
  text-align: center;
}
.form-container {
  background-color:transparent;
  border-radius: 15px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
  margin-top:20px ;
  margin-left: 430px;
  padding: 20px;
  width: 600px;
  height: 630px;
}

form {
  display: flex;
  flex-direction: column;
}

label {
  margin-top: 10px;
  font-size: 20px;
}

input[type="text"],
input[type="number"],
textarea {
  margin-bottom: 10px;
  padding: 5px;
  font-size: 20px;
  font-style: bold;
  border: 1px solid #ccc;
  border-radius: 4px;
}

select {
  margin-bottom: 10px;
  font-size: 15px;
  font-style: bold;
  padding: 5px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

button[type="submit"] {
  margin-top: 10px;
  padding: 10px;
  background-color: #4caf50;
  color: white;
  border: none;
  border-radius: 4px;
  height: 40px;
  cursor: pointer;
}
.header{
  background-color: #16a085;
  height: 50px;
  top: 0;
  position: sticky;
  display:flex;
  justify-content:right;
  align-items: center;


}
.header a{
  color:black;
  font-size:25px;
  margin-right: 100px;
  text-decoration:none;
  font-weight:700;
  
}
.header a:hover{
  font-size:28px;
  transition: all 0.3s ease-in;
}
.header i{
  margin-right:1000px;
  font-size:22px;
  color: rgb(149, 37, 37);
}

  </style>
  </head>
  <body>
    <div class="header">
    <i class="fas fa-heartbeat">Divine Hospital</i>
      <a href="index.php">Home</a>
      <a href="logout.html" id="logout">Logout</a>
     
      
    </div>
    <?php if(isset($_SESSION['message'])) : ?>
                    <h5 class="alert alert-success"><?= $_SESSION['message']; ?></h5>
                <?php 
                    unset($_SESSION['message']);
                    endif; 
                ?>
    <div class="form-container">
      <h1 id="h1">Add New Patient</h1>
      <form id="add-patient-form" method="post" action="patient_data.php">
        <label for="patient-name">Patient Name:</label>
        <input type="text" id="patient-name" name="p_name" required />

        <label for="patient-contact">Patient Contact No.</label>
        <input type="number" id="patient-contact" name="p_contact" required />

        <label for="patient-age">Patient Age:</label>
        <input type="number" id="patient-age" name="p_age" required /><br>

        <label for="patient-gender">Patient Gender:</label>
        <select id="patient-gender" name="p_gender" required>
          <option value="">--Please select gender--</option>
          <option value="male">Male</option>
          <option value="female">Female</option>
          <option value="other">Other</option>
        </select>

        
        <label for="patient-blood group">Patient Blood Group:</label>
        <select id="patient-bloodgroup" name="p_bloodgroup" required>
          <option value="">--Please select Bloodgroup--</option>
          <option value="A+ve">A+ve</option>
          <option value="A-ve">A-ve</option>
          <option value="B+ve">B+ve</option>
          <option value="B-ve">B-ve</option>
          <option value="AB+ve">AB+ve</option>
          <option value="AB-ve">AB-ve</option>
          <option value="O+ve">O+ve</option>
          <option value="O-ve">O-ve</option>
        </select>

        <label for="patient-city">Patient City:</label>
        <input type="text" id="patient-city" name="p_city" required>

        <label for="meeting_with">meeting_with</label>
        <select id="meeting_with" name="meeting_with" required>
          <option value="">--Please select meeting_with--</option>
          <option value="Dr.Priyank Viradiya">Dr.Priyank Viradiya</option>
          <option value="Dr.Mihir Rupapara">Dr.Mihir Rupapara</option>
          <option value="Dr.Meet kalathiya">Dr.Meet kalathiya</option>
          <option value="Dr.Jatin Sojitra">Dr.Jatin Sojitra</option>
          <option value="Dr.Bhakti Sukhadiya">Dr.Bhakti Sukhadiya</option>
          <option value="Dr.Deep Manani">Dr.Deep Manani</option>
          </select>

        <button type="submit" name="patient_data_btn">Add Patient</button>
      </form>
    </div>
  </body>

  <script>
    const logoutButton = document.getElementById('logout');

logoutButton.addEventListener('click', (event) => {
	event.preventDefault();
	
	// show confirmation dialog
	if (confirm('Are you sure you want to logout?')) {
		// user clicked OK, perform logout
		window.location.href = 'index.php';
	}
});

  </script>


</html>
