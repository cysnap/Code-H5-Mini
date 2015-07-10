function reply(authorId, commentId, commentBox) {
	var author = document.getElementById(authorId).innerHTML;
	var insertStr = '<a href="#' + commentId + '">@' + author.replace(/\t|\n/g, "") + '</a> \n';
	appendReply(insertStr, commentBox);
}

function quote(authorId, commentId, commentBodyId, commentBox) {
	var author = document.getElementById(authorId).innerHTML;
	var comment = document.getElementById(commentBodyId).innerHTML;
	var insertStr = '<blockquote>\n<span><a href="#' + commentId +  '">' + author + '</a> :</span>' + comment.replace(/\t/g, "") + '</blockquote>\n';
	appendReply(insertStr, commentBox);
}

function appendReply(insertStr, commentBox) {

	if(document.getElementById(commentBox) && document.getElementById(commentBox).type == 'textarea') {
		field = document.getElementById(commentBox);
	} else {
		alert("评论没有开启！");
		return false;
	}
 
	if (field.value.indexOf(insertStr) > -1) {
		alert("您刚才不是已经点过了么？！");
		return false;
	}
 
	if (field.value.replace(/\s|\t|\n/g, "") == '') {
		field.value = insertStr;
	} else {
		field.value = field.value.replace(/[\n]*$/g, "") + '\n\n' + insertStr;
	}
 
	field.focus();
}


