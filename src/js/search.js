var btn = document.getElementById('search-btn'),
	query = document.getElementById('search-query'),
	result = document.getElementById('result');

query.addEventListener('keyup', function (e) {
	
	
	if (query.value == '') {
		return;
	}
	// send the input value to the server
	sendSearch(query.value);
});

// sendSearch function to send the text to server
function sendSearch(q) {
	const url = 'http://localhost/adv-search/app/controllers/Search.php';
	let res = getAjax(url, q);
}
// ajax
function getAjax(url, param) {
	let xhr = new XMLHttpRequest();
	xhr.open('GET', `${url}?q=${param}`, true);
	xhr.setRequestHeader('Content-Type', 'application/json');
	xhr.onload = function(){
		if (this.status == 200) {
			runDom(this.responseText);
		}
	};
	
	xhr.send();
}

function runDom(text) {
	let res = JSON.parse(text);
	var output = '<h4 class="display-4">Suggestions for "'+ query.value +'"</h4>';
	output += '<ul class="list-group">';

	for (let i = 0; i < res.length; i++) {
		output += '<li class="list-group-item">' + res[i].title + 'Author: ' + res[i].author +'</li>';
	}
	output += '</ul>';
	//result.classList.add('container');
	if (res.length == 0) {
		output += '<li class="list-group-item">No Results.</li>';
	}
	result.innerHTML = output;
}