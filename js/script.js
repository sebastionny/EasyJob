function _(id){
    return document.getElementById(id);
}
function submitForm(){
    _("mybtn").disabled = true;
    _("status").innerHTML = 'Veuillez patienter ...';
    var formdata = new FormData();
    formdata.append( "n", _("n").value );
    formdata.append( "e", _("e").value );
    formdata.append( "m", _("m").value );
    var ajax = new XMLHttpRequest();
    ajax.open( "POST", "./vues/include/formContact.php" );
    ajax.onreadystatechange = function() {
        if(ajax.readyState == 4 && ajax.status == 200) {
            if(ajax.responseText == "success"){
                _("my_form").innerHTML = '<h2>Merci '+_("n").value+', votre message a été bien envoyé.</h2>';
            } else {
                _("status").innerHTML = ajax.responseText;
                _("mybtn").disabled = false;
            }
        }
    }
    ajax.send( formdata );
}