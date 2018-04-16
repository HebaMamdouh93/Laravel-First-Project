
$(function () {
  
    $("#delete").click(function(){
       // console.log("ds");
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
 
});
