;(function(global, $){
	let User = function(username, password, action){
		return new User.init(username, password, action);
	}
	User.init = function(username, password, action){
		this.action = action || "";
		this.username = username || "";
		this.password = password || "";
		this.validate();
	}

	User.prototype = {
		validate:function(){
			let errmsg = "";
			if(!this.username.replace(/\s/g, '').length){
				errmsg += "Username must not be empty.";
			}
			if(!this.password.replace(/\s/g, '').length){
				errmsg += "Password must not be empty.";
			}
			if(errmsg){
				alert(errmsg);
				return;
			}
		},
		login:function(){
			let userObj = JSON.stringify(this);
			let output;
			$.ajax({
				type: "POST",
				data: {User: userObj},
				url: "../includes/classes/User.php",
				beforeSend:function(){

				},
				success:function(response){
					output = response;
				},
				async: false
			});
			return output;
		}
	}
	User.init.prototype = User.prototype;

	global.User = $U = User;
}(window, $));