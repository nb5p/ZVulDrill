function change(mode) {
    if (mode == 'admin') {
        document.forms.loginForm.action = "../admin/checkLogin.php"
    } else if (mode == 'user') {
        document.forms.loginForm.action = "../user/checkLogin.php"
    }
}