<?php
    if (isset($_SESSION['username'])){
		$query_app = $this->db->select('*')->from('tbl_applicant_bio')->where('user_name',$_SESSION['username'])->get();
		$query_comp = $this->db->select('*')->from('tbl_company_info')->where('user_name',$_SESSION['username'])->get();
        if ($_SESSION['usertype']==0){ 				//Admin Access Level
            redirect('Admin/dashboard');
		}
		else if ($_SESSION['usertype']==1){ 		//Company Access Level
          	if ($_SESSION['userstatus'] == 2) { 			//Status is active
				if ($query_comp->num_rows() > 0) {
					redirect('Company/dashboard');
				}
				else {
				redirect('Company/require_form');
				}
			}
			else if ($_SESSION['userstatus'] == 1){ 		//Status is pending and not yet activated.
				if ($query_comp->num_rows() > 0) {
					redirect('Main/pending');
				}
				else {
					redirect('Company/require_form');
				}
			}
			else { 											//Status is inactive
				redirect('Main/inactive');
			}
		}
		else {  									//Applicant Access Level
			if ($_SESSION['userstatus'] == 2) { 			//Status is active
				if ($query_app->num_rows() > 0) {
					redirect('Applicant/dashboard');
				}
				else {
					redirect('Applicant/require_form');
				}
			}
			else if ($_SESSION['userstatus'] == 1){ 		//Status is pending and not yet activated.
				if ($query_app->num_rows() > 0) {
					redirect('Main/pending');
				}
				else {
					redirect('Applicant/require_form');
				}
			}
			else { 											//Status is inactive
				redirect('Main/inactive');
			}
        }
    }
?>
<style>
	:root {
  --container-bg-color: #333;
  --left-bg-color: rgba(251,180,20, 0.7);
  --left-button-hover-color: rgba(161, 11, 11, 0.3);
  --right-bg-color: rgba(26, 23, 81, 0.8);
  --right-button-hover-color: rgba(92, 92, 92, 0.3);
  --hover-width: 75%;
  --other-width: 25%;
  --speed: 1000ms;
}

html, body {
  padding:0;
  margin:0;
  font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
  width: 100%;
  height: 100%;
  overflow-x: hidden;
}

h1 { font-size: 4rem; color: #fff; text-align: center; white-space: nowrap; margin-bottom: 25px; }

.button {
  width: inherit;
  margin: 0 auto;
  display: inline-block;
  margin: 0 auto;
  top: 40%;
  padding: 1rem 4rem;
  text-align: center;
  color: #fff;
  border: #fff solid 0.2rem;
  font-size: 3rem;
  font-weight: bold;
  text-transform: uppercase;
}
.button:hover {
  text-decoration: none;
  color: #fff;
  cursor: pointer;
  }

.split.left .button:hover {
  background-color: var(--left-button-hover-color);
  border-color: var(--left-button-hover-color);
}

.split.right .button:hover {
  background-color: var(--right-button-hover-color);
  border-color: var(--right-button-hover-color);
}

.custom-container {
  position: relative;
  width: 100%;
  height: 100%;
  background: var(--container-bg-color);
}

.split       { position: absolute; width: 50%; height: 100%; overflow: hidden; }
.split-inner { position: absolute; top: 20%; left: 50%; transform: translateX(-50%); text-align: center; }

.split.left        { left:0; background: url('assets/img/student.jpg') center center no-repeat; background-size: cover;}
.split.left:before { position:absolute;  content: ""; width: 100%; height: 100%; background: var(--left-bg-color); }

.split.right { right:0; background: url('assets/img/company.jpg') center center no-repeat; background-size: cover;}

.split.right:before { position:absolute; content: ""; width: 100%; height: 100%; background: var(--right-bg-color);}

.split.left,
.split.right,
.split.right:before,
.split.left:before { transition: var(--speed) all ease-in-out;}

.hover-left .left         { width: var(--hover-width); }
.hover-left .right        { width: var(--other-width); }
.hover-left .right:before { z-index: 2; }

.hover-right .right       { width: var(--hover-width); }
.hover-right .left        {  width: var(--other-width); }
.hover-right .left:before { z-index: 2; }

strong { 
	position: absolute;
	color: #fff;
  top: 10%;
  z-index: 9999;
  width: 100%;
  text-align: center;
  font-size: 36px;transition: all 0.5s;
 }
strong span { position: relative; display: inline-block; transition: 0.5s; }
strong span:after, strong span:before {
    position: absolute;
    font-size: 70px;
    top: -30px;
    transition: 0.5s; 
    opacity: 0; 
}
strong span:after { content: '\00bb'; right: -30px; }
strong span:before { content: "\00ab"; left: -30px; }


.hover-left strong span 		  { padding-right: 35px; right: 12%; }
.hover-left strong span:after { right: 0; opacity: 1;}
.hover-right strong span 			  { padding-left: 35px; left: 12%; }
.hover-right strong span:before { left: 0; opacity: 1;}

.hover-left #toaster 		  { left: 38%; }
.hover-right #toaster 		{ left: 64%; }

@media(max-width: 800px) {
  h1 {
    font-size: 2rem;
  }
}

@media(max-height: 700px) {
  .button {
    top: 70%;
  }
}



form { margin-bottom: 25px; }
form input, form select, form button{    
  margin-bottom: 10px;
  text-indent: 5px;
  background-color: transparent;
  -webkit-text-fill-color: #fff;
  border: none;
  border-bottom: 2px solid whitesmoke;
  padding: 5px;
  width: 100%;
  font-size: 1.25em;

  }

</style>

	<body>
		<div class="custom-container">
			<strong><span>USTP | Graduate Tracer</span></strong>
			<div class="split left">
				<div class="split-inner">
					<h1>Login</h1>
					<form id="loginform" method="post">
						<input type="text" name="username" placeholder="Username" required>
						<input type="password" name="password" placeholder="Password" required>
            <div class="form-group"></div>
						<button class="button">login</button>
					</form>
				</div>
			</div>
			<div class="split right">
				<div class="split-inner">
					<h1>Register</h1>
					<form id="regform" method="post">
						<div class='alert alert-success' id="banner-message" style="display:none"></div>

						<input type="text" name="username" placeholder="Username" required>
						<input type="email" name="email" placeholder="Email" required>
						<input type="password" name="password" placeholder="Password" required>
						<input type="password" name="repassword" placeholder="Confirm Password" required>
						<br>
						<br>
						<div class="form-group">
							<label style="color:whitesmoke; float: left;">User Type:</label>
							<br>
							<select name="usertype">
								<option class="form-control" value="2">Student</option>
								<option class="form-control" value="1">Company </option>
							</select>
						</div>
						<button class="button">Submit</button>
					</form>
				</div>
			</div>
		</div>
		<script>
			const left = document.querySelector(".left");
			const right = document.querySelector(".right");
			const container = document.querySelector(".custom-container");

			left.addEventListener("mouseenter", () => {
				container.classList.add("hover-left");
			});

			left.addEventListener("mouseleave", () => {
				container.classList.remove("hover-left");
			});

			right.addEventListener("mouseenter", () => {
				container.classList.add("hover-right");
			});

			right.addEventListener("mouseleave", () => {
				container.classList.remove("hover-right");
			});

		</script>
	</body>

	</html>
