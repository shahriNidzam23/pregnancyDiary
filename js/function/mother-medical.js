var temp = [];
var idUpdate;
function init(){
    $.ajax({
        type: "POST",
        url: 'api/mother-medical-api.php',
        dataType: 'json',
        data: { functionname: 'readMother', ic: $("#pic").val()},

        success: function(obj, textstatus) {
        	if(!(obj.toString().includes("Error:") || obj.toString().includes("no data"))){
				idUpdate = obj[0].id;
				populateForm(obj[0]);
				$("#saveButton").attr("onclick", "updateReport()");
			} else if(obj.toString().includes("no data")){
				$("#saveButton").attr("onclick", "saveReport()");
			}
        },
        error: function(err) {
            console.log(err.responseText);
        }
    });
}

function saveReport(){
	var data = getObject();
	data.ic = $("#pic").val();
	console.log(data);
	 if(!validate(data)){
	 	if(data.familyPlanning == "yes"){
			data.type = $("#type").val();
			data.duration = '{"' + $("input[name=duration]:checked").val() + '": "' + $("#durationDesc").val() + '"}';
	 	} else {
			data.type = "";
			data.duration = '';
	 	}

	 	console.log(data);
	    $.ajax({
	        type: "POST",
	        url: 'api/mother-medical-api.php',
	        dataType: 'json',
	        data: { functionname: 'insertMother', data: data},

	        success: function(obj, textstatus) {
	        	console.log(obj);
	        	if(!(obj.toString().includes("Error:"))){
	        		data.id = obj;
					var modalObj = {title: "modal-title", body: "modal-body", id: "modal-id", titleText: "Succes", bodyText: "Patient Details Saved"};
					modal(modalObj);
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
}

function updateReport(){
	console.log("update");
	var data = getObject();
	data.ic = $("#pic").val();
	data.id = idUpdate;
	console.log(data);
	if(!validate(data)){
	 	if(data.familyPlanning == "yes"){	
			data.type = $("#type").val();
			data.duration = '{"' + $("input[name=duration]:checked").val() + '": "' + $("#durationDesc").val() + '"}';
	 	} else {
			data.type = "";
			data.duration = '';
	 	}

	    $.ajax({
	        type: "POST",
	        url: 'api/mother-medical-api.php',
	        dataType: 'json',
	        data: { functionname: 'updateMother', data: data},

	        success: function(obj, textstatus) {
	        	console.log(obj);
	        	if(obj == 1){
					$("#saveButton").attr("onclick", "updateReport()");
					var modalObj = {title: "modal-title", body: "modal-body", id: "modal-id", titleText: "Succes", bodyText: "Patient Details Saved"};
					modal(modalObj);
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
}

function deleteReport(){
    $.ajax({
        type: "POST",
        url: 'api/antenatal-screening-api.php',
        dataType: 'json',
        data: { functionname: 'deleteAntenatal', data: idUpdate},

        success: function(obj, textstatus) {
        	console.log(obj);
    			$("#antenatal-screening-table").empty();
    			init();
				$("#add-new-modal").modal("hide");
        },
        error: function(err) {
            console.log(err.responseText);
        }
    });
}

function getObject(){
	var data = {
		periodCycle: $("#periodCycle").val(),
		bloodType: $("#bloodType").val(),
		rh: $("#rh").val(),
		height: $("#height").val(),
		familyPlanning: $("input[name=familyPlanning]:checked").val(),
		disease: JSON.stringify(getCheckboxValue("disease", "diseaseOther")),
		familyDisease: JSON.stringify(getCheckboxValue("diseaseF", "diseaseFOther"))
	};

	return data;
}


function populateForm(data){
	console.log(data);
	$("#periodCycle").val(data.periodCycle);
	$("#bloodType").val(data.bloodType);
	$("#rh").val(data.rh);
	$("#height").val(data.height);

	switch(data.familyPlanning){
		case "yes":
			$("#familyPlanningY").parents("div").addClass('checked');
			$("#familyPlanningY").prop('checked',true);
			break;
		case "no":
			$("#familyPlanningN").parents("div").addClass('checked');
			$("#familyPlanningN").prop('checked',true);
			break
	}

	try{
	var json = JSON.parse(data.duration);
	jQuery.each(json, function(index, item) {
		switch(index){
			case "month":
				$("#durationM").parents("div").addClass('checked');
				$("#durationM").prop('checked',true);
				break;
			case "year":
				$("#durationY").parents("div").addClass('checked');
				$("#durationY").prop('checked',true);
				break
		}

		$("#durationDesc").val(json[index]);
    });
} catch (e){
	//do nothing
}

	$("#type").val(data.type);
	$("#duration").val(data.duration);

	if(data.disease.length){
		passCheckboxValue("disease", "M", JSON.parse(data.disease));
	}

	if(data.familyDisease.length){
		passCheckboxValue("diseaseF", "F", JSON.parse(data.familyDisease));
	}
}

function passCheckboxValue(name, id, arr){
	for(var i = 0; i < arr.length; i++){
		if (!$("#" + id + arr[i]).length) {
			if($("#" + id + arr[i]).val() != ""){
		  		$('#' + name + "Other").val(arr[i]);
			}
		} else {
			$("#" + id + arr[i]).parents("div").addClass('checked');
			$("#" + id + arr[i]).prop('checked',true);
		}
	}

}

function getCheckboxValue(name, other){
	var disease = $('input[name=' + name + ']:checked').map(function() {
    	return this.value;
	}).get();

	if($('#' + other).val() || $('#' + other).val() == ""){
		disease.push($('#' + other).val());
	}

	return disease;
}

$("#familyPlanningN").parents("div").on('classChange', function(){ console.log("lol") });