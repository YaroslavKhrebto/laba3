document.addEventListener("DOMContentLoaded", function() {
	var getProisv = document.getElementById("proisv--btn");
	getProisv.addEventListener("click", function() {
		var vendor = document.getElementById("vendor").value;
		var xhr = new XMLHttpRequest();
		xhr.open("POST", "query2.php");
		xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhr.responseType = "document";
        console.log(xhr)
		xhr.onload = function() {
			if (xhr.status === 200) {
				var venodrs = xhr.responseXML.getElementsByTagName("vendor");
                console.log(venodrs)
				var result = "";
				for (var i = 0; i < venodrs.length; i++) {
					var name = venodrs[i].getElementsByTagName("name")[0].textContent;
					var data = venodrs[i].getElementsByTagName("Release_date")[0].textContent;
					var race = venodrs[i].getElementsByTagName("Race")[0].textContent;
					var price = venodrs[i].getElementsByTagName("Price")[0].textContent;
								
					result += "<li>" + name + ", " + data + ", " + race + ", " + price  + "</li>";
				}
				document.getElementById("proisv").innerHTML = result;
			} else {
				console.log("Ошибка: " + xhr.statusText);
			}
		};
		xhr.onerror = function() {
			console.log("Ошибка сети");
		};
		xhr.send("vendor=" + vendor);
	});
});