<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Welcome to flexible form designs!</div>
                  <div class="card-body">
                   @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                           {{ __('A fresh mail has been sent to your email address.') }}
                       </div>
                   @endif
                    <h1>Full Name: <b>{!! $fullname !!}</b> </h1><br>
                    <h2>link: <b> <a href="{!! $msg !!}"></a></b></h2><br>
                    <h2>Date: {!! $date !!}</h2>
               </div>
           </div>
       </div>
   </div>
</div>
