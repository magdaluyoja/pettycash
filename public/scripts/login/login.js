$("document").ready(function(){
	$("#btn-login").click(function(){
		let username = $("#username").val();
		let password = $("#password").val();
		let user = $U(username, password,"login");
		let output = user.login();
		console.log(output); 
		output = JSON.parse(output);
		if(output.success){
			$("#div-login").hide();
			$("#lbl-welcome").text(`Welcome, ${output.data.NAME}!`);
		}else{

		}
	});
});
	