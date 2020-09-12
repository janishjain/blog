<footer class="page-footer font-small blue"  style="margin-bottom: 0%;">
    <div class="footer-copyright text-center py-3">
        <?php $attr=array('id'=>'postsubmit');?>
        <?php echo form_open_multipart('feed/posts',$attr);?>
        <center>
            <input type="file" class="btn btn-dark" name="postimage" id="postimage">	
            <input type="text" class="btn btn-light" name="caption"  id="caption" placeholder="enter caption" style="border:4px solid grey">
            <button type="submit" class="btn btn-dark" name="addpost">Upload</button>
        </center>
        </form>
    </div>
</footer>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
