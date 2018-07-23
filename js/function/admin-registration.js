function Register_Patient(){

	var obj = {
    Register_Number: $("#Registration_Number").val(),
    Pregnant_Date: $("#Date_Of_Pregnant").val(),
    ic: $("#IC").val(),
    Due_Date: $("#Due_Date").val(),
    email: $("#email").val(),
    Clinic_Address: $("#Clinic_Address").val(),
    Mother_Name: $("#Mother_Name").val(),
    Race: $("#Race").val(),
    Education_level: $("#Education_Level").val(),
    Occupation: $("#Occupation").val(),
    Address: $("#Address").val(),
    Date_Of_Birth: $("#Date_Of_Birth").val(),
    Age: $("#Age").val(),
    PhoneNumber_Home: $("#PhoneNumber_Home").val(),
    PhoneNumber_HP: $("#PhoneNumber_HP").val(),
    Husband_Name: $("#Husband_Name").val(),
    Husband_IC: $("#Husband_IC").val(),
    Husband_Workplace: $("#Husband_Workplace").val(),
    Husband_Phone: $("#Husband_PhoneNumber").val(),
		Password: $("#IC").val()
  };


if(!validate(obj)){
	$.ajax({
					type: "POST",
					url: 'api/profile-admin-api.php',
					dataType: 'json',
					data: { functionname: 'Register_Patient', data: obj },

					success: function(obj, textstatus) {
							console.log(obj);

							if(obj[0] == "OK"){
								clearForm();
								var modalObj = {title: "modal-title", body: "modal-body", id: "modal-id", titleText: "Success", bodyText: "Successfully Registered"};
									modal(modalObj);

							}

					},
					error: function(err) {
							console.log(err.responseText);
					}
			});

} else {

	var modalObj = {title: "modal-title", body: "modal-body", id: "modal-id", titleText: "Error", bodyText: "Please Enter All Input"};
		modal(modalObj);
}
}

function clearForm(){
	 $("#Registration_Number").val('');
	 $("#Date_Of_Pregnant").val('');
	 $("#IC").val('');
	 $("#Due_Date").val('');
	 $("#email").val('');
	 $("#Clinic_Address").val('');
	 $("#Mother_Name").val('');
	 $("#Race").val('');
	 $("#Education_Level").val('');
	 $("#Occupation").val('');
	 $("#Address").val('');
	 $("#Date_Of_Birth").val('');
	 $("#Age").val('');
	 $("#PhoneNumber_Home").val('');
	 $("#PhoneNumber_HP").val('');
	 $("#Husband_Name").val('');
	 $("#Husband_IC").val('');
	 $("#Husband_Workplace").val('');
	 $("#Husband_PhoneNumber").val('');

}
