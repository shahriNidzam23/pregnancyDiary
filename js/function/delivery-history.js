var temp = [];
var idUpdate;
function init(){
    $.ajax({
        type: "POST",
        url: 'api/delivery-history-api.php',
        dataType: 'json',
        data: { functionname: 'readHistory', ic: $("#pic").val()},

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
	 if(!validate(data)){
	 	console.log(data);
	    $.ajax({
	        type: "POST",
	        url: 'api/delivery-history-api.php',
	        dataType: 'json',
	        data: { functionname: 'insertHistory', data: data},

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
	    $.ajax({
	        type: "POST",
	        url: 'api/delivery-history-api.php',
	        dataType: 'json',
	        data: { functionname: 'updateHistory', data: data},

	        success: function(obj, textstatus) {
	        	console.log(obj);
	        	if(!(obj.toString().includes("Error:"))){
				$("#saveButton").attr("onclick", "updateReport()");
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

function getObject(){
	var data = {
		dateDelivery: $("#dateDelivery").val(),
		sex: $("#sex").val(),
		pob: $("#pob").val(),
		conductBy: $("#conductBy").val(),
		weight: $("#weight").val(),
		placenta: $("input[name=placenta]:checked").val(),
		spontaneus: JSON.stringify(getCheckboxValue("spontaneous")),
		assistedDelivery: JSON.stringify(getCheckboxValue("delivery")),
		caesaran: JSON.stringify(getCheckboxValue("caesarean")),
		complication: getRadioValue("complications", "otherComplication"),
		bbyCondition: getRadioValue("birth"),
		apgar: $("#apgar").val(),
		abnormallyCongenital: getRadioValue("congenital", "otherCongenital")
	};

	return data;
}


function populateForm(data){
	console.log(data);
	$("#dateDelivery").val(data.dateDelivery);
	$("#sex").val(data.sex);
	$("#pob").val(data.pob);
	$("#conductBy").val(data.conductBy);
	$("#weight").val(data.weight);
	$("#apgar").val(data.apgar);

	if(data.complication){
		switch(data.complication){
			case "pph":
				$("#pphC").parents("div").addClass('checked');
				$("#pphC").prop('checked',true);
				break;
			case "perineal":
				$("#perinealC").parents("div").addClass('checked');
				$("#perinealC").prop('checked',true);
				break;
			default:
				$("#otherC").parents("div").addClass('checked');
				$("#otherC").prop('checked',true);
				$("#otherComplication").val(data.complication);
				break;
		}
	}

	if(data.placenta){
		switch(data.placenta){
			case "complete":
				$("#placentaC").parents("div").addClass('checked');
				$("#placentaC").prop('checked',true);
				break;
			case "incomplete":
				$("#placentaI").parents("div").addClass('checked');
				$("#placentaI").prop('checked',true);
				break
		}
	}

	if(data.bbyCondition){
		switch(data.bbyCondition){
			case "alive":
				$("#aliveB").parents("div").addClass('checked');
				$("#aliveB").prop('checked',true);
				break;
			case "dead":
				$("#deadB").parents("div").addClass('checked');
				$("#deadB").prop('checked',true);
				break
		}
	}

	if(data.abnormallyCongenital){
		switch(data.abnormallyCongenital){
			case "yes":
				$("#yesCon").parents("div").addClass('checked');
				$("#yesCon").prop('checked',true);
				break;
			case "no":
				$("#noCon").parents("div").addClass('checked');
				$("#noCon").prop('checked',true);
				break;
			default:
				$("#otherCon").parents("div").addClass('checked');
				$("#otherCon").prop('checked',true);
				$("#otherCongenital").val(data.abnormallyCongenital);
				break;
		}
	}

	if(data.spontaneus.length){
		passCheckboxValue("temp", "S", JSON.parse(data.spontaneus));
	}

	if(data.assistedDelivery.length){
		passCheckboxValue("temp", "D", JSON.parse(data.assistedDelivery));
	}

	if(data.caesarean.length){
		passCheckboxValue("temp", "C", JSON.parse(data.caesarean));
	}
}

function passCheckboxValue(name, id, arr){
	for(var i = 0; i < arr.length; i++){
		if (!$("#" + arr[i] + id).length) {
			if($("#" + arr[i] + id).val() != ""){
		  		$('#' + name + "Other").val(arr[i]);
			}
		} else {
			$("#" + arr[i] + id).parents("div").addClass('checked');
			$("#" + arr[i] + id).prop('checked',true);
		}
	}

}

function getCheckboxValue(name){
	var temp = $('input[name=' + name + ']:checked').map(function() {
    	return this.value;
	}).get();

	return temp;
}

function getRadioValue(name, other){
	var temp = $('input[name=' + name + ']:checked').map(function() {
    	return this.value;
	}).get();

	if(other && ($('#' + other).val() || $('#' + other).val() != "")){
		return $('#' + other).val()
	} else {
		return temp[0];
	}
}