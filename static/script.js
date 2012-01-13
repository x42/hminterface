function go (url) {
	document.location=url;
}

function linkhover (id, img) {
	var i = document.getElementById(id);
	if (!i) return;
	i.src='static/img/'+img;
}
