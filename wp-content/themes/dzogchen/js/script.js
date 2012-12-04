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
	});
	return dzogchen;
}(jQuery));


