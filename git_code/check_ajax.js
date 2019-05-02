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
            function check(map)
            {  
                xmlHttp = GetXmlHttpObject();
                var data_url = "";
                var url = "check_account.php?";
                
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
                    }
                    
                }
                xmlHttp.open("GET",url+data_url,true);
                xmlHttp.send();
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