var aggregatesRender = function (aggregates) {
	var value = aggregates['sum'];
	if( value == null){
	     value=0
	}
	var renderstring = '<div style="float: right; margin: 4px; overflow: hidden;"><b>' +   value  + '</b></div>';
	return renderstring;
}   


if ($(window).width() <= 530) {  

	var canvas = document.getElementsByClassName("chartResize");  
  	canvas[0].height = 90;

}     

