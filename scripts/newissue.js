window.onload = function () {

	let btn = document.getElementById("submit");
	let result = document.getElementById("result");

	btn.addEventListener("click", function (e) {

		e.preventDefault();

		let title = document.getElementById("title");
		let description = document.getElementById("description");
		let userList = document.getElementById("assignedto");
		let selectedUser = userList.options[userList.selectedIndex].text;
		let priority = document.getElementById("priority");
		let selectedPriority = priority.options[priority.selectedIndex].text;
		let type = document.getElementById("type");
		let selectedType = type.options[type.selectedIndex].text;
		console.log(title);
		if (Validate() == true){

			let request = new XMLHttpRequest();
			let urlcode =
				"addissue.php?title=" +
				title.value +
				"&description=" +
				description.value +
				"&assignedto=" +
				selectedUser +
				"&priority=" +
				selectedPriority +
				"&type=" +
				selectedType;

				request.onreadystatechange = function () {
				if (request.readyState == XMLHttpRequest.DONE) {
					if (request.status == 200) {
						let prob = request.responseText;
						result.innerHTML = prob;
					} else {
						alert("Error");
					}
				}
			};

			request.open("POST", urlcode, true);
			request.send();
			title.value = "";
			description.value = "";
		}
	});
};

function Validate() {
	
    let validchk = true;
	let title = document.getElementById("title");
	let description = document.getElementById("description");
	let userList = document.getElementById("assignedto");
	let selectedUser = userList.options[userList.selectedIndex].text;

	if (title.value = "" || title.value == null) {
		result.innerHTML = "Please Enter all Fields";
		validchk = false;
	}
	if (description.value == "" || description.value == null) {
		result.innerHTML = "Please Enter all Fields";
		validchk = false;
	}
	if (selectedUser == "Please Select") {
		result.innerHTML = "Please Enter all Fields";
		validchk = false;
	}

	if (validchk) {
		return true;
	} else {
		return false;
	}
}
