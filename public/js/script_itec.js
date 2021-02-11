/*
$(".redes-link.whatsapp").on("click", function () {
    var text = $(this).attr("data-mensaje");
    var phone = $(this).attr("data-numero");
    var message = encodeURIComponent(text);
    if (isMobile.any()) {
        //mobile device
        var whatsapp_API_url = "whatsapp://send";
        window.open(whatsapp_API_url + '?phone=' + phone + '&text=' + message, '_blank');            //$(this).attr('href', whatsapp_API_url + '?phone=' + phone + '&text=' + message);
    } else {
        //desktop
        var whatsapp_API_url = "https://web.whatsapp.com/send";
        window.open (whatsapp_API_url + '?phone=' + phone + '&text=' + message, '_blank');
        //$(this).attr('href', whatsapp_API_url + '?phone=' + phone + '&text=' + message);
    }
    return false;
});
*/
var isMobile = {
    Android: function () {
        return navigator.userAgent.match(/Android/i);
    },
    BlackBerry: function () {
        return navigator.userAgent.match(/BlackBerry/i);
    },
    iOS: function () {
        return navigator.userAgent.match(/iPhone|iPad|iPod/i);
    },
    Opera: function () {
        return navigator.userAgent.match(/Opera Mini/i);
    },
    Windows: function () {
        return navigator.userAgent.match(/IEMobile/i);
    },
    any: function () {
        return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
    }
};

function whatsapp_exe(){
    var text = "hola mundo";
    var phone = "51916331094";
    var message = encodeURIComponent(text);
    if (isMobile.any()) {
        //mobile device
        var whatsapp_API_url = "whatsapp://send";
        window.open(whatsapp_API_url + '?phone=' + phone + '&text=' + message, '_blank');            
        //$(this).attr('href', whatsapp_API_url + '?phone=' + phone + '&text=' + message);
    } else {
        //desktop
        var whatsapp_API_url = "https://web.whatsapp.com/send";
        window.open (whatsapp_API_url + '?phone=' + phone + '&text=' + message, '_blank');
        //$(this).attr('href', whatsapp_API_url + '?phone=' + phone + '&text=' + message);
    }
    return false;
}