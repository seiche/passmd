function generate(){
	length = 20;
	var chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	var result = '';
    for (var i = length; i > 0; --i)
		result += chars[Math.round(Math.random() * (chars.length - 1))];
    document.getElementById('passwd').value = result;
}

function remove(id, table){
	var bool = confirm("Are you sure you want to delete this entry?")
	if(!bool) return;
	var ajax = new XMLHttpRequest();
	var form = new FormData();
	form.append('id', id);
	form.append('table', table);
	ajax.open("POST", "php/remove.php", true);
	ajax.send(form);
	ajax.onload = function(){
		window.location = "/";
	}
}