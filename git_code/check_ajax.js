var return_check=false;
            function show_info(){
                $("#error_msg").html("Wrong user");
            }
            function return_info(){
                 if(return_check){
                     return true;
                 }
                 else {
                     show_info();
                     return false;
                 }
            }
            //function check(map,callback)
               function check(map)
            {
                xmlHttp = GetXmlHttpObject();
                var data_url = "";
                var url = "check_account.php";

                map.forEach(function(value,key){

                    data_url += key + "=" + value + "&";

                });

                //Supprimer le dernier "&";
                data_url = data_url.substr(0,data_url.length-1);

                if (xmlHttp === null)
                {
                    alert("Navigateur ne support pas HTTP");
                    return;
                }



                xmlHttp.onreadystatechange = function ()
                {
                    if (xmlHttp.readyState === 4 && xmlHttp.status === 200){

                        if (xmlHttp.responseText === "false") {
                          return_check=false;

                        } else if(xmlHttp.responseText === "true"){
                          return_check=true;

                        }
                        // if(typeof callback != "undefined"){
                        //     callback();
                        //
                        // }
                    }

                };

                xmlHttp.open("POST",url,true);
                xmlHttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
                xmlHttp.send(data_url);
            }

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

            function check_user(map){
                check(map);
                return return_info();
            }
            // function check_user(map,callback)
            // {
            //     check(map,function(){
            //         return return_check;
            //     });
            //
            // }


