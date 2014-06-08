$slideSpeed = 700;
$webServiceRoot = "http://localhost/moss-ws/rest/";
$resultsTable = $("#resultsTable");

$("#registerUser").click(function() {
	$("#usersList").hide($slideSpeed);
	$("#registerUserForm").show($slideSpeed);
});

$("#listUsers").click(function() {
	$divElement = $("#usersList");
	$("#registerUserForm").hide($slideSpeed);
	$divElement.show($slideSpeed);
	$loadingImage = $("#loadingImage");
	$loadingImage.show();
	sendAJAX();
});

function sendAJAX() {
	ajaxResult = $.ajax({
	  url: $webServiceRoot + "user/getall"
	});
	ajaxResult.done(function( data ) {   
		$resultsTable.append(appendUserTableRows(data));
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
		//$('body').append(form);  // This line is not necessary
		$(form).submit();
}

function getDeleteLink(id) {
	return "actions/deleteUser.php"
}