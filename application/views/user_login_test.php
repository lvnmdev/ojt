<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
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

h1 {
  font-size: 4rem;
  color: #fff;
  text-align: center;
  white-space: nowrap;
  margin-bottom: 25px;
}

.button {
  display: block;
  margin: 0 auto;
  top: 40%;
  height: 2.5rem;
  padding-top: 1.3rem;
  width: 15rem;
  text-align: center;
  color: #fff;
  border: #fff solid 0.2rem;
  font-size: 1rem;
  font-weight: bold;
  text-transform: uppercase;
  text-decoration: none;

}

.split.left .button:hover {
  background-color: var(--left-button-hover-color);
  border-color: var(--left-button-hover-color);
}

.split.right .button:hover {
  background-color: var(--right-button-hover-color);
  border-color: var(--right-button-hover-color);
}

.container {
  position: relative;
  width: 100%;
  height: 100%;
  background: var(--container-bg-color);
}

.split {
  position: absolute;
  width: 50%;
  height: 100%;
  overflow: hidden;
}

.split-inner {
    position: absolute;
    top: 20%;
    left: 50%;
    transform: translateX(-50%);
}

.split.left {
  left:0;
  background: url('assets/img/student.jpg') center center no-repeat;
  background-size: cover;
}

.split.left:before {
  position:absolute;
  content: "";
  width: 100%;
  height: 100%;
  background: var(--left-bg-color);
}

.split.right {
  right:0;
  background: url('assets/img/company.jpg') center center no-repeat;
  background-size: cover;
}

.split.right:before {
  position:absolute;
  content: "";
  width: 100%;
  height: 100%;
  background: var(--right-bg-color);
}

.split.left, .split.right, .split.right:before, .split.left:before {
  transition: var(--speed) all ease-in-out;
}

.hover-left .left {
  width: var(--hover-width);
}

.hover-left .right {
  width: var(--other-width);
}

.hover-left .right:before {
  z-index: 2;
}


.hover-right .right {
  width: var(--hover-width);
}

.hover-right .left {
  width: var(--other-width);
}

.hover-right .left:before {
  z-index: 2;
}

@media(max-width: 800px) {
  h1 {
    font-size: 2rem;
  }

  .button {
    width: 12rem;
  }
}

@media(max-height: 700px) {
  .button {
    top: 70%;
  }
}

strong { 
	position: absolute;
	color: #fff;
  top: 10%;
  z-index: 9999;
  width: 100%;
  text-align: center;
  font-size: 36px;
 }

form { margin-bottom: 25px; }
form input{    
  margin-bottom: 10px;
  text-indent: 5px;
  background-color: transparent;
  -webkit-text-fill-color: #1a1751;
  border: none;
  border-bottom: 2px solid whitesmoke;
  padding: 5px;
  width: 100%;
  font-size: 1.25em;

  }

</style>
<body>
	<div class="container">
	<strong>USTP Online OJT Application</strong>
	  <div class="split left">
      <div class="split-inner">
  	    <h1>Login</h1>
        <form>
            <input type="" name="" placeholder="username">
            <input type="" name="" placeholder="password">
        </form>
  	    <a href="<?= base_url('/main/login');?>" class="button">Enter</a>
      </div>
	  </div>
	  <div class="split right">
      <div class="split-inner">
  	    <h1>Register</h1>
        <form>
          <input class="min-form" type="text" name="username" placeholder="Username">
          <input class="min-form" type="email" name="email" placeholder="Email">
          <input class="min-form" type="password" name="password" placeholder="Password">
          <input class="min-form" type="password" name="repassword" placeholder="Confirm Password">
        </form>
  	    <a href="<?= base_url('/main/login');?>" class="button">Submit</a>
      </div>
	  </div>
	</div>

<script>

const left = document.querySelector(".left");
const right = document.querySelector(".right");
const container = document.querySelector(".container");

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