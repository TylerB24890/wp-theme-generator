const parallax = (el, xpos, speedFactor, outerHeight) => {
	var $this = el
	var getHeight
	var firstTop
	var paddingTop = 0
	var $window = $(window)
	var windowHeight = $window.height()

	//get the starting position of each element to have parallax applied to it
	$this.each(function(){
		firstTop = $this.offset().top + 56
	})

	if (outerHeight) {
		getHeight = function(jqo) {
			return jqo.outerHeight(true)
		}
	} else {
		getHeight = function(jqo) {
			return jqo.height()
		}
	}

	// setup defaults if arguments aren't specified
	if (arguments.length < 1 || xpos === null) xpos = "50%"
	if (arguments.length < 2 || speedFactor === null) speedFactor = 0.1
	if (arguments.length < 3 || outerHeight === null) outerHeight = true

	// function to be called whenever the window is scrolled or resized
	function update(){
		var pos = $window.scrollTop()

		$this.each(function(){
			var $element = $(this)
			var top = $element.offset().top
			var height = getHeight($element)

			// Check if totally above or totally below viewport
			if (top + height < pos || top > pos + windowHeight) {
				return
			}

			$this.css('backgroundPosition', xpos + " " + Math.round((firstTop + pos) * speedFactor) + "px")
			$this.css('margin-bottom', Math.round((firstTop + pos) * speedFactor) + "px")
		})
	}

	$window.bind('scroll', update).resize(update)
	update()
}

export { parallax }
