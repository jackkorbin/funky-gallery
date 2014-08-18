var sct = 300;

$(document).ready(function(){
	
	$('#bg').click(function (){
		$('#choosefilebg').click();
	});
	
	
	$('#choosef').click(function (){
		$('#choosefile').click();
	});
	
	
	
	
	
	
	
	
	$('#choosefile').change(function(){
	/*	
		var file = this.files[0];
    	var name = file.name;
    	var size = file.size;
   	 	var type = file.type;
		
		
		var formData = new FormData($('form')[0]);
    $.ajax({
        url: 'upload.php',  //Server script to process data
        type: 'POST',
        xhr: function() {  // Custom XMLHttpRequest
            var myXhr = $.ajaxSettings.xhr();
            if(myXhr.upload){ // Check if upload property exists
                myXhr.upload.addEventListener('progress',progressHandlingFunction, false); // For handling the progress of the upload
            }
            return myXhr;
        },
        //Ajax events
        beforeSend: beforeSendHandler,
        success: completeHandler,
        error: errorHandler,
        // Form data
        data: formData,
        //Options to tell jQuery not to process data or worry about content-type.
        cache: false,
        contentType: false,
        processData: false
    });
	
	
		$('#imagecontainer').load('loadgallery.php');
		
	});
	*/
	this.form.submit();

});
	
	
	
	
	$('#choosefilebg').change(function(){
		
		this.form.submit();
		 
	});
	
	$('#logout').click(function (){
		$('#logouto').click();
	});
	
	
	$('#imagecontainer').load('loadgallery.php');
	
	
	
	$('#overlay, #imagepopup').click(function(){
		$('#overlay').hide(200);
		$('#imagepopup').hide(400);
	});
	
	
	 $('#imagecontainer').scroll(function(){
        if ($('#imagecontainer').scrollTop() > sct){
            loadimages(10,0);
			sct += 320;
			
        }
    });
	
	
	
});

  var n = 20;
  	
  function inc(q){
	n += q;
	
  }
  function del(e){
  	n -= e;
	
  }
  

		var scrolled=0;
		
		
     function loadimages(q,scr){   
		if(scr){	 		
			scrolled=scrolled+700;
			$("#imagecontainer").animate({
				        scrollTop:scrolled
			},500);
		}
			
	 	
	 	$('#gif').html('<img src="progress.gif">');	        
		$.post('load.php',{var:"tanuj", id:n , inc:q },function(data){
					$('#gif').before(data);	 	
		});
		$('#gif').html('View More');
		inc(q);	
		 
		 
	 }
	 
	 
	 
	 
	 function loadfriends(){
	 
	 	$.post('friends.php',function(data){
				$('#imagecontainer').html(data);	 	
		});
		
	 
	 }
	
	 function gallery(){
			
		$.post('loadgallery.php','',function(data){
			$('#imagecontainer').html(data);	 	
		});
		sct = 300;
		 
	 }
	 
	 
	 function deleteajax(imgname,id){
		 
		 $('#'+id+'').hide(300);
		 
		$.ajax({
			  type: 'POST',
			  data: {
				  del: imgname
				  },
			  url: 'delete.php',
			  success: function(msg) {
				  notification(msg);
			  }
		 })
		 
			del(1);
		 loadimages(1,0);
		 
		 
		 
	 }
	 
	 function deleteall(){
		 
		 $.ajax({
			 type:'POST',
			 url:'delete.php',
			 data: { delall : 1},
			  success: function(msg) {
				  notification(msg);
			  }
			 
			 });
		$('#imagecontainer').load('loadgallery.php');
		n = 0;
		 
	 }
	 function deletebg(){
	 	$.ajax({
			type:'POST',
			url:'delete.php',
			data: { delbg:2 },
			success: function(msg) {
				  notification(msg);
			  }
			});
		$('body').css('background','center');	
			
	 	
	 }
	 
	 function popup(url,user){
		 
		 $('#imagepopup').css('background-image','url(userimages/'+user+'/'+url+')');
		 
		 $('#imagepopup').show(300);
		 
		 
		 $('#overlay').show(100);
	 	
		
	 }
	 function notification(msg){
		 $('#notification').html(msg);
		 $('#notification').animate({ 'right':'0px' },200);
		 $('#notification').show(100);
		 $('#notification').delay(300).hide(100);
		
		 $('#notification').animate({ 'right':'-250px' },300);
		 
		 
	 }