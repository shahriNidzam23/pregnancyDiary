function login(data){
	var username = $("#" +  data + "User").val(), password = $("#" +  data + "Pw").val(), page, type;
	switch(data){
		case'p':
			type = 'patient';
			page = "profile.php?ic=" + username;
			break;
		case 'd':
			type = 'doctor';
			page = "doctor.php";
			break;
		case 'a':
			type = 'admin';
			page = "admin-appointment.php";
			break;
		default:
			console.log("error");
			break;
	}

	var obj = {username: username, password: password, type: type, page: page};
	console.log(obj);
	if(!validate(obj)){
		loginApi(obj);
	} else {
		$("#errText").html("Please Enter All Input");
	}
}

function loginApi(objs){
	console.log(objs.page);
    $.ajax({
        type: "POST",
        url: 'api/index-api.php',
        dataType: 'json',
        data: { functionname: 'login', data: objs },

        success: function(obj, textstatus) {
        	if(obj == "OK"){
				document.location.href = objs.page;
        	} else if(obj == "no user"){
				$("#errText").html("Wrong Username/Password");
        	}
        },
        error: function(err) {
            console.log(err.responseText);
        }
    });
}