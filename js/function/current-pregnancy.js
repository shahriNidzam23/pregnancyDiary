var temp = [];
var idUpdate;
function init(){
    $.ajax({
        type: "POST",
        url: 'api/current-pregnancy-api.php',
        dataType: 'json',
        data: { functionname: 'readPregnancy', ic: $("#pic").val()},

        success: function(obj, textstatus) {
        	if(!(obj.toString().includes("Error:") || obj.toString().includes("no data"))){
				temp = obj;
				drawTable(temp);
        	}
        },
        error: function(err) {
            console.log(err.responseText);
        }
    });
}

function saveReport(){

	var data = getObject();
	data.dateTaken = formatDateDB(data.dateTaken);
	data.ic = $("#pic").val();
	if(!validate(data)){
	    $.ajax({
	        type: "POST",
	        url: 'api/current-pregnancy-api.php',
	        dataType: 'json',
	        data: { functionname: 'insertPregnancy', data: data},

	        success: function(obj, textstatus) {
	        	console.log(obj);
	        	if(!(obj.toString().includes("Error:"))){
	        		data.id = obj;
	    			var arr = [data];
					temp.push(data);
					drawTable(arr);
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

	var data = getObject();
	data.id = idUpdate;
	data.dateTaken = formatDateDB(data.dateTaken);
	if(!validate(data)){
	    $.ajax({
	        type: "POST",
	        url: 'api/current-pregnancy-api.php',
	        dataType: 'json',
	        data: { functionname: 'updatePregnancy', data: data},

	        success: function(obj, textstatus) {
	        	console.log(obj);
	        	if(obj == 1){
        			$("#current-pregnancy-table").empty();
        			init();
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
        url: 'api/current-pregnancy-api.php',
        dataType: 'json',
        data: { functionname: 'deletePregnancy', data: idUpdate},

        success: function(obj, textstatus) {
        	console.log(obj);
    			$("#current-pregnancy-table").empty();
    			init();
				$("#add-new-modal").modal("hide");
        },
        error: function(err) {
            console.log(err.responseText);
        }
    });
}

function drawTable(obj){
	console.log(obj);
    for (var i = (obj.length - 1); i >= 0; i--) {
    	var html = '<tr onclick="openModal(' + obj[i].id + ')">' +
        '<td>' + obj[i].dateTaken + '</td>' +
        '<td>' + obj[i].albuminTest + '</td>' +
        '<td>' + obj[i].sugarTest + '</td>' +
        '<td>' + obj[i].hemoglobinTest + '</td>' +
        '<td>' + obj[i].weight + '</td>' +
        '<td>' + obj[i].bloodPressure + '</td>' +
        '<td>' + obj[i].vein + '</td>' +
        '<td>' + obj[i].week + '</td>' +
        '<td>' + obj[i].uterusHeight + '</td>' +
        '<td>' + obj[i].posFetus + '</td>' +
        '<td>' + obj[i].fetusHeart + '</td>' +
        '<td>' + obj[i].moveFetus + '</td>' +
        '<td>' + obj[i].doctor + '</td></tr>';

        if(obj.length == 1){
        	$("#current-pregnancy-table").prepend(html);
        } else {
       		$("#current-pregnancy-table").append(html);
        }


		$("#add-new-modal").modal("hide");
    }
}

function openModal(id){
	if(id){
		for(var i = 0; i < temp.length; i++){
			if(temp[i].id == id){
				idUpdate = id;
				var dateTemp = temp[i].dateTaken;
				var reDate = dateTemp.charAt(3) + dateTemp.charAt(4) + "/" + dateTemp.charAt(0) + dateTemp.charAt(1) + "/" +dateTemp.charAt(6) + dateTemp.charAt(7) + dateTemp.charAt(8) + dateTemp.charAt(9); 
    			var dateTaken = new Date(reDate);

				var day = ("0" + dateTaken.getDate()).slice(-2);
				var month = ("0" + (dateTaken.getMonth() + 1)).slice(-2);

				var formatted = dateTaken.getFullYear()+"-"+(month)+"-"+(day);
				temp[i].dateTaken = formatted;
				populateForm(true, temp[i]);
				$("#doc-button").hide();
				$("#update-doc-button").show();
				$("#delete-doc-button").show();
				$("#add-title").html("View Current Pregnancy Test");
				break;
			}
		}
	} else {
		populateForm(false);
		$("#add-title").html("Add New Current Pregnancy Test");
		$("#doc-button").show();
		$("#update-doc-button").hide();
		$("#delete-doc-button").hide();
	}
	
	$("#add-new-modal").modal("show");
}

function getObject(){
	var data = {
		ic: $("#pic").val(),
		dateTaken: $("#dateTaken").val(),
		albuminTest: $("#albuminTest").val(),
		sugarTest: $("#sugarTest").val(),
		hemoglobinTest: $("#hemoglobinTest").val(),
		weight: $("#weight").val(),
		bloodPressure: $("#bloodPressure").val(),
		vein: $("#vein").val(),
		week: $("#week").val(),
		uterusHeight: $("#uterusHeight").val(),
		bbyConditionNow: $("#bbyConditionNow").val(),
		posFetus: $("#posFetus").val(),
		fetusHeart: $("#fetusHeart").val(),
		moveFetus: $("#moveFetus").val(),
		doctor: $("#doctor").val()
	};

	return data;
}

function populateForm(bool, obj){
		
		switch(bool){
			case true:
				$("#dateTaken").val(obj.dateTaken);
				$("#albuminTest").val(obj.albuminTest);
				$("#sugarTest").val(obj.sugarTest);
				$("#hemoglobinTest").val(obj.hemoglobinTest);
				$("#weight").val(obj.weight);
				$("#bloodPressure").val(obj.bloodPressure);
				$("#vein").val(obj.vein);
				$("#week").val(obj.week);
				$("#uterusHeight").val(obj.uterusHeight);
				$("#bbyConditionNow").val(obj.bbyConditionNow);
				$("#posFetus").val(obj.posFetus);
				$("#fetusHeart").val(obj.fetusHeart);
				$("#moveFetus").val(obj.moveFetus);
				$("#doctor").val(obj.doctor);
				break;
			default:
				$("#dateTaken").val("");
				$("#albuminTest").val("");
				$("#sugarTest").val("");
				$("#hemoglobinTest").val("");
				$("#weight").val("");
				$("#bloodPressure").val("");
				$("#vein").val("");
				$("#week").val("");
				$("#uterusHeight").val("");
				$("#bbyConditionNow").val("");
				$("#posFetus").val("");
				$("#fetusHeart").val("");
				$("#moveFetus").val("");
				break;
		}
}

function formatDateDB(newDate){
	var dateTaken = new Date(newDate);

	var day = ("0" + dateTaken.getDate()).slice(-2);
	var month = ("0" + (dateTaken.getMonth() + 1)).slice(-2);

	return (day)+"/"+(month)+"/"+dateTaken.getFullYear();
}