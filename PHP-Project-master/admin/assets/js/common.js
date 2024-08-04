function validateXSSInput(value) {

    if (value.match(/((\%3C)|<)(|\s|\S)+((\%3E)|>)/i)) {
        return false;
    }
    var count = occurrences(value, '#');
    var value1 = $("<textarea/>").html(value).val();
    for (var i = 1; i <= count; i++) {
        value1 = $("<textarea/>").html(value1).val();
    }


    if (value.match(/((\%3C)|<)((\%2F)|\/)*[a-z0-9\%]+((\%3E)|>)/i)) {
        return false;
    } else if (value.match(/<img|script[^>]+src/i)) {
        return false;
    } else if (value.match(/((\%3C)|<)(|\s|\S)+((\%3E)|>)/i)) {
        return false;
    } else if (value.match(/<script.*?>([\s\S]*[a-z0-9\%]()?)<\/script>/g)) {
        return false;
    } else if (value1.match(/((\%3C)|<)((\%2F)|\/)*[a-z0-9\%]+((\%3E)|>)/i)) {
        return false;
    } else if (value1.match(/<img|script[^>]+src/i)) {
        return false;
    } else if (value1.match(/((\%3C)|<)(|\s|\S)+((\%3E)|>)/i)) {
        return false;
    } else {
        return true;
    }
}

function spacerestri(event, $this) {
    if (event.which === 32 && !$this.value.length) {
        event.preventDefault();
    }
}

function KeycheckOnlyNumeric(e)
{

    var _dom = 0;
    _dom = document.all ? 3 : (document.getElementById ? 1 : (document.layers ? 2 : 0));
    if (document.all)
        e = window.event; // for IE
    var ch = '';
    var KeyID = '';
    if (_dom == 2) {                     // for NN4
        if (e.which > 0)
            ch = '(' + String.fromCharCode(e.which) + ')';
        KeyID = e.which;
    }
    else
    {
        if (_dom == 3) {                   // for IE
            KeyID = (window.event) ? event.keyCode : e.which;
        }
        else {                       // for Mozilla
            if (e.charCode > 0)
                ch = '(' + String.fromCharCode(e.charCode) + ')';
            KeyID = e.charCode;
        }
    }
    if ((KeyID >= 65 && KeyID <= 90) || (KeyID >= 97 && KeyID <= 122) || (KeyID >= 33 && KeyID <= 47) || (KeyID >= 58 && KeyID <= 64) || (KeyID >= 91 && KeyID <= 96) || (KeyID >= 123 && KeyID <= 126) || (KeyID == 32))//changed by jshah for stopping spaces
    {
        return false;
    }
    return true;
}

