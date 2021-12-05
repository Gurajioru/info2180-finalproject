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
		if (Validate() == true && title.value != ""){

			let request = new XMLHttpRequest();
			let urlcode =
				"../php/addissue.php?title=" +
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
			ClearFields();
		}
	});
};

function Validate() {
	
    let validchk = true;
	let description = document.getElementById("description");
	let userList = document.getElementById("assignedto");
	let selectedUser = userList.options[userList.selectedIndex].text;

	if(title.value == ""){

		result.innerHTML = "Enter all Fields";

	}

	if (description.value == "" || description.value == null) {
		result.innerHTML = "Enter all Fields";
		validchk = false;
	}
	if (selectedUser == "Please Select") {
		result.innerHTML =  "Enter all Fields";
		validchk = false;
	}

	if (validchk) {
		return true;
	} else {
		return false;
	}
}

function ClearFields(){

	title.value = "";
	description.value = "";

}