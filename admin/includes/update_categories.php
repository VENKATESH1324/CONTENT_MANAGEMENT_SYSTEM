   	<form action="" method="post">
                        		<div class="form-group">
                        		<label for="cat-title">Edit Category</label>
                        		<?php 
                        		if(isset($_GET['edit'])){

								$cat_edit= $_GET['edit'];

								$query_edit = "SELECT * FROM Categories WHERE cat_id = $cat_edit" ;
								$result_edit = mysqli_query($connection,$query_edit);
								while($row = mysqli_fetch_assoc($result_edit)){

									$cat_id=$row['cat_id'];
									$cat_title=$row['cat_title'];

                               ?>
						<input type="text" class="form-control" name="cat_title" value="<?php if(isset($cat_title)) {echo $cat_title; } ?>">

							<?php	} } ?>

							<?php  // update query on new page

								if(isset($_POST['update_category'])){

								$the_cat_title = $_POST['cat_title'];
								$query = "UPDATE categories SET cat_title ='{$the_cat_title}' WHERE cat_id = {$cat_id} ";
								$update_query = mysqli_query($connection,$query);
								if(!$update_query){
									die("query failed".mysqli_error($connection));

								}
							}


							?>





                        			
                        		</div>
                        		<div class="form-group">
                        			<input class ="btn btn-primary" type="submit" name="update_category" value="Update Category">
                        		</div>
                        	</form> 