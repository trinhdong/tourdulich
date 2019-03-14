var // all vairable 
    btnShowForm = document.querySelector('.wrapper .show-form'),
    overlay = document.querySelector('.overlay'),
    form = document.querySelector('.wrapper .form-login'),
    username = document.querySelector('.wrapper .form-login .content .group .username'),
    password = document.querySelector('.wrapper .form-login .content .group .password'),
    togglePassword = document.querySelector('.wrapper .form-login .content .toggle-password'),
    errorUsername = document.querySelector('.wrapper .form-login .content .error-username'),
    errorPassword = document.querySelector('.wrapper .form-login .content .error-password'),
    welcome = document.querySelector('.wrapper .form-login .welcome'),
    btnLogin = document.querySelector('.wrapper .form-login .footer .btn-login'),
    btnCancel = document.querySelector('.wrapper .form-login .footer .btn-cancel');

togglePassword.onchange = function () {
    if (this.checked == true) {
        password.type = 'text';
    } else {
        password.type = 'password';
    }
};
// Show form and overlay
btnShowForm.onclick = function () {
    overlay.style.display = 'block';
    form.style.display = 'block';
};
// Hide form and overlay
btnCancel.onclick = function () {
    overlay.style.display = 'none';
    form.style.display = 'none';
    username.value = '';
    password.value = '';
    welcome.innerHTML = '';
    togglePassword.checked = false;
};
// Hide form and overlay
overlay.onclick = function () {
    btnCancel.click();   
};
// show name after welcome if not empty
btnLogin.onclick = function () {
    if (username.value.trim() == '') {
        errorUsername.style.display = 'block';
        errorPassword.style.display = 'none';
    } else if (password.value.trim() == '') {
        errorUsername.style.display = 'none';
        errorPassword.style.display = 'block';
    } else {
        errorUsername.style.display = 'none';
        errorPassword.style.display = 'none';
        welcome.innerHTML = 'Welcome ' + '<span>' + username.value + '</span>';
    }
};