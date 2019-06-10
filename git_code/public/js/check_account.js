var returnInfo = false;
var difference = false;
function checkAccount(map,$msg) {
    
    xmlHttp = GetXmlHttpObject();
    var data_url = "";
    var url = "../../app/controller/router.php";
//    var url = "../../app/view/check_account.php";
    if($msg == 'sign_in') {
         data_url += "action=checkAccount&controlleur=utilisateur&";
    }
    else if($msg == 'sign_up') {
         data_url += "action=checkExistance&controlleur=utilisateur&";
    }

    map.forEach(function (value, key) {

       data_url += key + "=" + value + "&";

    });

    //Supprimer le dernier "&";
    data_url = data_url.substr(0, data_url.length - 1);

    if (xmlHttp === null) {
        alert("Navigateur ne support pas HTTP");
        return;
    }
    xmlHttp.onreadystatechange = function () {

        if (xmlHttp.readyState === 4 && xmlHttp.status === 200) {
            
          if (xmlHttp.responseText === "false") {
            
                              returnInfo=false;
                          $("#error_msg").show();
                     
                      }
                        else if(xmlHttp.responseText === "trueutilisateur" || xmlHttp.responseText ==="true"){
                            
                          
                          returnInfo=true;
                          $("#error_msg").hide();
                      }
                          else if(xmlHttp.responseText === "trueadministrateur"){

                              $("#action").val("accueilAdmin");
                              $("#controlleur").val("administrateur");
                              returnInfo=true;
                              $("#error_msg").hide();
                          }
                        
                        else{
                            alert(xmlHttp.responseText);
                        }
                    }
    };
    xmlHttp.open("POST",url,true);
    xmlHttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    xmlHttp.send(data_url);


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
    if(returnInfo === true){
        return true;
    }
    else{
        return false;
    }
}

function return_Info_signup(){
    if(returnInfo && difference ){
        return true;}
    else {
        return false;
    }
}