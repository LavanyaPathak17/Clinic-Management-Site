<?php
require("./admin/connection.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">

		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Task1</title>
		<link rel="stylesheet" type="text/css" href="task1.css">

	
    <script>
        // JavaScript functions to control popups
        function openPopup(popupId) {
            document.getElementById(popupId).style.display = "block";
        }

        function closePopup(popupId) {
            document.getElementById(popupId).style.display = "none";
        }
    </script>

	</head>
	<body>
		<nav>
			<div class="logo">
				<a href="#"><img src="./pictures/logo.jpg" alt="logo"> <b> Doctor </b> </a>
			</div>
			<ul class="menu">

			<?php
        $stmt = $conn->prepare("SELECT * FROM navigation_tbl");
        $stmt->execute();
        $result = $stmt->get_result();
        $users = $result->fetch_all(MYSQLI_ASSOC);

        foreach ($users as $user) {
            if ($user['name'] === 'Login' || $user['name'] === 'LOGIN' || $user['name'] === 'login' ) {
                echo '<li><a class="nav-links" href="#" onclick="openPopup(\'login-popup\')">LOGIN</a></li>';
            } elseif ($user['name'] === 'Register' || $user['name'] === 'REGISTER' || $user['name'] === 'register') {
                echo '<li><a class="nav-links" href="#" onclick="openPopup(\'register-popup\')">REGISTER</a></li>';
            } else {
                // Default case for regular links
                echo '<li><a class="nav-links" href="#'.strtolower($user['name']) . '">' . strtoupper($user['name']) . '</a></li>';
            }
        }
        ?>
			</ul>

			<div class ="hamburger"> 
				<span class="bar"></span>
				<span class="bar"></span>
				<span class="bar"></span>
				</div>
		</nav>

		<div class="home">
			<div class="left">
				<div id="heading"> 
				<?php
                 $stmt = $conn->prepare("SELECT * FROM banner_tbl");
				 $stmt->execute();
				 $result = $stmt->get_result();
				 $users = $result->fetch_assoc();
				 
				 echo "<b> {$users['heading']} </b>";
				 ?>
				
			 </div>
				<div class="homecontent"> 
					
				<?php
                 $stmt = $conn->prepare("SELECT * FROM banner_tbl");
				 $stmt->execute();
				 $result = $stmt->get_result();
				 $users = $result->fetch_assoc();
				 
				 echo "<p> {$users['content']} </p>";
			      ?>
			
			</div>

				<div class = "buttons"> 
					<button class="btn1"> Learn More </button>
					<button class="btn2" onclick="window.location.href = '#seg2';"> Appointment </button>
				</div>
			</div>

			<?php 
			$stmt = $conn->prepare("SELECT image FROM banner_tbl LIMIT 1"); // Adjust query as needed
			$stmt->execute();
			$result = $stmt->get_result();
			$imageData = $result->fetch_assoc();
			$imagePath = $imageData['image'] ?? 'default_image.jpg'; // Use a default image if not found
			?>

            <div class="right">
			<img src="./admin/banner_images/<?php echo htmlspecialchars($imagePath); ?>" alt="homepage"> 
			</div>

		</div>

		<section id = "firstsec">
		<div class="content"> 
			<div class="topichead"> About Tele Health</div>
			<div class="seccontent"> Telehealth revolutionizes healthcare by providing convenient, remote access to medical services through digital platforms. It ensures timely, efficient, and personalized care from the comfort of your home  </div>
		</div>

		<div class="lrsegments">

		<div class="left2">
		<img src ="pictures/sec2img1.jpg" class="checkup" alt="img2">    
		</div>

		<div class ="right2">
		<div class="topichead"> Our Team Always Ready to Receive Your Call 24/7  </div>
		<div class="seccontent2"> Our state-of-the-art telehealth website is available 24/7, offering unparalleled access to healthcare services anytime, anywhere. Whether you need to book an appointment or consult with a healthcare professional, our platform is meticulously designed to provide seamless support and convenience around the clock. 

</div>
		<div class ="listcontain">
			<ul class ="listing">
				<li>Award Winning world wide teleheath service</li>
				<li>Virtual video call or phone call at any time</li>
				<li>Ready ambulance for emergency</li>
				<li>Professional medical doctors</li>
			</ul>
		</div>
		</div>
		</div>

		<div class="lrsegments" id="seg3"> 
			<div class ="left2">
				<div class="topichead"> Our Medical Doctors Are Highly Professional </div>
				<div class="seccontent2"> <p> Our medical doctors epitomize professionalism and expertise, bringing a wealth of experience and dedication to every consultation. Each physician is meticulously selected for their exceptional qualifications, compassionate care, and commitment to excellence. </p> <br>
					<p>  With a deep understanding of diverse medical fields, our doctors are equipped to provide accurate diagnoses, personalized treatment plans, and insightful guidance. </p> 
					</div>

					<div class = "buttons"> 
					<button class="btn1"> Doctor List </button>
					<button class="btn2"> Free Consultant </button>
				</div>
			</div>
		<div class ="right3">
			<img src ="pictures/sec2img2.jpg"  alt="img3">  
		</div>
			</div>
		</section>


		<section id="secondsec">
			<div class="content" id="xyz"> 
				<div class="topichead"> Our Core Services</div>
				<div class="seccontent">We offer comprehensive telehealth solutions and our services are designed to provide seamless and efficient care for your medical needs </div>
			</div>

			<div class="grid-container">

				<div class="card">

					<div class="cardicon">
						<img class="cardimg" src="./pictures/tele.jpg" alt="icon1">
					</div>

					<div class="cardcontent">
						<div class="cardtitle"> Tele Prescription </div>
						<div class="carddesc"> Our Tele Prescription service allows you to receive prescriptions digitally from licensed medical professionals, ensuring timely and convenient access to your medications without the need for in-person visits

</div>
					</div>
					
				</div>

				<div class="card">
					
					<div class="cardicon">
						<img class="cardimg" src="./pictures/psycho.jpg" alt="icon2">
					</div>

					<div class="cardcontent">
						<div class="cardtitle"> Psychotherapy </div>
						<div class="carddesc"> Our psychotherapy services offer confidential, virtual counseling sessions with licensed therapists, providing personalized mental health support and guidance from the comfort of your home </div>
					</div>

				</div>

				<div class="card">
					
					<div class="cardicon">
						<img class="cardimg" src="./pictures/online.jpg" alt="icon3">
					</div>

					<div class="cardcontent">
						<div class="cardtitle"> Online Test Report </div>
						<div class="carddesc"> Our online test report service allows you to access and review your medical test results securely and conveniently through our digital platform </div>
					</div>

				</div>

				<div class="card">
					
					<div class="cardicon">
						<img class="cardimg" src="./pictures/cardiac.jpg" alt="icon4">
					</div>

					<div class="cardcontent">
						<div class="cardtitle"> Cardiac Guidelines </div>
						<div class="carddesc"> Our cardiac guidelines provide comprehensive recommendations for managing heart health, including preventive measures, treatment options, and lifestyle adjustments </div>
					</div>

				</div>

				<div class="card">

					<div class="cardicon">
						<img class="cardimg" src="./pictures/flu.jpg" alt="icon5">
					</div>

					<div class="cardcontent">
						<div class="cardtitle"> Flu Prevention </div>
						<div class="carddesc"> Our flu prevention services offer expert advice and strategies to reduce your risk of influenza, including vaccination information and lifestyle tips to keep you and your family healthy  </div>
					</div>

				</div>

				<div class="card">
					
					<div class="cardicon">
						<img class="cardimg" src="./pictures/gynae.jpg" alt="icon6">
					</div>

					<div class="cardcontent">
						<div class="cardtitle"> Gynaecology Care </div>
						<div class="carddesc"> Our gynecology care services provide expert, compassionate support for women's reproductive health, including routine exams, consultations, and personalized treatment plans </div>
					</div>

				</div>
		</section>


		<section id = "thirdsec">
			

			<div class="lrsegments">

		<div class="left2">
		<img src ="./pictures/sec3img1.jpg" class="checkup" alt="img3">    
		</div>

		<div class ="right2">
			<div class="topichead"> Checkup Your Health With Teleheath Solution </div>
			<div class="seccontent2">Checkup your health with our telehealth solutions for convenient, remote access to comprehensive medical care </div>
			<div class ="listcontain">
				<ul class ="listing">
					<li> Reduces Your Whole Health Care Cost </li>
					<li>Fully Secure Live Video Chat Facility</li>
					<li>Monthly Free One E-Consultation Sessions</li>
					<li>Attractive Package For Diabetic Patient</li>
				</ul>
			</div>
		</div>
		</div>

		<div class="lrsegments" id="seg2"> 
		<div class ="left2">
        <div class="topichead"> Make Appointment</div>
        
        <div class="form-container"> 

            <div class="formhead">
                <input type="text" placeholder="Name" name="name">
            </div>
            <div class="formhead">
                <input type="text" placeholder="Email" name="email">
            </div>
            <div class="formhead">
                <input type="text" placeholder="Mobile No" name="mobile">
            </div>
            <div class="formhead">
                <select id="category" required>
                    <option value="" disabled selected>Choose Category</option>
                    <option value="GY">Gynaecology</option>
                    <option value="CY">Cardiology</option>
                    <option value="NY">Neurology</option>
                    <option value="OD">Orthopedic Doctor</option>
                    <option value="GP">General Physician</option>
                    <option value="PY">Psychology</option>
                </select>
            </div>
            <div class="formhead">
                <select id="doctor" required>
                    <option value="" disabled selected>Choose Doctor</option>
                </select>
            </div>
            <div class="formhead">
                <input type="date" placeholder="Appointment Date">
            </div>

			<div class="formhead">
    <select id="time" required>
        <option value="" disabled selected>Choose Time</option>
        <option value="09:00">09:00 AM</option>
        <option value="10:00">10:00 AM</option>
        <option value="11:00">11:00 AM</option>
        <option value="12:00">12:00 PM</option>
        <option value="14:00">02:00 PM</option>
        <option value="15:00">03:00 PM</option>
        <option value="16:00">04:00 PM</option>
        <option value="17:00">05:00 PM</option>
    </select>
</div>


            <div class="lasthead">
                <button class="btnform" name="confirm-apt">Confirm Appointment </button>  
            </div>
        </div>
    </div>
		<div class ="right4">
			<img src ="pictures/sec3img2.jpg" alt="img2" id="appoint">  
		</div>
			</div>
		</section>

		<div class = "slogan">

		<div class ="people">
			<img src="./pictures/slogan.png" alt="people">
		</div>
		<div class = "slogandesc">
		<div class = topichead>
			Call us any emergency situation. <br>
			We are active 24/7 to help you. <br>
			<hr id="line">
			</div>
			<p id="tollfree"> Toll free no : +667 6230991  </p>
				</div>

			</div>


			<?php include('login.php'); ?>
			<?php include('register.php'); ?>
			
			<footer>
				<div class="footercontent">
				<div class="bottom">
				<div class="footheading">
					<div class="foottitle"> About </div>
					<div class="footabout">
						We always try to give our best quality guidence for our all clients. So they will success and grow business well. Lorem ipsum dolor sit
						
							
						<div class="socials">
							<div class="socialsimg">
								<a href="#"> <img src="./pictures/linkedin.jpg"></a>
							</div>
							<div class="socialsimg">
								<a href="#"> <img src="./pictures/facebook.jpg"></a>
							</div>
							<div class="socialsimg">
								<a href="#"> <img src="./pictures/twitter.jpg"></a>
							</div>
							<div class="socialsimg">
								<a href="#"> <img src="./pictures/pinterest.jpg"></a>
							</div>
						</div>
						
					</div>
				</div>

				<div class="footheading">
				<div class="foottitle">  Services </div>  
				<div class="footabout">
					<ul>
						<li class="footlist">Tele Prescription</li>
						<li class="footlist">Emergency Unit</li>
						<li class="footlist">Pregnancy Care</li>
						<li class="footlist">Online Test Report</li>
						<li class="footlist">Ambulance Service</li>
					</ul>
				</div> 
				</div>

				<div class="footheading"> 
					<div class="foottitle">  Support  </div>  
				<div class="footabout">
					<ul>
						<li class="footlist">Documentation</li>
						<li class="footlist">Product</li>
						<li class="footlist"><span>Reporting Issue</span></li>
						<li class="footlist">Terms & Conditions</li>
						<li class="footlist">Privacy Policy</li>
					</ul>
				</div> 
			</div>
				<div class="footheading">
					<div class="foottitle">  Quick Links </div>  
					<div class="footabout">
						<ul>
							<li class="footlist">Home</li>
							<li class="footlist">About</li>
							<li class="footlist">Services</li>
							<li class="footlist">News</li>
							<li class="footlist">Contact</li>
						</ul>
					</div> 
				</div>
				</div>

				<div class="copyright">
				&copy; 2020- Lala by AwesomeThemez. All Rights Reserved.
			</div>
				</div>

			</footer>

            <script > 
			
			const hamburger = document.querySelector(".hamburger");
const menu = document.querySelector(".menu");

hamburger.addEventListener("click", ()=>{
    hamburger.classList.toggle("active");
    menu.classList.toggle("active");
})

document.querySelectorAll(".nav-links").forEach(n => n.addEventListener("click", ()=> {
hamburger.classList.remove("active");
menu.classList.remove("active");
}))

const doctorsByCategory = {
            GY: [{ value: "Ms. Smitha", text: "Ms. Smitha" }, { value: "Ms. Alice", text: "Ms. Alice" }],
            CY: [{ value: "Mr. Brown", text: "Mr. Brown" }, { value: "Mr. Davis", text: "Mr. Davis" }],
            NY: [{ value: "Ms. Wilson", text: "Ms. Wilson" }],
            OD: [{ value: "Mr. Taylor", text: "Mr. Taylor" }, { value: "Mr. Anderson", text: "Mr. Anderson" }],
            GP: [{ value: "Mr. Thomas", text: "Mr. Thomas" }, { value: "Mr. Jackson", text: "Mr. Jackson" }],
            PY: [{ value: "Ms. White", text: "Ms. White" }, { value: "Mr. Harris", text: "Mr. Harris" }]
        };

        document.getElementById('category').addEventListener('change', function () {
            const category = this.value;
            const doctorSelect = document.getElementById('doctor');
            doctorSelect.innerHTML = '<option value="" disabled selected>Choose Doctor</option>';

            if (category && doctorsByCategory[category]) {
                doctorsByCategory[category].forEach(doctor => {
                    const option = document.createElement('option');
                    option.value = doctor.value;
                    option.textContent = doctor.text;
                    doctorSelect.appendChild(option);
                });
            }
        });

        document.querySelector('button[name="confirm-apt"]').addEventListener('click', function (event) {
            event.preventDefault();

            const name = document.querySelector('input[name="name"]').value;
            const email = document.querySelector('input[name="email"]').value;
            const mobile = document.querySelector('input[name="mobile"]').value;
            const category = document.getElementById('category').value;
            const doctor = document.getElementById('doctor').value;
            const date = document.querySelector('input[type="date"]').value;
            const time = document.getElementById('time').value;

            if (!name || !email || !mobile || !category || !doctor || !date || !time) {
                alert('Please fill in all fields');
                return;
            }

            window.location.href = `book-apt.php?name=${name}&email=${email}&mobile=${mobile}&category=${category}&doctor=${doctor}&date=${date}&time=${time}`;
        });
			
			
			
			</script>
		

	</body>
</html>