const toggle = document.getElementById("toggle");
const password = document.getElementById("password");

toggle.addEventListener("click", function () {
	if (password.type === "password") {
		password.type = "text";
	} else {
		password.type = "password";
	}
});

const message = document.getElementById("message");

message.addEventListener("click", function () {
	message.parentElement.remove();
})
