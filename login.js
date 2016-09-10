$('#insertType').click(function(){
	$('#registerForm').show();
});

$('#registerNav').click(function(){
  $(this).toggleClass('green');
  $('#loginForm').hide();
  $('#registerForm').show();
});

$('#loginNav').click(function(){
  $(this).toggleClass('green');
  $('#registerForm').hide();
  $('#loginForm').show();
  $(this).toggleClass('#1abc9c');
});

function registerMe(event){
	var username,
	password;

	username = $("#username").val();
	password = $("#password").val();
	confirmPassWord = $("#confirmPassWord").val();

	var registerData = {"username": username,"password":password};

	event.preventDefault();
	if(password.length <8 || password != confirmPassWord){
		var notify = $("#notification")[0];
		$("#password").val('');
		$("#confirmPassWord").val('');
		notify.style.color = "red";
		notify.innerText = "Password less than 8 character or mismatching";
		notify.style.display = "block";
		setTimeout(function() { $("#notification").fadeOut(); }, 4000);
	}else if(username == ""){
		$("#username")[0].style.color = "red";
		$('#username').val("username mandatory");
	}
	else{
		// $("#username")[0].style.color = "black";
		if($("#insertType").val() == "plainPHP"){
			$.ajax({
				type: "POST",
		    	url: "http://localhost/plain-insert-php/insertIntoDB.php",
		    	data: registerData,
		    	success: onRegisterSuccess,
		    	error: function(error){
		    		console.log("registration failed")
		    	}
			});
		}
		else if($("#insertType").val() == "plainProcedure"){
			$.ajax({
				type: "POST",
		    	url: "http://localhost/plain-insert-procedure/insertIntoDB.php",
		    	data: registerData,
		    	success: onRegisterSuccess,
		    	error: function(error){
		    		console.log("registration failed")
		    	}
			});
		}
		else if($("#insertType").val() == "hashPHP"){
			$.ajax({
				type: "POST",
		    	url: "http://localhost/hash-insert-php/insertIntoDB.php",
		    	data: registerData,
		    	success: onRegisterSuccess,
		    	error: function(error){
		    		console.log("registration failed")
		    	}
			});
		}
		else if($("#insertType").val() == "hashProcedure"){
			$.ajax({
				type: "POST",
		    	url: "http://localhost/hash-insert-procedure/insertIntoDB.php",
		    	data: registerData,
		    	success: onRegisterSuccess,
		    	error: function(error){
		    		console.log("registration failed")
		    	}
			});
		}
		
	}
}

function onRegisterSuccess(result){
	
	if (result <10){
		notify("error");
		
	}else{
		$("#insertType").hide();
		$("#registerNav").hide();
		$("#registerForm")[0].reset();
		$("#registerForm").hide();
		$("#loginNav").show();
		notify("success");
		$("#loginForm").show();
		$("#loginForm")[0].reset();
				
	}
}

function notify(param){
	if(param == "error"){
		var notify = $("#notification")[0];
		$("#registerForm")[0].reset()
		notify.style.color = "red";
		notify.innerText = "Registration Failed";
		notify.style.display = "block";
		setTimeout(function() { $("#notification").fadeOut(); }, 4000);
	}else if (param == "success"){
		var notify = $("#notification")[0];
		notify.style.color = "green";
		notify.innerText = "Registration successful";
		notify.style.display = "block";
		setTimeout(function() { $("#notification").fadeOut(); }, 4000);
	}else if(param == "Login Error"){
		var notify = $("#notification")[0];
		$("#loginForm")[0].reset();
		notify.style.color = "red";
		notify.innerText = "Login Failed";
		notify.style.display = "block";
		setTimeout(function() { $("#notification").fadeOut(); }, 4000);
	}else if (param == "Login Success"){
		var notify = $("#notification")[0];
		$("#registerForm")[0].reset();
		notify.style.color = "green";
		notify.innerText = "Login successful";
		notify.style.display = "block";
		setTimeout(function() { $("#notification").fadeOut(); }, 4000);
		$("#registerNav").show();
		$("#loginNav").hide();
		$("#loginForm").hide();

	}
	
}

function loginMe(param){
	var username,
	password;

	username = $("#usernameLogin").val();
	password = $("#passwordLogin").val();

	var loginData = {"username": username,"password":password};
	event.preventDefault();

	if(username!= "" || password != ""){
		if($("#insertType").val() == "plainPHP"){
			$.ajax({
				type: "POST",
		    	url: "http://localhost/plain-insert-php/validation.php",
		    	data: loginData,
		    	success: onLoginSuccess,
		    	error: function(error){
		    		console.log("login failed")
		    	}
			});
		}
		else if($("#insertType").val() == "plainProcedure"){
			$.ajax({
				type: "POST",
		    	url: "http://localhost/plain-insert-procedure/validation.php",
		    	data: loginData,
		    	success: onLoginSuccess,
		    	error: function(error){
		    		console.log("login failed")
		    	}
			});
		}
		else if($("#insertType").val() == "hashPHP"){
			$.ajax({
				type: "POST",
		    	url: "http://localhost/hash-insert-php/validation.php",
		    	data: loginData,
		    	success: onLoginSuccess,
		    	error: function(error){
		    		console.log("login failed")
		    	}
			});
		}
		else if($("#insertType").val() == "hashProcedure"){
			$.ajax({
				type: "POST",
		    	url: "http://localhost/hash-insert-procedure/validation.php",
		    	data: loginData,
		    	success: onLoginSuccess,
		    	error: function(error){
		    		console.log("login failed")
		    	}
			});
		}
	}
}

function onLoginSuccess(result){
	if(result == "1"){
		notify("Login Success");
		$("#insertType").show();
	}else if (result == "-1" || result == "0"){
		$("#insertType").hide();
		notify("Login Error");
	}
}