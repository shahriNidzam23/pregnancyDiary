function init(){
    $.ajax({
        type: "POST",
        url: 'api/profile-user-api.php',
        dataType: 'json',
        data: { functionname: 'getProfile', data: $("#pic").val()},

        success: function(obj, textstatus) {
        	console.log(obj);
        	if(obj){
        		passToInput(obj[0]);
        	} 
        },
        error: function(err) {
            console.log(err.responseText);
        }
    });
}


function update(){

		var obj = {
			regNum: $("#regNum").val(),
			datePregnant: $("#datePregnant").val(),
			ic: $("#ic").val(),
			dueDate: $("#dueDate").val(),
			email: $("#email").val(),
			email: $("#email").val(),
			cAddress: $("#cAddress").val(),
			mName: $("#mName").val(),
			race: $("#race").val(),
			eduLevel: $("#eduLevel").val(),
			occupation: $("#occupation").val(),
			address: $("#address").val(),
			dob: $("#dob").val(),
			age: $("#age").val(),
			phoneHome: $("#phoneHome").val(),
			phoneMobile: $("#phoneMobile").val(),
			hName: $("#hName").val(),
			hic: $("#hic").val(),
			hWorkplace: $("#hWorkplace").val(),
			hPhone: $("#hPhone").val()
		}


	var boolPassword = false;
	var samePassword = true;
	var emptyPassword = false;
	var passArray = [$("#oldPassword").val(), $("#password").val(), $("#retypePassword").val()];
	if(!oneExist(passArray)){
		if($("#password").val() != $("#oldPassword").val()){
			if($("#password").val() == $("#retypePassword").val()){
				obj.password = $("#password").val();
				obj.oldPassword = $("#oldPassword").val();
			} else {
				boolPassword = true;
			}
		} else {
			if(!($("#password").val() == "" || $("#password").val() == null)){
				samePassword = false;
			}
		}
	} else {
		emptyPassword = true;
	}

	if(!emptyPassword){
		if(samePassword){
			if(!boolPassword){
				if(!validate(obj)){
					console.log("success");
					postUpdate(obj);
				} else {
					var modalObj = {title: "modal-title", body: "modal-body", id: "modal-id", titleText: "Error", bodyText: "Please Enter Required Input (Password is optional)"};
					modal(modalObj);
				}
			} else {
				var modalObj = {title: "modal-title", body: "modal-body", id: "modal-id", titleText: "Error", bodyText: "Password and Retype Password not Match"};
				modal(modalObj);
			}
		} else {
			var modalObj = {title: "modal-title", body: "modal-body", id: "modal-id", titleText: "Error", bodyText: "Old Password and New Password Cannot be The Same"};
			modal(modalObj);
		}
	} else {
		var modalObj = {title: "modal-title", body: "modal-body", id: "modal-id", titleText: "Error", bodyText: "Please Enter Password Input"};
		modal(modalObj);
	}
}

function postUpdate(data){
	if(!data.password){
		data.cpass = "no need";
	} else {
		data.cpass = "need";
	}
	console.log(data)
    $.ajax({
        type: "POST",
        url: 'api/profile-user-api.php',
        dataType: 'json',
        data: { functionname: 'updateProfile', data: data},

        success: function(obj, textstatus) {
        	console.log(obj);
        	if(obj == "1"){
				document.location.href = "profile.php?ic=" + $("#ic").val();
        	} else {
				var modalObj = {title: "modal-title", body: "modal-body", id: "modal-id", titleText: "Error", bodyText: "Wrong Password"};
				modal(modalObj);
        	} 
        },
        error: function(err) {
            console.log(err.responseText);
        }
    });
}

function passToInput(obj){
	$("#regNum").val(obj.regNum);
	$("#datePregnant").val(obj.datePregnant);
	$("#ic").val(obj.ic);
	$("#dueDate").val(obj.dueDate);
	$("#email").val(obj.email);
	$("#cAddress").val(obj.cAddress);
	$("#mName").val(obj.mName);
	$("#race").val(obj.race);
	$("#eduLevel").val(obj.eduLevel);
	$("#occupation").val(obj.occupation);
	$("#address").val(obj.address);
	$("#dob").val(obj.dob);
	$("#age").val(obj.age);
	$("#phoneHome").val(obj.phoneHome);
	$("#phoneMobile").val(obj.phoneMobile);
	$("#hName").val(obj.hName);
	$("#hic").val(obj.hic);
	$("#hWorkplace").val(obj.hWorkplace);
	$("#hPhone").val(obj.hPhone);


	$("#oldPassword").val("");
	$("#password").val("");
	$("#retypePassword").val("");

}