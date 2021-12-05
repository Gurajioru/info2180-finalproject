window.onload = function () {
    
    let btn = document.getElementById("sbtn");

	let firstname = document.getElementById("firstname");
	let lastname = document.getElementById("lastname");
	let password = document.getElementById("password");
	let email = document.getElementById("email");
	let result = document.getElementById("result");

	btn.addEventListener("click", function (e) {

		e.preventDefault();

		if (Validate() == true) {

			let request = new XMLHttpRequest();

			var urlcode =
				"../php/adduserphp.php?firstname=" +
				firstname.value +
				"&lastname=" +
				lastname.value +
				"&password=" +
				password.value +
				"&email=" +
				email.value;

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
			ClearFields()
		}
	});
};

function Validate() {
	
    let validchk = true;
    let pregex = /^(?=.*[A-Z])(?=.*\d)[a-zA-Z\d\w\W]{8,}$/;
    let eregex = /.{1,}@[^.]{1,}/;

    if (firstname.value == " " || firstname.value == null) {
		result.innerHTML = "Enter all fields";
		validchk = false;
	}
	if (lastname.value == "" || lastname.value == null) {
		result.innerHTML = "Enter all fields";
		validchk = false;
	}
    if (!email.value.match(eregex)) {
        result.innerHTML = "Enter a valid email address";
        validchk = false;
    }
	if (!password.value.match(pregex)) {
		result.innerHTML =
			"Your password must be at least 8 characters which includes 1 capital letter and 1 number";
        validchk = false;
    }

	if (validchk) {
		return true;
	} else {
		return false;
	}
}

function ClearFields(){

	firstname.value = "";
	lastname.value = "";
	password.value = "";
	email.value = "";


}