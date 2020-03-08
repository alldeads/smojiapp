@extends('admin.master')


@section('content')
    
    

    <div class="content dashboard">
       <div class="container">
          <div class="row">
             <div class="col-xs-12">
                <div class="page-title-box">
                   <h4 class="page-title">Dashboard </h4>
                   <div class="clearfix"></div>
                </div>
             </div>
          </div>
       </div>
    </div>


<div class="row">
                <div class="col-sm-12">
                    
                    
                    <div class="card-box table-responsive">
                        
                        <div class="clearfix"></div>
                        <hr>

                        <table id="datatable-scroller" class="table table-striped table-bordered  table-colored table-info">
                            <thead>
                            <tr>
                                <th width="18%">Name</th>
                                <th>Email</th>
                                <th>Referral Code</th>
                                <th>Reference Of </th>                                
                                <th>Date </th>                                
                            </tr>

                            @foreach ($referrak_data as $referral)
                                <tr>
                                  <td>{{ $referral->name }}</td>
                                  <td>{{ $referral->email }}</td>
                                  <td>{{ $referral->reference_referralcode }}</td>
                                  <td>
                                    <strong>Name : </strong>{{ $referral->reference_name }}<br>
                                    <strong>Email : </strong>{{ $referral->reference_email }}<br>
                                    <strong>Referral Code : </strong>{{ $referral->reference_referralcode }}
                                  </td>
                                  <td>{{ $referral->created_at}}</td>
                                </tr>
                            @endforeach

                            
                            </thead>
                        </table>
                    </div>
                </div>
            </div>






@endsection

@section('js')

@endsection