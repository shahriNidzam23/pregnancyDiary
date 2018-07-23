var temp = [], ic, doctorArr = [], prevTimeStamp;

function init(){
	$.ajax({
	        type: "POST",
	        url: 'api/appoinment-api.php',
	        dataType: 'json',
	        data: { functionname: 'getDoctor'},

	        success: function(promise, textstatus) {
	        	doctorArr = promise;
	        	for(var i = 0; i < promise.length; i++){
				    var x = document.getElementById("doctor");
				    var option = document.createElement("option");
				    option.text = promise[i].name;
				    option.value = promise[i].id;
				    x.add(option);
	        	}
	        	console.log(promise);
	        },
	        error: function(err) {
	            console.log(err.responseText);
	        }
	    });
}

function searchPatient(){
	var patientic = $("#patientIC").val();
	var obj = {ic: patientic};
	$("#appointment-table").empty();
	if(!validate(obj)){
		$.ajax({
	        type: "POST",
	        url: 'api/appoinment-api.php',
	        dataType: 'json',
	        data: { functionname: 'readPatientAppoinment', data: obj},

	        success: function(promise, textstatus) {
	        	if(promise == "no user"){
					ic = "";
	    			$("#errText").html("Patient Not Exist");
	    			$("#errText").css("color", "red");
	        	} else {
				ic = patientic;
		    			temp = promise;
					if(promise[0].time){
		    			$("#errText").html(promise.length +  " Appointment Found");
		    			console.log(promise);
	    				drawTable(promise);
					} else {
		    			$("#errText").html("0 Appointment Found");
					}
					//setTimeout(function(){ $("#errText").html(""); }, 10000);
		    		$("#errText").css("color", "green");
	        	}
	        },
	        error: function(err) {
	            console.log(err.responseText);
	        }
	    });
	} else {
		ic = "";
	    $("#errText").html("Please Enter Patient IC Number");
		$("#errText").css("color", "red");

	}
}

function saveReport(){
	var data = getObject();
	if(!validate(data)){
	    $.ajax({
	        type: "POST",
	        url: 'api/appoinment-api.php',
	        dataType: 'json',
	        data: { functionname: 'addAppointment', data: data},

	        success: function(obj, textstatus) {
	        	console.log(obj);
	        	if(!(obj.toString().includes("Error:"))){
	    			$("#patientIC").val(ic);
					searchPatient();
	        	}
	        },
	        error: function(err) {
	            console.log(err.responseText);
	        }
	    });
	} else {
		var modalObj = {title: "modal-title", body: "modal-body", id: "modal-id", titleText: "Error", bodyText: "Please Enter Required Input"};
		modal(modalObj);
	}
	console.log("save");
}

function updateReport(){
	console.log(getObject());
	var data = getObject();
	data.prevTimeStamp = prevTimeStamp;
	if(!validate(data)){
	    $.ajax({
	        type: "POST",
	        url: 'api/appoinment-api.php',
	        dataType: 'json',
	        data: { functionname: 'updateAppointment', data: data},

	        success: function(obj, textstatus) {
	        	console.log(obj);
	        	if(obj == 1){
	    			$("#patientIC").val(ic);
	    			searchPatient();
					$("#add-new-modal").modal("hide");
	        	}
	        },
	        error: function(err) {
	            console.log(err.responseText);
	        }
	    });
	} else {
		var modalObj = {title: "modal-title", body: "modal-body", id: "modal-id", titleText: "Error", bodyText: "Please Enter Required Input"};
		modal(modalObj);
	}

	console.log("update");
}

function deleteReport(){
	var data = getObject();
    $.ajax({
        type: "POST",
        url: 'api/appoinment-api.php',
        dataType: 'json',
        data: { functionname: 'deleteAppointment', data: data},

        success: function(obj, textstatus) {
        	console.log(obj);
    			$("#patientIC").val(ic);
    			searchPatient();
				$("#add-new-modal").modal("hide");
        },
        error: function(err) {
            console.log(err.responseText);
        }
    });
	console.log("delete");
}

function drawTable(obj){
    for (var i = (obj.length - 1); i >= 0; i--) {
    	var color, icon;
	    var d = new Date();

    	if(obj[i].time > d.getTime()){
    		icon = "fa fa-times";
    		color = "color: red";
    	} else {
    		icon = "fa fa-check";
    		color = "color: green";
    	}

    	var html = '<tr onclick="openModal(' + (i + 1) + ')">' +
        '<td>' + formatDateDB(parseInt(obj[i].time)) + '</td>' + 
        '<td>' + obj[i].name + '</td>' +
        '<td>' + obj[i].mName + '</td>' +
        '<td>' + obj[i].week + '</td>' +
        '<td>' + formatTime(parseInt(obj[i].time)) + '</td>' +
        '<td>' + obj[i].location + '</td>' +
        '<td><i class="' + icon + '" aria-hidden="true" style="' + color + '"></i></td></tr>';

        if(obj.length == 1){
        	$("#appointment-table").prepend(html);
        } else {
       		$("#appointment-table").append(html);
        }


		$("#add-new-modal").modal("hide");
    }
}

function openModal(data){
	if(ic){
		if(data){
			data--;
			prevTimeStamp = temp[data].time;
			var dateTemp = new Date(parseInt(temp[data].time));

			var dateTaken = new Date(dateTemp.toString("MMM dd yyyy"));
			var day = ("0" + dateTaken.getDate()).slice(-2);
			var month = ("0" + (dateTaken.getMonth() + 1)).slice(-2);

			var formatted = dateTaken.getFullYear()+"-"+(month)+"-"+(day);
			$("#patient").val(temp[data].mName);
			$("#week").val(temp[data].week);
			$("#date").val(formatted);
			$("#time").val(formatTime(parseInt(temp[data].time)));
			$("#doctor").val(temp[data].id);
			$("#location").val(temp[data].location);
			$("#doc-button").hide();
			$("#update-doc-button").show();
			$("#delete-doc-button").show();
			$("#add-title").html("View Appointment");
		} else {
			var dateTemp = temp[0].datePregnant;
			var reDate = dateTemp.charAt(3) + dateTemp.charAt(4) + "/" + dateTemp.charAt(0) + dateTemp.charAt(1) + "/" +dateTemp.charAt(6) + dateTemp.charAt(7) + dateTemp.charAt(8) + dateTemp.charAt(9); 
			var dateTaken = new Date(reDate);
			var currentDate = new Date();

			$("#patient").val(temp[0].mName);
			$("#week").val(currentDate.getWeek() - dateTaken.getWeek());
			$("#date").val("");
			$("#time").val(formatTime(parseInt("")));
			$("#doctor").val("");
			$("#location").val("");
			$("#add-title").html("Add New Appointment");
			$("#doc-button").show();
			$("#update-doc-button").hide();
			$("#delete-doc-button").hide();
		}
		document.getElementById("patient").disabled = true;
		document.getElementById("week").disabled = true;
		$("#add-new-modal").modal("show");
	} else {
		var modalObj = {title: "modal-title", body: "modal-body", id: "modal-id", titleText: "Error", bodyText: "Please Enter Patient IC"};
		modal(modalObj);
	}
}

function getObject(){
	var timeTemp = new Date($("#date").val() + " " + $("#time").val());
	var docName;
	for(var i = 0; i < doctorArr.length; i++){
		if($("#doctor").val() == doctorArr[i].id){
			docName = doctorArr[i].name;
		}
	}

	var data = {
		ic: ic,
		doctor: $("#doctor").val(),
		mName: $("#patient").val(),
		name: docName,
		week: $("#week").val(),
		time: timeTemp.getTime(),
		location: $("#location").val(),
		timeStamp: $("#time").val(),
		date:formatDateDB($("#date").val())
	};

	return data;
}

function formatDateDB(newDate){
	var dateTaken = new Date(newDate);

	var day = ("0" + dateTaken.getDate()).slice(-2);
	var month = ("0" + (dateTaken.getMonth() + 1)).slice(-2);

	return (day)+"/"+(month)+"/"+dateTaken.getFullYear();
}

function formatTime(newDate){
	var dateTaken = new Date(newDate);
    return ("0" + (dateTaken.getHours())).slice(-2) + ":" + ("0" + (dateTaken.getMinutes())).slice(-2);
}


Date.prototype.getWeek = function() {
    var onejan = new Date(this.getFullYear(), 0, 1);
    return Math.ceil((((this - onejan) / 86400000) + onejan.getDay() + 1) / 7);
}

function email(){
	$.ajax({
    type: "POST",
    url: 'api/appoinment-api.php',
    dataType: 'json',
    data: { functionname: 'sendEmail', data: {ic:"961009137178"}},

	    success: function(promise, textstatus) {
	    	console.log(promise);
	    },
	    error: function(err) {
	        console.log(err.responseText);
	    }
	});
}