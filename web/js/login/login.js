// document.getElementById('login-btn').addEventListener('click', async function () {
//     const formData = new FormData(document.getElementById('login-form'));

//     // Gửi AJAX request
//     try {
//         const response = await fetch('http://127.0.0.1:5500/web/res/page/page.html', {
//             method: 'POST',
//             body: formData,
//         });
//         const result = await response.json();

//         if (result.success) {
//             // Đăng nhập thành công
//             alert('Đăng nhập thành công!');
//             window.location.href = '/web/res/page/page.html'; // Điều hướng đến page.html
//         } else {
//             // Hiển thị lỗi
//             document.getElementById('fname-error').textContent = result.errors.fname || '';
//             document.getElementById('fpassword-error').textContent = result.errors.fpassword || '';
//         }
//     } catch (error) {
//         console.error('Error:', error);
//         alert('Đã xảy ra lỗi, vui lòng thử lại!');
//     }
// });



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