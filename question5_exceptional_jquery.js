/**
* Question 5
* Extend jQuery to highlight all paragraphs in  apage with a light yellow 
* background on the condition that the paragraph contains the class "exceptional"
*
* Should the paragraph itself have the class or a child element contained within
* the paragraph have the class?
* 
* Please note that I 
*/


(function($) {
	jQuery.fn.extendExceptionalParagraphHasClass = function () {
	// if the paragraph itself has the class 
		var paragraphs = $('p'),
			numberofps = paragraphs.length,
			i = 0,
			oneP;

		for (i; i < numberofps; i += 1) {
			oneP = $(paragraphs[i]);
			if (oneP.hasClass('exceptional')) {
				oneP.css({
					'background-color': '#FFF8A9'
				});
			}
		}
	}
})(jQuery);



(function($) {
	jQuery.fn.extendExceptionalParagraphContainsClass = function () {
	// if the paragraph "contains" an element that has the class
		var paragraphs = $('p'),
			numberofps = paragraphs.length,
			i = 0,
			oneP;

		for (i; i < numberofps; i += 1) {
			oneP = $(paragraphs[i]);
			if (oneP.find('.exceptional')) {
				oneP.css({
					'background-color': '#FFF8A9'
				});
			}
		}
	}
})(jQuery);