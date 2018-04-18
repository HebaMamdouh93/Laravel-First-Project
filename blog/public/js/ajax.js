
$(function () {
  
    $("#delete").click(function(){
        alert("Post will be deleted ,Are you sure?");
    });
    $('.viewajax').click(function () {
		 
		var postID = $(this).attr("post-id");
		console.log(postID);
        $.ajax({
            url: '/posts/ajax',
            type: 'post',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
            data: {postId: postID},
            success: function (response) {
                console.log(response.post);
                $("#title").html(response.post.title);
                $("#description").html(response.post.description);
                $("#username").html(response.username);
                $("#email").html(response.email);
               
                
            }
        });

    });

    //github account
    $("#github-button").click(function(){
       
        $('.alert').show();
        
     });
 
});
