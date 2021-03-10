document.addEventListener("load", Start());
function Start() 
{
    if(getCookie("cookiesAccepted") == "")
    {
        document.getElementById("cookies-container").style.display = "block";
    }
}

function CloseCookies()
{
    document.getElementById("cookies-container").style.display = "none";
    setCookie("cookiesAccepted", "true");
}


function getCookie(name) {
    var cookie = name + "=";
    var cookies = document.cookie.split(';');

    for(var i = 0; i < cookies.length; i++)
    {
      var c = cookies[i];
      while (c.charAt(0) == ' ') 
      {
        c = c.substring(1);
      }

      if (c.indexOf(name) == 0) 
      {
        var value = c.substring(name.length, c.length);
        if(value.charAt(0) == "=") 
        {
            value = value.substring(1);      
        }

        return value;
      }
    }
    return "";
}

function setCookie (name, value) 
{
    var cookie = name + "=" + value + ";";
    document.cookie = cookie;
    console.log(document.cookie);
}