const container = document.querySelector('.container');
const content = document.querySelector('.content');

container.addEventListener('click', function(e) {

	if (e.target.className == 'nextContent') {
		content.src = e.target.src;
	}
});