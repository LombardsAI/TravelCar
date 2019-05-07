            var return_check=false;
//              function show_info(){
//               $("#error_msg").show();
//            }
            
            function return_info(){
                 if(return_check){
                     return true;
                 }
                 else {
                  $("#error_msg").show();
                     return false;
                 }
            }
            
            function return_info_inscri(){
                 if(return_check){
                    $("error_msg").show();
                 }
                 else {
                   $("#error_msg").hide();   
                 }
            }
            
            
       
                
            
            function check(map,$msg)
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



                xmlHttp.onreadystatechange = function(){
                    if (xmlHttp.readyState === 4 && xmlHttp.status === 200){
                        
                        if (xmlHttp.responseText === "false") {
                            if($msg === 'sign_in'){
                          return_check=false;
                      }
                      else{
                          $("#error_msg").hide();
                      }
                        } else if(xmlHttp.responseText === "true"){
                            if($msg === 'sign_in'){
                          return_check=true;
                      }
                      else{
                          $("#error_msg").show();
                      }

                        }
                          
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

            // function check_user(map,callback)
            // {
            //     check(map,function(){
            //         return return_check;
            //     });
            //
            // }


