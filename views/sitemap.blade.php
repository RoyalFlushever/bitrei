@extends('app')

@section('pageTitle', "Карта сайта")
@section('pageDesc', "Карта сайта")
@section('pageKeys', "Карта сайта")

@section('content')

<div class="col-md-12 col-sm-12 col-xs-12" style="padding-top:30px;">
<div class="container">

<h1 class="text-center">Карта сайта</h1>

<?

															
	$website_settings_1 = DB::table('website_settings')
		->where("id", "=", 1)
		->get();
									
	$category_1 = DB::table('post_category')
	->where("act", "=", "1")
	->orderBy("id", "DESC")
	->get();

	foreach($category_1 as $arr_cat){

		echo "<div class='sitemap-cattitle'><b>".$arr_cat->name."</b></div><ul class='sitemap-ul'>";

		$category_2 = DB::table('post')
			->where("cat", "=", $arr_cat->id)
			->orderBy("id", "DESC")
			->get();
			
		foreach($category_2 as $arr_post){

			echo "<li><a href='".$website_settings_1[0]->value."/blog/".$arr_post->url."'>".$arr_post->name."</a></li>";

		}
		
		echo "</ul>";
		
	}
	


?>

</div>
</div>

<div class="clearfix"></div>

@endsection