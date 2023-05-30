document.addEventListener("DOMContentLoaded", function() {
	var getProkat = document.getElementById("prokat_btn");
	getProkat.addEventListener("click", function() {
		var date = document.getElementById("date").value;
        console.log(date)
		var xhr = new XMLHttpRequest();
		xhr.open("POST", "query1.php");
		xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhr.onload = function() {
			if (xhr.status === 200) {
				document.getElementById("prokat").innerHTML = xhr.responseText;
			} else {
				console.log("Ошибка: " + xhr.statusText);
			}
		};
		xhr.onerror = function() {
			console.log("Ошибка сети");
		};
		xhr.send("date=" + date);
	});
});


