<script>
	var scriptAdded = false;

	window.addEventListener('DOMContentLoaded', function () {
		console.log('[GTM] 発火: DOMContentLoaded');
		setTimeout(function () {
			if (!scriptAdded) {
				console.log('[GTM] 発火: 3秒経過で読み込み開始');
				var newScript = document.createElement('script');
				newScript.src = 'https://www.googletagmanager.com/gtm.js?id=GTM-NDGX9N42';
				newScript.async = true;
				
				newScript.addEventListener('load', function() {
					console.log('[GTM] 読み込み完了');
				});
				
				newScript.addEventListener('error', function() {
					console.log('[GTM] 読み込みエラー（プレビューモードでは正常）');
				});
				
				var head = document.head || document.getElementsByTagName('head')[0];
				head.appendChild(newScript);
				scriptAdded = true;
			}
		}, 3000); 
	});
</script>


<script async src="https://starcraft-popup.com/assets/js/popup.js?site=rs-cardloan"></script>

