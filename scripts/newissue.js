window.onload = function () {

	let btn = document.getElementById("submit");
	let result = document.getElementById("result");

	btn.addEventListener("click", function (e) {

		e.preventDefault();

		var title = document.getElementById("title");
		var description = document.getElementById("description");
		var userList = document.getElementById("assignedto");
		var selectedUser = userList.options[userList.selectedIndex].text;
		var priority = document.getElementById("priority");
		var prioritychosen = priority.options[priority.selectedIndex].text;
		var type = document.getElementById("type");
		var typechosen = type.options[type.selectedIndex].text;

		if (Validate() == true){

			var hrequest = new XMLHttpRequest();
			var urlcode =
				"addissue.php?title=" +
				title.value +
				"&description=" +
				description.value +
				"&assignedto=" +
				selectedUser +
				"&priority=" +
				prioritychosen +
				"&type=" +
				typechosen;

			hrequest.onreadystatechange = function () {
				if (hrequest.readyState == XMLHttpRequest.DONE) {
					if (hrequest.status == 200) {
						var issue = hrequest.responseText;
						result.innerHTML = issue;
					} else {
						alert("Error Detected");
					}
				}
			};

			hrequest.open("POST", urlcode, true);
			hrequest.send();
			title.value = "";
			description.value = "";
		}
	});
};

function Validate() {
	
    let validchk = true;
	var title = document.getElementById("title");
	var description = document.getElementById("description");
	var userList = document.getElementById("assignedto");
	var selectedUser = userList.options[userList.selectedIndex].text;

	if (title.value.length < 1) {
		title.style.borderColor = "red";
		result.innerHTML = "Please Enter all Fields";
		validchk = false;
	}
	if (description.value.length < 1) {
		description.style.borderColor = "red";
		result.innerHTML = "Please Enter all Fields";
		validchk = false;
	}

	if (selectedUser == "Please Select") {
		userList.style.borderColor = "red";
		result.innerHTML = "Please Enter all Fields";
		validchk = false;
	}

	if (validchk) {
		return true;
	} else {
		return false;
	}
}
