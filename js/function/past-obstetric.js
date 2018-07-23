var temp = [];
var idUpdate;
function init(){
    $.ajax({
        type: "POST",
        url: 'api/past-obstetric-api.php',
        dataType: 'json',
        data: { functionname: 'readObstetric', ic: $("#pic").val()},

        success: function(obj, textstatus) {
        	if(!(obj.toString().includes("Error:") || obj.toString().includes("no announcement"))){
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

	if(!validate(data)){
	    $.ajax({
	        type: "POST",
	        url: 'api/past-obstetric-api.php',
	        dataType: 'json',
	        data: { functionname: 'insertObstetric', data: data},

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
	console.log(data);
	if(!validate(data)){
	    $.ajax({
	        type: "POST",
	        url: 'api/past-obstetric-api.php',
	        dataType: 'json',
	        data: { functionname: 'updateObstetric', data: data},

	        success: function(obj, textstatus) {
	        	console.log(obj);
	        	if(obj == 1){
        			$("#past-obstetric-table").empty();
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
        url: 'api/past-obstetric-api.php',
        dataType: 'json',
        data: { functionname: 'deleteObstetric', data: idUpdate},

        success: function(obj, textstatus) {
        	console.log(obj);
    			$("#past-obstetric-table").empty();
    			init();
				$("#add-new-modal").modal("hide");
        },
        error: function(err) {
            console.log(err.responseText);
        }
    });
}

function drawTable(obj){
    for (var i = (obj.length - 1); i >= 0; i--) {
    	var html = '<tr onclick="openModal(' + obj[i].id + ')">' +
        '<td>' + obj[i].year + '</td><td>' + obj[i].bType + '</td>' +
        '<td>' + obj[i].placeNby + '</td><td>' + obj[i].sex + '</td>' +
        '<td>' + obj[i].weight + '</td><td>' + obj[i].cMother + '</td>' +
        '<td>' + obj[i].cBaby + '</td><td>' + obj[i].bDuration + '</td>' +
        '<td>' + obj[i].bbyCondition + '</td></tr>';

        if(obj.length == 1){
        	$("#past-obstetric-table").prepend(html);
        } else {
       		$("#past-obstetric-table").append(html);
        }


		$("#add-new-modal").modal("hide");
    }
}

function openModal(id){
	if(id){
		for(var i = 0; i < temp.length; i++){
			if(temp[i].id == id){
				idUpdate = id;
				$("#year").val(temp[i].year);
				$("#bType").val(temp[i].bType);
				$("#placeNby").val(temp[i].placeNby);
				$("#sex").val(temp[i].sex);
				$("#weight").val(temp[i].weight);
				$("#cMother").val(temp[i].cMother);
				$("#cBaby").val(temp[i].cBaby);
				$("#bDuration").val(temp[i].bDuration);
				$("#bbyCondition").val(temp[i].bbyCondition);
				$("#doc-button").hide();
				$("#update-doc-button").show();
				$("#delete-doc-button").show();
				$("#add-title").html("View Past Obstetric");
				break;
			}
		}
	} else {
		$("#year").val("");
		$("#bType").val("");
		$("#placeNby").val("");
		$("#sex").val("");
		$("#weight").val("");
		$("#cMother").val("");
		$("#cBaby").val("");
		$("#bDuration").val("");
		$("#bbyCondition").val("");
		$("#add-title").html("Add New Past Obstetric");
		$("#doc-button").show();
		$("#update-doc-button").hide();
		$("#delete-doc-button").hide();
	}
	
	$("#add-new-modal").modal("show");
}

function getObject(){
	var data = {
		ic: $("#pic").val(),
		year: $("#year").val(),
		bType: $("#bType").val(),
		placeNby: $("#placeNby").val(),
		sex: $("#sex").val(),
		weight: $("#weight").val(),
		cMother: $("#cMother").val(),
		cBaby: $("#cBaby").val(),
		bDuration: $("#bDuration").val(),
		bbyCondition: $("#bbyCondition").val(),
	};

	return data;
}