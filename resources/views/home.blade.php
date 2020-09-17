@extends('layouts.app')
@section('content')

<h1 align=center>
    Home
</h1>

            <div class="panel panel-default">
                <div class="panel-heading">Home</div>

                <div class="panel-body">
                    <div class="tm-list-group">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h4>
                        Welcome dear {{ Auth::user()->usuario }}, this web allows you to control 
                        the requirements in your projects, with the following but not limited functionalities.  
                    </h4>
                    <li >
                        Want to invite team members?
                    </li>  
                    <li>
                        See the real progress
                    </li>
                    <li>
                        Manage many projects at the same time?
                    </li>
                        All and others functionalities are at your disposal.
                    </div>
                     
                </div>

                   
            </div>

            
@endsection
