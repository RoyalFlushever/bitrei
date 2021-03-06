@extends('common.dash')

@section('content')

	<div class="col-md-12 col-sm-12 col-xs-12">

        <div class="col-md-12">
			<div class="x_panel">
                 <div class="x_title">
					<h2><a href="/manager/documents-list"><u>Documents</u></a> -> Edit/Add</h2>
					<div class="clearfix"></div>
				</div>
                <div class="x_content">
				
				<form action="/manager/documents-add" method="post" enctype="multipart/form-data">
			
				{{ csrf_field() }}
            
				<? if(isset($data[0])){?>
				<input type="hidden" name="id" value="{{ $data[0]->id }}">
				<?}?>
				
                <div class="col-sm-12 col-md-12">
                    <div class="form-group">
                        <label>Document category</label>
                        <select class="form-control" name="category_id">
							<?

							$array = \DB::table('_member_documents_categories')
							//->where("id", "=", $id)
							->get();
							
							foreach($array as $item){
								
								if(isset($data[0]) && $data[0]->category_id == $item->id){$sel="selected";}else{$sel="";}
								
								echo "<option value='".$item->id."' $sel>".$item->name."</option>";
								
							}
							
							?>
						</select>
                    </div>
                </div>
				
                <div class="col-sm-12 col-md-12">
                    <div class="form-group">
                        <label>Member</label>
                        <input type="text" class="form-control" name="user_id" value="<? if(isset($data[0])){?>{{ $data[0]->user_id }}<?}?>">
                    </div>
                </div>
				
                <div class="col-sm-12 col-md-12">
                    <div class="form-group">
                        <label>Property</label>
                        <input type="text" class="form-control" name="property_id" value="<? if(isset($data[0])){?>{{ $data[0]->property_id }}<?}?>">
                    </div>
                </div>
				
                <div class="col-sm-12 col-md-12">
                    <div class="form-group">
                        <label>Document Upload</label>
                        <input type='file' name='upload'>
                    </div>
					<? if(isset($data[0]) && $data[0]->path_name != ""){ ?>
					<div class="form-group">
					<a href="/manager/download-document?id=<?= $data[0]->id ?>">Download file</a>
					</div>
					<? } ?>
                </div>
				
                <div class="form-group col-sm-12 col-md-12">
                    <input type="submit" class="btn btn-primary waves-effect waves-light" value="Save"/>
                </div>

            </form>
			</div>
			</div>
		</div>

	</div>





<? if(isset($data[0]) && isset($data[0]->id)){ ?>

			
	<a href="/manager/documents-categories-del?id=<?= $data[0]->id ?>" class="btn btn-danger waves-effect waves-light">Caution! Delete?</a>
			
			
<? } ?>
		

@endsection