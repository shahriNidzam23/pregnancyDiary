function validate(obj) {
    var bool = false;
    jQuery.each(obj, function(index, item) {
        if (item == null || item == "") {
            bool = true;
        }
    });

    return bool;
}

function oneExist(arr) {
    for(var i = 0; i < arr.length - 1; i++){
        var obj = {data: arr[i]};
        var obj2 = {data: arr[i + 1]};
        if(validate(obj) != validate(obj2)){
            return true;
        }
    }

    return false;
}

function logout(page){
	$.ajax({
        type: "POST",
        url: 'api/index-api.php',
        dataType: 'json',
        data: { functionname: 'logout'},

        success: function(obj, textstatus) {
        	if(obj == "OK"){
				document.location.href = page;
        	}
        },
        error: function(err) {
            console.log(err.responseText);
        }
    });
}

function modal(obj){
    $("#" + obj.title).html(obj.titleText);
    $("#" + obj.body).html(obj.bodyText);
    $("#" + obj.id).modal('show');
}

function routePatientPage(page){
    document.location.href = page + "?ic=" + $("#pic").val();
}