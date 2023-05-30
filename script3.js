document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("form-avto").addEventListener("submit", function(event) {
        event.preventDefault();
        var date = document.getElementById("dateAvto").value;
        
        console.log(date)
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "query3.php");
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    var result = JSON.parse(xhr.responseText);
                    var avtos = result;
                    var resultHtml = "";
                    for (var i = 0; i < avtos.length; i++) {
                        var film = avtos[i];
                        resultHtml += "<li>" + film.Name + ", " + film.Vendor + ", " + film.Price + "</li>";

                    }                    
                } else {
                    console.log("Ошибка запроса: " + xhr.status);
                }
                document.getElementById("avto").innerHTML = resultHtml;

            }
        };
        xhr.onerror = function() {
            console.log("Ошибка сети");
        }
        var date = "date=" + encodeURIComponent(date);
        xhr.send(date);
    });
});