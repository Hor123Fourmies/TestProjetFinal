function ajaxRequest()
{
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {

        if (this.readyState == 4 && this.status == 200) {

            document.getElementById('dataUpdate').innerHTML = this.responseText;
            //console.log(this.responseText);




        }

    };

//    xhttp.open("GET", "data.txt", true);

    xhttp.open("GET", "bdd2.php", true);

    xhttp.send();


}

ajaxRequest();

/*
document.getElementById('actionUpdate').addEventListener('click', ajaxRequest);
document.getElementById('imageCiel').addEventListener('click', ajaxRequest);
*/

/*
var response = JSON.parse(this.responseText);


var titre = response.getElementsByClassName('titre');
var contenu = response.getElementsByClassName('contenu');

titre.addEventListener('click', function () {
    contenu.style.color = 'blue';

});
*/
