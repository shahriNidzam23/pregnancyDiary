function init(){
    $.ajax({
        type: "POST",
        url: 'api/appoinment-api.php',
        dataType: 'json',
        data: { functionname: 'readPatientAppoinment'},

        success: function(obj, textstatus) {
        	if(!(obj.toString().includes("Error:") || obj.toString().includes("no data"))){
				console.log(obj);
				//temp = obj;
                if(obj[0].time){
                       drawTable(obj);
                }
        	}
        },
        error: function(err) {
            console.log(err.responseText);
        }
    });
}

function drawTable(obj){
	console.log(obj);
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

    	var html = '<tr>' +
        '<td>' + formatDateDB(parseInt(obj[i].time)) + '</td>' + 
        '<td>' + obj[i].name + '</td>' +
        '<td>' + obj[i].week + '</td>' +
        '<td>' + formatTime(parseInt(obj[i].time)) + '</td>' +
        '<td>' + obj[i].location + '</td>' +
        '<td><i class="' + icon + '" aria-hidden="true" style="' + color + '"></i></td></tr>';

        if(obj.length == 1){
        	$("#appoinment-table").prepend(html);
        } else {
       		$("#appoinment-table").append(html);
        }
    }
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