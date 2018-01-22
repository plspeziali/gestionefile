/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(){
    reloadExt();
});

function getXMLhttp() {

    var xmlHttp;

    try {

        xmlHttp = new XMLHttpRequest();
    }
        catch(e) {

        window.alert("Non funziona con internet explorer");
        return false;
    }

    return xmlHttp;
}

function reloadExt(){
    $('#selectExt').empty().append("<option>Seleziona un'estensione</option>");
    $('#selectFiles').empty().append('<option>Seleziona un file</option>');
    AjaxRequest("reloadExt.php", 0);
}

function reloadFiles(){
    var ext = $('#selectExt>option:selected').text();
    $('#selectFiles').empty().append('<option>Seleziona un file</option>');
    AjaxRequest("reloadFiles.php?ext="+ext, 1);
}

function showFile(){
    var ext = $('#selectExt>option:selected').text();
    var filename = $('#selectFiles>option:selected').text();
    if(filename!=="Seleziona un file"){
        AjaxRequest("showFile.php?ext="+ext+"&filename="+filename, 2);
    }
}

function AjaxRequest(richiesta, tipo){
    var xmlHttp = getXMLhttp();
    xmlHttp.onreadystatechange = function(){
        //window.alert(xmlHttp.readyState);
        if(xmlHttp.readyState === 4 && this.status === 200) {
            HandleResponse(xmlHttp.responseText, tipo);
        }
    };
    
    xmlHttp.open("GET", richiesta, true);
    xmlHttp.send(null);
}

function HandleResponse(response, tipo) {
    //window.alert(response);
    switch (tipo){
        case 0:
            var ext = response.split(";");
            popSelect('#selectExt',ext);
            break;
        case 1:
            var files = response.split(";");
            popSelect('#selectFiles',files);
            break;
        case 2:
            $("#showDiv").html(response);
            break;
    }
}

function popSelect(selectID, array){
    for(i=0; i<array.length-1; i++){
        //window.alert(array[i]);
        // Popola la select assegnandogli un valore e una stringa che equivale al campo "nome"
        $(selectID).append($('<option>', {
            value: i,
            text: array[i]
        }));
    } 
}

