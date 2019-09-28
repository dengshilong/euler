function addComment(comment_ID, author_ID, comment_box) {
    var text = $(author_ID).innerHTML
    var insert_str = '<a href="#' + comment_ID + '">@' + text + '</a>\n'; 
    if ($(comment_box).value.replace(/\s|\t|\n/g,"") == "") {
        $(comment_box).value = insert_str;
    } else {
        if ($(comment_box).value.indexOf(insert_str) > -1) {
            alert("你已经回复了这条");
            return false;
        }
        $(comment_box).value = $(comment_box).value.replace("/[\n]*$/g", "") + '\n' + insert_str;
    }
    //$(comment_box).focus();
}
function $(id){
    return document.getElementById(id);
} 
function validate_form() {
    var user = document.comment_form.user.value
    if (user == null  || user == "") {
        alert("请填写昵称");
        return false;
    }
    var email = document.comment_form.email.value
    var patt = /^.+?@.+/;
    if (!patt.test(email)) {
        alert("请填写正确的邮箱地址");
        return false;
    }
    var comment_content = document.comment_form.comment_content.value
    if (comment_content == null || comment_content == "") {
        alert("评论内容不能为空");
        return false;
    }
    return true; 
}
