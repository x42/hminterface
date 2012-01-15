function go (url) {
	document.location=url;
}

function linkhover (id, img) {
	var i = document.getElementById(id);
	if (!i) return;
	i.src='static/img/'+img;
}
function highlight (elem, onoff) {
	if (onoff) {
		elem.style.background='#888';
		elem.style.color='#fff';
		elem.style.fontWeight='bold';
		elem.style.borderStyle='dotted';
	} else {
		elem.style.background='transparent';
		elem.style.color='transparent';
		elem.style.fontWeight='normal';
		elem.style.borderStyle='none';
	}
}

function detailnfo (id, onoff) {
	if (onoff) {
		document.getElementById(id).style.display='block';
	} else {
		document.getElementById(id).style.display='none';
	}
}
