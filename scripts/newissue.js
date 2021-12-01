window.onload = function () {
    
    let btn = document.getElementById("submit");

	let title = document.getElementById("title");
	let description = document.getElementById("description");
	let type = document.getElementById("type");
    let priority = document.getElementById("Priority");
	let result = document.getElementById("result");
    let prioritychosen = priority.options[priority.selectedIndex].text;
    let typechosen = type.options[type.selectedIndex].text;
    let userList = document.getElementById("assignedto");
    let selectedUser = userList.options[userList.selectedIndex].text;
	btn.addEventListener("click", function (e) {

		e.preventDefault();

		if (Validate() == true) {

			let request = new XMLHttpRequest();

			var urlcode =
				"../php/newissue.php?title=" +
				title.value +
				"&description=" +
				description.value +
				"&assignedto=" +
				selectedUser.value +
				"&prioritychosen =" +
				prioritychosen.value
                "&type=" +
				typechosen.value;

                request.onreadystatechange = function () {

				if (request.readyState == XMLHttpRequest.DONE) {

					if (request.status == 200) {

						let issue = request.responseText;
						result.innerHTML = issue;

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
	
	let title = document.getElementById("title");
	let description = document.getElementById("description");
	let type = document.getElementById("type");
    let priority = document.getElementById("Priority");
	let result = document.getElementById("result");
    let prioritychosen = priority.options[priority.selectedIndex].text;
    let typechosen = type.options[type.selectedIndex].text;
    let userList = document.getElementById("assignedto");
    let selectedUser = userList.options[userList.selectedIndex].text;
    let validchk = true;


    if (title.value == "" || title.value == null) {
        result.innerHTML = "Please Enter all Fields";
        validchk = false;
    }
    if (description.value.length == "" || description.value == null) {
        result.innerHTML = "Please Enter all Fields";
        validchk = false;
    }

    if (selectedUser == "Select an option") {
        result.innerHTML = "Please Enter all Fields";
        validchk = false;
    }

	if (validchk) {
		return true;
	} else {
		return false;
	}
}
