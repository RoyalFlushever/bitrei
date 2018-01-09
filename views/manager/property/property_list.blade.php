@extends('common.dash')

@section('content')

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Property</h2>
                    <!--<a href="/manager/property-add" class="btn btn-primary pull-right">Add new</a>-->
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>#</th>
						  <th>State</th>
						  <th>City</th>
						  <th>Title</th>
						  <th>Details</th>
						  <th>Edit</th>
                        </tr>
                      </thead>
                      <tbody>
						<? foreach($data as $item){ ?>
                        <tr>
                          <th scope="row"><?= $item->id ?></th>
						  <td><?= $item->state ?></td>
						  <td><?= $item->city ?></td>
						  <td><a href="/manager/property-details?id=<?= $item->id ?>"><?= $item->title ?></a></td>
						  <td><a href="/manager/property-details?id=<?= $item->id ?>">Details</a></td>
                          <td><a href="#">Edit</a></td>
                        </tr>
						<? } ?>
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>

@endsection