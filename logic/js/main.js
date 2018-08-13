document.addEventListener('DOMContentLoaded', function(){
	var testSection = document.querySelector('#tests-sec');
	if (testSection) {
		testSection.addEventListener('click', sectionHandler);
		function sectionHandler(event){
			if (event.target.classList.contains('test__watched')) {
				var btn = event.target;
				var testId = btn.parentNode.getAttribute('data-test-id');
				var watchedCounter = document.querySelector('#watched-count');
				var currentCount = watchedCounter.textContent;
				doAjax({
					method: 'POST',
					url: 'logic/watched_test.php',
					data: 'watched_id=' + testId,
					contentType: 'application/x-www-form-urlencoded',
					callback: function(){
						if (btn.classList.contains('test__watched_active')) {
							btn.textContent = '(Не прошёл)';
							--currentCount;
						}else{
							btn.textContent = '(Прошёл)';
							++currentCount;
						}
						btn.classList.toggle('test__watched_active');
						watchedCounter.textContent = currentCount;
					}
				});
			}
			if (event.target.classList.contains('test__del')) {
				event.preventDefault();
				var test = {};
				test.container = event.target.parentNode;
				test.id = test.container.getAttribute('data-test-id');
				test.title = test.container.firstElementChild.textContent;
				doAjax({
					method: 'POST',
					url: 'logic/del_test.php',
					data: 'del_id=' + test.id,
					contentType: 'application/x-www-form-urlencoded',
					callback: delTest
				});
				function delTest(response){
					if (response) {
						alert('Тест по дисциплине ' + test.title + ' был успешно удалён!');
						test.container.nextElementSibling.remove()
						test.container.remove()
					}else{
						alert('Во время удаления теста что-то пошло не так');
					}
				}
			}
		}
	}
	var moreBtn = document.querySelector('#showMore');
	if (moreBtn) {
		moreBtn.addEventListener('click', showMoreTests);
		var lastShownTest = 0;
		function showMoreTests(){
			lastShownTest++;
			doAjax({
				method: 'POST',
				url: 'logic/more_tests.php',
				data: 'last_shown_test=' + lastShownTest, 
				contentType: 'application/x-www-form-urlencoded',
				callback: appendTest
			});
			function appendTest(test){
				test = JSON.parse(test);
				if (test) {
					var title = document.createElement('h4');
					var link = document.createElement('a');
					link.href = 'tests.php#test_' + test.id;
					link.textContent = test.title;
					title.appendChild(link);
					document.body.appendChild(title);
				}else{
					moreBtn.textContent = 'Тестов больше нет :(';
					moreBtn.setAttribute('disabled', 'disabled');
				}
			}
		}
	}
	if (document.forms.newTest) {
		document.forms.newTest.addEventListener('submit', addNewTest);
		function addNewTest(event){
			event.preventDefault();
			var formData = new FormData(this);
			doAjax({
				method: 'POST',
				url: 'logic/add_test.php',
				data: formData,
				callback: function(response){
					alert(response);
				}
			});
		}
	}
});