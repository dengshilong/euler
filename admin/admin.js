function get_focus() {
    if (document.form.login.username.value == "") {
        document.form.login.username.focus();
    } else {
        document.form.login.password.focus();
    }
}
window.onload=get_focus();
