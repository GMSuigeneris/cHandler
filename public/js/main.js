 $(document).ready(function(){
      $('#toggle').click(function(){
        if($('#projects').css('display') =='none'){
            $('#projects').fadeIn(2000);
             $('#toggle').html('Close Project Panel');
        }else{
            $('#projects').fadeOut(2000);
            $('#toggle').html('View Projects');
        }  
    });

     $('#projecttoggle').click(function(){
        if($('#tasks').css('display') =='none'){
            $('#tasks').fadeIn(2000);
             $('#projecttoggle').html('Close Task Panel');
        }else{
            $('#tasks').fadeOut(2000)
            $('#projecttoggle').html('View Tasks');
        }  
    });

     $('#commentToggle').click(function(){
        if($('#comments').css('display') =='none'){
            $('#comments').fadeIn(2000);
             $('#commentToggle').html('Close comment panel');
        }else{
            $('#comments').fadeOut(2000);
            $('#commentToggle').html('View Comments');
        }  
    });
 });
