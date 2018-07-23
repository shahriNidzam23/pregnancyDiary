function searchPatient(){
	var patientic = $("#patientIC").val();
	var obj = {ic: patientic};
	if(!validate(obj)){
		$.ajax({
	        type: "POST",
	        url: 'api/doctor-api.php',
	        dataType: 'json',
	        data: { functionname: 'searchPatient', data: obj},

	        success: function(promise, textstatus) {
	        	if(promise == "OK"){
	        		$("#errText").html("");
					window.open(
					  "profile.php?ic=" + obj.ic,
					  '_blank' // <- This is what makes it open in a new window.
					);
	        	} else if(promise == "no user") {
	        		$("#errText").html("Cannot Find Patient");
	        	}
	        },
	        error: function(err) {
	            console.log(err.responseText);
	        }
	    });
	} else {
	    $("#errText").html("Please Enter Patient IC Number");
	}
}

function routeToPatient(){
	if(!(patientic == "" || patientic == null)){
	} else {
		console.log("no data");
	}
}