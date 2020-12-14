$(document).ready(function(){
    /*Enregistre dans un cookie le choix de l'utilisateur*/
    $('#activeSnow').click(function(){
        var snowActive = getCookie('snowActive');
        if(snowActive === "1") {
            document.cookie = "snowActive=0; expires=''; path=/";
            $('#snow').removeClass("snow active").addClass("snow hide");
        }
        else{
            document.cookie = "snowActive=1; expires=''; path=/";
            $('#snow').removeClass("snow hide").addClass("snow active");
        }
    });
});

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}
