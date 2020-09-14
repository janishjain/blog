<div class="wrapper">
	<div style="display: flex; height:100%">
		<?php $this->load->view('sidebar');?>
		<main class="feed-wrapper my-2 ml-1 mr-2 p-4">
			<header class="feed-header">
				<a href = "<?php echo site_url('dashboard/');?>"><i class="fas fa-long-arrow-alt-left fa-2x"></i></a>
				<font size="+3"> &nbsp Feed </font>
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addpost" style="float: right"><i class="far fa-plus-square"></i> Add New Post</button>
			</header><hr style="color:black;"></hr>
			<div class="jumbotron jumbotron-fluid py-4">
				<div class="container">
					<h1 class="display-4"><?php echo $post['title']; ?></h1>
					<p class="lead"><?php echo $post['content']; ?></p>
				</div>
			</div>
			<div class="btn-group btn-group-lg mb-4" role="group" aria-label="Basic example">
				<button type="button" class="btn btn-danger" title="Like" id="like" data-postid="<?php echo $post['postid'];?>" >
					<?= $post['likes']; ?>&nbsp&nbsp<i class="fas fa-heart"></i></button>
				<button type="button" class="btn btn-dark" title="Dislike" id="dislike" data-postid="<?php echo $post['postid'];?>" >
					<?= $post['dislikes']; ?>&nbsp&nbsp<i class="fas fa-heart-broken"></i></button>
				<button type="button" class="btn btn-primary" title="Comment" data-toggle="modal" data-target="#comment_modal">
					<?= $post['comments']; ?>&nbsp&nbsp<i class="fas fa-comment"></i></button>
			</div>
			<div class="btn-group btn-group-lg mb-4 ml-2" role="group" aria-label="Basic example" style="float:right">
				<?php if ($post['userid'] == $_SESSION['userid'] || $_SESSION['userid'] == 1) {?>
					<button type="button" class="btn btn-success" title="Edit" data-toggle="modal" data-target="#editpost"><i class="fas fa-pen-square"></i></button>
					<button type="button" class="btn btn-warning" title="Delete" data-toggle="modal" data-target="#deletepost"><i class="fas fa-trash-alt"></i></button>
				<?php } ?>
				<button type="button" class="btn btn-secondary" title="Report"><i class="fas fa-flag"></i></button>
			</div>

			<div id="comments-container">
			<?php if (!empty($comments)) { ?>
				<?php foreach ($comments as $comment) { ?>
					<div class="jumbotron jumbotron-fluid py-2 mb-1" style="border-radius:15px">
						<div class="container">
							<h5><b><?php echo trim($comment['name']); ?></b></h5>
							<p class="pb-0"><?php echo trim($comment['comment']); ?></p>
							<i><font size="-1"><?php echo trim($comment['add_time']); ?></font></i>
						</div>
					</div>
				<?php }?>
			<?php }?>
			</div>
		</main>
	</div>

	<!-- MODAL ADD POST -->
	<div class="modal fade" id="addpost" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add Post</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form>
				<div class="form-group">
					<label for="title" class="col-form-label">Title</label>
					<input type="text" class="form-control" id="edit-title">
				</div>
				<div class="form-group">
					<label for="content" class="col-form-label">Content</label>
					<textarea class="form-control" id="edit-content"></textarea>
				</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				<button type="button" id="post" onclick="post()" class="btn btn-primary">Post</button>
			</div>
			</div>
		</div>
	</div>

	<!-- MODAL EDIT POST -->
	<div class="modal fade" id="editpost" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit Post</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form>
				<div class="form-group">
					<label for="title" class="col-form-label">Title</label>
					<input type="text" class="form-control" id="edittitle" value="<?php echo $post['title'];?>">
				</div>
				<div class="form-group">
					<label for="content" class="col-form-label">Content</label>
					<textarea class="form-control" id="editcontent"><?php echo $post['content'];?></textarea>
				</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				<button type="button" id="edit" class="btn btn-primary">Edit</button>
			</div>
			</div>
		</div>
	</div>

	<!-- MODAL ADD COMMENT -->
	<div class="modal fade" id="comment_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add Comment</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form>
				<div class="form-group">
					<input type="text" class="form-control" id="comment">
				</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				<button type="button" data-postid="<?php echo $post['postid'];?>" id="addcomment" class="btn btn-primary">Comment</button>
			</div>
			</div>
		</div>
	</div>

	<!-- MODAL DELETE -->
	<div class="modal fade" id="deletepost" tabindex="-1"  aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title">Delete</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<p>Are you sure you want to delete this post?</p>
		</div>
		<div class="modal-footer">
			<form action="<?php echo site_url('posts/delete');?>" method="post">
			<input type="hidden" name="pid" id ="pid" value="<?php echo $post['postid'];?>">
			<button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
			<button type="submit" class="btn btn-danger">Delete</button>
			</form>
		</div>
		</div>
	</div>
	</div>
</div>

<script>
$(document).ready(function(){
	$("#notifications").click(function(){
		$(".settings").css('display', 'none');
		$(".notification").css('display', 'block');
		});
	$("#back").click(function(){
		$(".settings").css('display', 'block');
		$(".notification").css('display', 'none');
		});

	$('#like').click(function(e)
	{
		e.preventDefault();
		var pid = $(this).data("postid");
		$.ajax({
			url:'<?php echo base_url('posts/like')?>',
			type:'POST',
			data:{postid: pid},
			dataType:'JSON',
			success:function(result)
			{
				if(result)
				{
					$("#like").html(""+result.likes+"&nbsp&nbsp<i class='fas fa-heart'></i>");
				}
			}
		});
	});

	$('#dislike').click(function(e)
	{
		e.preventDefault();
		var pid = $(this).data("postid");
		$.ajax({
			url:'<?php echo base_url('posts/dislike')?>',
			type:'POST',
			data:{postid:pid},
			dataType:'JSON',
			success:function(result)
			{console.log(result)
				if(result)
				{
					$("#dislike").html(result.dislikes+"&nbsp&nbsp<i class='fas fa-heart'></i>");
				}
			}
		});
	});
	
	$('#addcomment').click(function(e)
	{
		e.preventDefault();
		var username = '<?php echo $_SESSION['username']?>';
		var pid = $(this).data("postid");
		var comment = $('#comment').val();
		var time = '<?php echo date('Y-m-d H:i:s');?>';
		$.ajax({
			url:'<?php echo base_url('posts/comment')?>',
			type:'POST',
			data:{comment: comment,
			postid:pid},
			dataType:'JSON',
			success:function(result)
			{
				if(result)
				{
					$("#comment_modal").modal("hide");
					$("#comments-container").append("<div class='jumbotron jumbotron-fluid py-2 mb-1' style='border-radius:15px'><div class='container'><h5><b>"+username+"</b></h5><p class='pb-0'>"+comment+"</p><i><font size='-1'>"+time+"</font></i></div></div>");
				}
			}
		});
	});

	$('#edit').click(function(e)
	{
		e.preventDefault();
		var pid = <?php echo $post['postid']?>;
		var title = $('#edittitle').val();
		var content = $('#editcontent').val();
		$.ajax({
			url:'<?php echo base_url('posts/edit')?>',
			type:'POST',
			data:{id:pid,
			title: title,
			content:content},
			dataType:'JSON',
			success:function(result)
			{
				if(result)
				{
					$("#editpost").modal("hide");
					location.reload();
				}
			}
		});
	});
});
</script>
