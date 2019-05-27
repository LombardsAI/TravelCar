var returnInfo = false;

function checkAccount(map,$msg) {
    xmlHttp = GetXmlHttpObject();
    // var data_url = "";
    // var url = "../../app/model/ModelUtilisateur.php";
    if($msg == 'sign_in') {
        var url = "../../app/controller/router.php?action=checkAccount&controlleur=utilisateur&";
    }
    else if($msg == 'sign_up') {
        var url = "../../app/controller/router.php?action=checkExistance&controlleur=utilisateur&";
    }

    map.forEach(function (value, key) {

        url += key + "=" + value + "&";

    });

    //Supprimer le dernier "&";
    url = url.substr(0, url.length - 1);

    if (xmlHttp === null) {
        alert("Navigateur ne support pas HTTP");
        return;
    }
    xmlHttp.onreadystatechange = function () {
        if (xmlHttp.readyState === 4 && xmlHttp.status === 200) {
            if (xmlHttp.responseText === "true") {
                $("#error_msg").hide();
                returnInfo = true;
            }
            else if (xmlHttp.responseText === "false") {
                $("#error_msg").show();
                returnInfo = false;
            }

        }
    };
    xmlHttp.open("POST",url,true);
    xmlHttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    xmlHttp.send('');


    function GetXmlHttpObject()
    {
        var xmlHttp = null;
        try
        {
            // Firefox, Opera 8.0+, Safari
            xmlHttp = new XMLHttpRequest();
        } catch (e)
        {
            //Internet Explorer
            try
            {
                xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e)
            {
                xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
        }
        return xmlHttp;
    }
}

function return_Info(){
    if(returnInfo == true){
        return true;
    }
    else{
        return false;
    }
}