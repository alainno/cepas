// TScroller
(function($){
	//var $loader = null;
	
	//var $this = $(this);
	
	var methods = {
		
		create:function(params){
			var params = params || {};
			//var offset = params['offset'] || 1;
			
			var $this = $(this);
			//alert(params.mensaje);
			//alert('ancho:' + $this.width());
			var $ul = $this.children('ul');
			
			var $lis = $ul.children('li');
			var total_lis = $lis.length;
			
//			console.log('total lis: ' + total_lis);
			
			var $first_li =  $lis.eq(0);
			
//			var thumbnail_width = $first_li.find('img').width() + parseInt($first_li.css('margin-right')) + parseInt($first_li.css('margin-left'));
			var thumbnail_width = $first_li.width() + parseInt($first_li.css('margin-right')) + parseInt($first_li.css('margin-left'));
			console.log('li width:' + $first_li.width());
			
			//console.log('img width: ' + thumbnail_width);
			//console.log('window width: ' + $this.width());
			var offset = params['offset'] || Math.floor($this.width() / thumbnail_width);
			
			console.log('offset: ' + offset);
			
			if(total_lis > 0){
				$ul.css({
					width:total_lis*thumbnail_width + 'px'
				})
			}
			
			// mover
			$(params['go']).click(function(){
				$this.show().animate({scrollLeft: $this.scrollLeft()+thumbnail_width*offset},'quick');
				return false;						 
			});

			$(params['back']).click(function(){
				$this.show().animate({scrollLeft: $this.scrollLeft()-thumbnail_width*offset},'quick');
				return false;							 
			});
		}
	}
	
	$.fn.tscroller = function(method){
		// Method calling logic
		if ( methods[method] ) {
			return methods[ method ].apply( this, Array.prototype.slice.call( arguments, 1 ));
		} else if ( typeof method === 'object' || ! method ) {
			return methods.init.apply( this, arguments );
		} else {
			$.error( 'Method ' +  method + ' does not exist on jQuery.tscroller' );
		}
	}
})(jQuery);