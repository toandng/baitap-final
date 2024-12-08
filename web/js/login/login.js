// validation login

function validationForm() {
    // get element by forms
    var msv = document.forms["myForm"]["fname"].value;
    var password = document.forms["myForm"]["fpassword"].value;
    // get element console.error();

    var fnameError = document.getElementById('fname-error');
    var fpasswordError = document.getElementById('fpassword-error');

    fnameError.innerText = "";
    fpasswordError.innerText = "";
    
    var isValid = true
    // check msv and password is not found
    if(msv == "" ){
        fnameError.innerText = "MSV không được để trống";
        isValid = false;
    }
    if(password == "") { 
        fpasswordError.innerText = "Password không được để trống";
        isValid = false;
         // Check lenght password
    }else if(password.length  < 6) {
        fpasswordError.innerText = "Password phải từ đủ 6 kí tự trở lên";
        isValid = false;
    }
    return isValid;
}