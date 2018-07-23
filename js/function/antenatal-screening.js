var temp = [];
var idUpdate;
function init(){
    $.ajax({
        type: "POST",
        url: 'api/antenatal-screening-api.php',
        dataType: 'json',
        data: { functionname: 'readAntenatal', ic: $("#pic").val()},

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
	        url: 'api/antenatal-screening-api.php',
	        dataType: 'json',
	        data: { functionname: 'insertAntenatal', data: data},

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
	        url: 'api/antenatal-screening-api.php',
	        dataType: 'json',
	        data: { functionname: 'updateAntenatal', data: data},

	        success: function(obj, textstatus) {
	        	console.log(obj);
	        	if(obj == 1){
        			$("#antenatal-screening-table").empty();
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

function drawTable(obj){
	console.log(obj);
    for (var i = (obj.length - 1); i >= 0; i--) {
    	var html = '<tr onclick="openModal(' + obj[i].id + ')">' +
        '<td>' + obj[i].test + '</td>' + 
        '<td>' + obj[i].dateTaken + '</td>' +
        '<td>' + obj[i].result + '</td></tr>';

        if(obj.length == 1){
        	$("#antenatal-screening-table").prepend(html);
        } else {
       		$("#antenatal-screening-table").append(html);
        }


		$("#add-new-modal").modal("hide");
    }
}

function openModal(id){
	if(id){
		for(var i = 0; i < temp.length; i++){
			if(temp[i].id == id){
				console.log(temp[i]);
				idUpdate = id;
				var dateTemp = temp[i].dateTaken;
				var reDate = dateTemp.charAt(3) + dateTemp.charAt(4) + "/" + dateTemp.charAt(0) + dateTemp.charAt(1) + "/" +dateTemp.charAt(6) + dateTemp.charAt(7) + dateTemp.charAt(8) + dateTemp.charAt(9); 
    			var dateTaken = new Date(reDate);

				var day = ("0" + dateTaken.getDate()).slice(-2);
				var month = ("0" + (dateTaken.getMonth() + 1)).slice(-2);

				var formatted = dateTaken.getFullYear()+"-"+(month)+"-"+(day);

				$("#test").val(temp[i].test);
				$("#dateTaken").val(formatted);
				$("#result").val(temp[i].result);
				$("#doc-button").hide();
				$("#update-doc-button").show();
				$("#delete-doc-button").show();
				$("#add-title").html("View Antenatal Screening Test");
				break;
			}
		}
	} else {
		$("#test").val("");
		$("#dateTaken").val("");
		$("#result").val("");
		$("#add-title").html("Add New Antenatal Screening Test");
		$("#doc-button").show();
		$("#update-doc-button").hide();
		$("#delete-doc-button").hide();
	}
	
	$("#add-new-modal").modal("show");
}

function getObject(){
	var data = {
		ic: $("#pic").val(),
		test: $("#test").val(),
		dateTaken: $("#dateTaken").val(),
		result: $("#result").val()
	};

	return data;
}

function formatDateDB(newDate){
	var dateTaken = new Date(newDate);

	var day = ("0" + dateTaken.getDate()).slice(-2);
	var month = ("0" + (dateTaken.getMonth() + 1)).slice(-2);

	return (day)+"/"+(month)+"/"+dateTaken.getFullYear();
}