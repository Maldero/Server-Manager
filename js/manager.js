function requestShutdown() {
var answer = confirm("Are you sure to shutdown?")
if(answer) {
	document.cookie="shutdown=yes";
	location.reload();
}
 else {
	return
}
}

function requestReboot() {
var answer = confirm("Are you sure to reboot?")
if(answer) {
	document.cookie="reboot=yes";
	location.reload();
}
else {
	return
}
}
