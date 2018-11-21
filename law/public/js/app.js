mui.ready(function() {
	mui('html')[0].style.fontSize = (window.document.body.clientWidth / 25) + 'px';
});
window.addEventListener('resize', function(event) {
	mui('html')[0].style.fontSize = (window.document.body.clientWidth / 25) + 'px';
})