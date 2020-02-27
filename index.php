<?php include 'config/config.php'; ?>
<?php include 'lib/Database.php'; ?>
<?php include 'helpers/format.php'; ?>
<?php include 'inc/header.php'; ?>
<?php include 'inc/slider.php'; ?>
	
<?php 
$fm=new Format();
$db=new Database();
?>
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
		<?php 
			$query="select * FROM tbl_post limit 3";
			$post=$db->select($query);
			if($post){
			while($result=$post->fetch_assoc()):
			
			
			?>
			<div class="samepost clear">
				<h2><a href="post.php?id=<?php echo $result['id'];?>"><?php echo $result['title'];?></a></h2>
				<h4><?php echo $fm->formatdate($result['date']);?>, By<a href="post.php?id=<?php echo $result['id'];?>"><?php echo $result['author'];?></a></h4>
				 <a href="post.php?id=<?php echo $result['id'];?>"><img src="admin/upload/<?php echo $result['image'];?>" alt="post image"/></a>
				<?php echo $fm->textshorten($result['body'],300);?>
				<div class="readmore clear">
					<a href="post.php?id=<?php echo $result['id'];?>">Read More</a>
				</div>
			</div>
			<?php 
			
			endwhile;
			}else{
				header("Location:404.php");
			};
			?>
			
		</div>
<?php include 'inc/sidebar.php'; ?>
<?php include 'inc/footer.php'; ?>