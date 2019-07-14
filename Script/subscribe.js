function verifySubsribe(callback) {

    var name = encodeURIComponent(document.getElementById("name").value);
    var firstname = encodeURIComponent(document.getElementById("firstname").value);
    var birthday = encodeURIComponent(document.getElementById("date").value);
    var city = encodeURIComponent(document.getElementById("city").value);
    var mail = encodeURIComponent(document.getElementById("mail").value);
    var password = encodeURIComponent(document.getElementById("pwd").value);

    var tel = encodeURIComponent(document.getElementById("tel").value);
    var pays = encodeURIComponent(document.getElementById("pays").value);
    // var adresse = encodeURIComponent(document.getElementById("adresse").value);

    var xhr = getXMLHttpRequest();

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
            callback(xhr.responseText);
        }
    };

    xhr.open("POST", "../php/pdo/checkSubscribe.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send('name=' + name + '&firstname=' + firstname + '&birthday=' + birthday + '&city=' + city + '&mail=' + mail + '&password=' + password + '&tel=' + tel + '&pays=' + pays);
    
}


function readData(sData) {
	// On peut maintenant traiter les données sans encombrer l'objet XHR.
	if (sData == true) {
        // document.getElementById("error").innerHTML = sData;
        window.location.href = 'http://localhost/Takk/Pages/communaute.php';
        
	} else {
        error = "Erreur : veuillez verifier que les champs ne sont pas vides ou que l'adresse mail a un forma correcte (ex : exemple@exemple.fr)";
        document.getElementById("error").innerHTML = error;
	}
}