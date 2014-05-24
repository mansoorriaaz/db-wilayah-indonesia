var ajaxku;

function ajaxkota(id) {
    ajaxku  = buatajax();
    var url = "ajax.php?q="+id+"&sid="+Math.random();

    ajaxku.onreadystatechange = stateChanged;
    ajaxku.open("GET",url,true);
    ajaxku.send(null);
}

function ajaxkec(id) {
    ajaxku  = buatajax();
    var url = "ajax.php?kec="+id+"&sid="+Math.random();

    ajaxku.onreadystatechange = stateChangedKec;
    ajaxku.open("GET",url,true);
    ajaxku.send(null);
}

function ajaxkel(id) {
    ajaxku  = buatajax();
    var url = "ajax.php?kel="+id+"&sid="+Math.random();

    ajaxku.onreadystatechange = stateChangedKel;
    ajaxku.open("GET",url,true);
    ajaxku.send(null);
}

function buatajax() {
    if (window.XMLHttpRequest) {
        return new XMLHttpRequest();
    }

    if (window.ActiveXObject) {
        return new ActiveXObject("Microsoft.XMLHTTP");
    }

    return null;
}

function stateChanged() {
    var data;
    if (ajaxku.readyState==4) {
        data = ajaxku.responseText;

        if (data.length>=0) {
            $("#kota").html(data);
        }
        else {
            $("#kota").val("<option selected>Pilih Kota/Kab</option>");
        }
    }
}

function stateChangedKec() {
    var data;
    if (ajaxku.readyState==4) {
        data = ajaxku.responseText;

        if (data.length>=0) {
            $("#kec").html(data);
        }
        else {
            $("#kec").val("<option selected>Pilih Kecamatan</option>");
        }
    }
}

function stateChangedKel() {
    var data;
    if (ajaxku.readyState==4) {
        data = ajaxku.responseText;

        if (data.length>=0) {
            $("#kel").html(data);
        }
        else {
            $("#kel").val("<option selected>Pilih Kelurahan/Desa</option>");
        }
    }
}