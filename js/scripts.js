$slideSpeed = 700;
$webServiceRoot = "http://localhost/moss-ws/rest/";
$resultsTable = $("#resultsTable");
$loadingImage = $("#loadingImage");
$usersList = $("#usersList");
$registerUserForm = $("#registerUserForm");
$citySelector = $("#citySelector");

$("#registerUser").click(function() {
	$usersList.hide($slideSpeed);
	$registerUserForm.show($slideSpeed);
});

$("#listUsers").click(function() {
	$registerUserForm.hide($slideSpeed);
	$usersList.show($slideSpeed);
	$loadingImage.show();
	sendAllUsersAJAX();
});

function sendAllUsersAJAX() {
	ajaxResult = $.ajax({
	  url: $webServiceRoot + "user/getall"
	});
	ajaxResult.done(function( data ) {   
		appendUserTableRows(data);
		$loadingImage.hide();
		$resultsTable.show();
	  });
	ajaxResult.fail(function() {
		$("#usersList").text("Não foi possível contactar o servidor.");
		$loadingImage.hide();
	});
}

function appendUserTableRows(data) {
	$tableBody = $resultsTable.find("tbody").remove();	
	$(data).find("user").each(function() {
		var tableRow = "<tr>";
	    tableRow += tableData($(this).find("name:first").text());
	    tableRow += tableData($(this).find("email:first").text());
	    tableRow += tableData($(this).find("site:first").text());
	    tableRow += tableData($(this).find("country:first").find("name:first").text());	    
	    tableRow += tableData($(this).find("city:first").find("name:first").text());	    
	    tableRow += tableData(getDeleteHTML($(this).find("id:first").text()));	
	    tableRow += "</tr>";
	    $resultsTable.append(tableRow);
	});
}

function tableData(text) {
	return "<td>" + text + "</td>";
}

function getDeleteHTML(id) {
	return "<button class=\"deleteUser\" onclick=\"deleteUser(" + id + ")\">Delete</button>";
}

function deleteUser(id) {
	if (confirm("Tem a certeza que deseja eliminar este utilizador?"))
		var url = getDeleteLink(id);
		var form = $('<form action="' + url + '" method="post">' +
		  '<input type="text" name="id" value="' + id + '" />' +
		  '</form>');
		$(form).submit();
}

function getDeleteLink(id) {
	return "actions/deleteUser.php"
}

$("#submitButton").click(function() {
	form = $(this).parent();
	if (isValidFields(form)) {
		form.submit();
	} else {		
		alert("Não preencheu todos os campos obrigatórios.");
	}
});

function isValidFields(form) {
	var emptyFields = form.find('input:required').filter(function() {
    	return $(this).val() === "";
	}).length;

	emptyFields += form.find('select:required').filter(function() {
    	return $(this).val() == 0;
	}).length;

	return emptyFields == 0;
}

$("#country").change(function() {
	if ($(this).val() == 0) {
		$citySelector.hide($slideSpeed);
		$(this).val(0);
	} else {
		populateCityOptions($(this).val());
		$citySelector.show($slideSpeed);
	}
});

function populateCityOptions(id) {
	ajaxCityResult = $.ajax({
	  url: $webServiceRoot + "city/" + id
	});
	ajaxCityResult.done(function( data ) {
		$city = $("#city");
		removeOptions($city);
		addOptions($city, data);
	  });
	ajaxCityResult.fail(function() {
		alert("Não foi possível obter as cidades");
		removeOptions($city);
	});
}

function addOptions(selectElement, data) {
	$(data).find("city").each(function() {
		id = $(this).find("id:first").text();
		name = $(this).find("name:first").text();
		selectElement.append("<option value=\"" + id + "\">" + name + "</option>");
	});
}

function removeOptions(selectElement) {
	selectElement.find("option").filter(function() {
		return $(this).val() != 0;
	}).remove();
}