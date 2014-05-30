/**
 * 
 */
(function($){
	var cur=null;
	
	$(cur).click(edit);
	function edit(){
		var value=$(cur).html();
		$(cur).html("<input type='text' value='"+value+"'/>");
		$(cur).children('input').blur(function(){
			var value=$(this).val();
			var index=$(this).index();
			$(cur).children().eq(index).remove();
			$(cur).html(value);
		});
	}
	function addRow (context){
		var text=null;
		for(var item in context){
			text=text+"<td id="+item+">"+context[item]+"</td>"
		}
		$(cur).html("<tr>"+text+"</tr>");
	}

})(jquery)