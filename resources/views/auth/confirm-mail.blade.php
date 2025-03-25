<x-guest-layout>
   <section class="login-content">
      <div class="row m-0 align-items-center bg-white vh-100">
         <div class="col-md-6 p-0">
            <div class="card card-transparent auth-card shadow-none d-flex justify-content-center mb-0">
               <div class="card-body">
                  <a href="{{route('dashboard')}}" class="navbar-brand d-flex align-items-center mb-3">
                     <img src="{{asset('images/')}}"
                     <h4 class="logo-title ms-3">{{env('APP_NAME')}}I</h4>
                  </a>
                  <img src="{{asset('images/auth/mail.png')}}" class="img-fluid" width="80" alt="">
                  <h2 class="mt-3 mb-0">Success !</h2>
                  <p class="cnf-mail mb-1">A email has been send to youremail@domain.com. Please check for an
                     email from company and click
                     on the included link to reset your password.</p>
                  <div class="d-inline-block w-100">
                     <a href="{{route('dashboard')}}" class="btn btn-primary mt-3">Back to Home</a>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-6 d-md-block d-none bg-primary p-0 mt-n1 vh-100 overflow-hidden">
            <img src="{{asset('images/auth/03.png')}}" class="img-fluid gradient-main animated-scaleX" alt="images">
         </div>
      </div>
   </section>
</x-guest-layout>
