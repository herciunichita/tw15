function genPassword() {    
    var nrCaractere; 
    if (document.getElementById("check1").value == "") {
        nrCaractere = 10; 
    }
    else nrCaractere = document.getElementById("check1").value;
    
    var litereMari, litereMici, numere, caractereSpeciale; 
    
    litereMari = document.getElementById("check2").checked;
    litereMici = document.getElementById("check3").checked;
    numere = document.getElementById("check4").checked;
    caractereSpeciale = document.getElementById("check5").checked;
    
    var pass = ""; 
    var possible = ""; 
    
    if (litereMari == true) possible = possible.concat("ABCDEFGHIJKLMNOPQRSTUVWXYZ");
    if (litereMici == true) possible = possible.concat("abcdefghijklmnopqrstuvwxyz"); 
    if (numere == true) possible = possible.concat("0123456789"); 
    if (caractereSpeciale == true) possible = possible.concat("~!@#$%^&*()_-.,/?:;\'\"");
    
     if(litereMari == false && litereMici == false && numere == false && caractereSpeciale == false)
       possible = possible.concat("abcdefghijklmnopqrstuvwxyz");
    
    for (var i=0; i<nrCaractere; i++) {
        pass += possible.charAt(Math.floor(Math.random() * possible.length));
    }
    
    document.getElementById("generated-password").innerHTML = pass; 
}

function takePwd() {
    var password = document.getElementById("generated-password").innerHTML; 
    document.getElementById("genPwd1").value = password; 
}


function getData(id) {
    if(typeof(Storage) !== "undefined") {
    localStorage.setItem("id", id);
} else {
    alert ("Something went wrong");
}
}

function setData() {
    console.log(localStorage.getItem("id"));
    document.getElementById("inreg_id").value = localStorage.getItem("id");
    localStorage.removeItem("id");
}


function cripteazaPwd() {
    var plainpass = document.getElementsByName("password")[0].value; 
    
    var hashnode = document.getElementById("myhash"); 
    var hashstring = hashnode.textContent;
    //console.log(hashstring);
    var hash_cript = CryptoJS.AES.encrypt(plainpass, hashstring); 
    var hash_cript_string = hash_cript.toString();
    /*var hashdecript = CryptoJS.AES.decrypt(hash_cript, hashstring);
    var hashdecript_string = hashdecript.toString(CryptoJS.enc.Utf8); 
    
    console.log(hash_cript_string);
    console.log(hashdecript_string);*/
    document.getElementsByName("password")[0].value = hash_cript_string;
    console.log(typeof(hash_cript_string));
}

function decriptPwd() {
     var plainpass = document.getElementsByName("pass"); //vect cu toate parolele criptate
    
    var hashnode = document.getElementById("myhash"); 
    var hashstring = hashnode.textContent;      //string cu valoarea hash 
     var hashdecript = ""; 
    
    document.getElementsByName("pass")[0].removeAttribute("hidden");
    
    for (var i=1; i<plainpass.length; i++) {
        hashdecript = CryptoJS.AES.decrypt(plainpass[i].textContent, hashstring);
        var hashdecript_string = hashdecript.toString(CryptoJS.enc.Utf8); 
        document.getElementsByName("pass")[i].textContent = hashdecript_string;
        document.getElementsByName("pass")[i].removeAttribute("hidden");
        
    }
    document.getElementById("showpass").setAttribute("hidden", "hidden");
}

function dateValidation() {
    var selectedText = document.getElementById('datePicker').value;
    var selectedDate = new Date(selectedText);
    var now = new Date();
    if (selectedDate < now) { 
    document.getElementById("datePicker").style.borderColor = "red";
        alert("TTL must be in the future!");
    return false; 
   }
    document.getElementById("datePicker").style.borderColor = "1px solid #d9d9d9";
    return true;
}

function validate(txt){
    name_val = document.getElementsByName(txt)[0].value; 
    if (/[^a-zA-Z0-9]/.test(name_val))
    {
        document.getElementsByName(txt)[0].style.borderColor = "red";
        return false; 
    }
      
    document.getElementsByName(txt)[0].style.border = "1px solid #d9d9d9";
    document.getElementsByName(txt)[0].style.borderTop = "1px solid #c0c0c0";
    return true; 
}

