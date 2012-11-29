var dzogchen = (function($){
	function Dzogchen(){
		var menuOpen = false;
		function isMenuOpen() {
			return menuOpen;
		}
		function setMenuOpen(bool){
			menuOpen = bool;
			var menu = $("div#head-menu div.menu");
			if(isMenuOpen()){
				menu.show();
			} else {
				menu.hide();
			}
		}
		function toggleMenuOpen(){
			menuOpen = !menuOpen;
		}
		return {
			toggleMenuOpen:toggleMenuOpen,
			setMenuOpen:setMenuOpen,
			isMenuOpen:isMenuOpen
		};
	}
	var dzogchen = new Dzogchen();
	$(document).ready(function(){
		$("div#head-menu div.mouse-area").mouseenter(function(){
			dzogchen.setMenuOpen(true);
		}).mouseleave(function(){
			dzogchen.setMenuOpen(false);
		});
		// hack, wrap <h1/> in article to in background opacity filter
		var header1 = $("div#article-content > h1");
		var wrappedHeader = header1.wrap(function(){
			return "<div class=\"filter\" id=\"axcf\" />" + $(this).text() + "</div>";
		});
	});
	return dzogchen;
}(jQuery));


