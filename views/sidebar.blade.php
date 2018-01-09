<div class="sidebar">

			 <div class="links-left nobg">
			 
                    <div class="links-left-title">ПОПУЛЯРНЫЕ РЕЦЕПТЫ</div>	
					
					<ul class="sidebar-blog-posts">
					<?
					
					$data_posts = DB::table('post')
						->where("type","=","0")
						->orderBy(DB::raw('RAND()'))
						->limit(8)
						->get();
			
					if(isset($data_posts) && count($data_posts)>0){
						foreach($data_posts as $post){
					
							echo "<li><a href='/blog/".$post->url."'>".$post->name."</a></li>";
					
						}
					}
					
					?>
					</ul>
					
					<div class="clearfix"></div>
            </div>  


						
</div>