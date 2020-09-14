<div class="wrapper">
	<div style="display: flex; height:100%">
		<?php $this->load->view('sidebar');?>
		<main class="feed-wrapper my-2 ml-1 mr-2 p-4">
			<header class="feed-header"><font size="+3">Feed</font>
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#post_modal" style="float: right"><i class="far fa-plus-square"></i> Add New Post</button>
			</header><hr style="color:black;"></hr>
            <?php foreach($users as $people){?>
                <div class="col-sm-3" style="margin-top: 2%;">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><img src="<?php if($people->avatar == null){echo base_url('/avatar/avatar.jpg');}else{echo base_url('/avatar/'.$people->avatar);}?>" width="50px" height="50px" style="border-radius: 10px"><?php echo "&nbsp&nbsp".$people->fname." ".$people->lname;?></h5>
                            <p class="card-text "><b><h6><?php echo "@".$people->username;?></h6></b></p>
                            <button id="user<?php echo $people->userid;?>"
                            <?php if($this->people->check($people->userid, $_SESSION['userid'])==true)
                            {
                                echo 'class="btn btn-success" disabled>Following';
                            }
                            else 
                            {
								echo 'class="btn btn-primary" type="submit">Follow';
                            } ?>
                            </button>
                        </div>
                    </div>
                </div>
				

<script type="text/javascript">
$(document).ready(function() {
  $('#user<?php echo $people->userid;?>').click(function(e)
  {
    e.preventDefault();
    $.ajax({
        url:'<?php echo base_url('people/addfriend');?>',
        type:'POST',
        data:{user1:'<?php echo $people->userid;?>',
        user2:'<?php echo $_SESSION['userid'];?>'},
        dataType:'JSON',
        success:function(req)
        {
			if(req==true)
			{
				$("#user<?php echo $people->userid;?>").text("Following");
				$("#user<?php echo $people->userid;?>").attr("class","btn btn-success");
				$("#user<?php echo $people->userid;?>").attr("disabled","disabled");
			}
        }
    });
  });
});

</script>
<?php }?>
</main>
</div>
</div>
</body>
