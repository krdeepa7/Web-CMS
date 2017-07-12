//tinymce.init({ selector:'textarea' });

$(document).ready(function(){
 	
// alert('cnfjkvj bjf');
$('#selectAllBoxes').click(function(event){
	if(this.checked)
	{
		$('.checkBoxes').each(function(){

			this.checked=true;
		});
		
	}
	else
	{
		$('.checkBoxes').each(function(){
		this.checked=false;
		});
	}

});


});


function loadUsersOnline(){

	$.get("function.php?onlineusers=result",function(data){

		$(".usersonline").text(data);

	});

}

setInterval(function(){
	loadUsersOnline();
},500);
