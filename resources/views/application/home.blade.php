@extends('layouts.base-listi')
@section('content')
     <!-- Main jumbotron for a primary marketing message or call to action -->




     
<a id="top"></a>
<div  style=" z-index: -1; height:100%;">
<div class="jumbotron" style="background-image:url(/img/default-header.png);">
<div class="contianer">
<div class="row">
<br><br><br><br><br>
<div class="col-md-8 col-md-offset-2 text-center" style="background-color:#fff; opacity: 0.7;">
<div class="col-md-12" style="color:#000;">
<h1>{{$userpage->fname}} {{$userpage->lname}}</h1>
<p>Welcome to Listi! A website you can use to easily list your properties online. With Listi you won't
won't have to worry about coding complex websites or design features. Listi provides a clean and simple way
to list your properties online without ever having to set up a website or go through any type of web design.</p>
  </div>
</div>
<div class="col-md-12">
<br><br><br><br><br><br><br><br>
</div>
</div>
</div>
</div> 
</div>


<section id="features"><a id="features"></a>
<div class="jumbotron"><div class="container"><h2>Listings</h2></div></div>
<!-- End of Search Form -->

    <div class="container">
      <!-- Example row of columns -->
      @foreach ($listings as $listing)
      
      
      <div class="col-md-6">
        <div class="col-md-4">
      @if ($listing->featured_pic != 0)
  <div class="col-md-12">
    <div class="thumbnail">
      <img src="/uploads/listings/{{$listing->id}}/{{$listing->featured_filename}}" class="img-responsive" width="144" height="144" alt="...">
      </div>
    </div>
  @else
    <div class="col-md-12">
    <div class="thumbnail">
      <img src="/img/house.png" class="img-responsive" width="144" height="144" alt="...">
      </div>
    </div>
  @endif
      </div>
      <div class="col-md-8">
          <h2>{{$listing->house_num}} {{$listing->street_name}}</h2><hr>
          <p>SirrusPro allows you to add properties to your online page with ease. Just enter some information upload your photos and your listing is ready to go!</p>
        </div>
        </div>
        
       
       @endforeach
       <br>
       
     </div>

    


<section id="contact">
<div class="jumbotron"><div class="container"><h2>Contact Us</h2></div></div>

        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <h2 class="section-heading">Let's Get In Touch!</h2>
                    <hr class="primary">
                    <p>Ready to start your next project with us? That's great! Give us a call or send us an email and we will get back to you as soon as possible!</p>
                </div>
                </div>
                <div class="row">
                
                  <form role="form" action="" method="post">
          <div class="col-md-8 col-md-offset-2 text-center">
          <div class="panel panel-default">
                <div class="panel-heading">Contact Information</div>
                <div class="panel-body">
            <div class="form-group">
                <label for="InputName">Your Name</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="InputName" id="InputName" placeholder="Enter Name" required>
                    <span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span>
                  </div>
              </div>
              <div class="form-group">
                <label for="InputEmail">Your Email</label>
                <div class="input-group">
                  <input type="email" class="form-control" id="InputEmail" name="InputEmail" placeholder="Enter Email" required  >
                    <span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span>
                  </div>
              </div>
              <div class="form-group">
                <label for="InputMessage">Message</label>
                <div class="input-group">
                    <textarea name="InputMessage" id="InputMessage" class="form-control" rows="5" required></textarea>
                    <span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span>
                  </div>
              </div>
              
              <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info pull-right">
          </div>
        </form>
          </div>
                </div><br>
                <div class="row">
                <div class="col-md-4 col-md-offset-2 text-center">
                    <i class="fa fa-phone fa-3x wow bounceIn"></i>
                    <p><b>{{$userpage->phone_number}}</b></p>
                </div>
                <div class="col-md-4 text-center">
                    <i class="fa fa-envelope-o fa-3x wow bounceIn" data-wow-delay=".1s"></i>
                    <p><a href="mailto:your-email@your-domain.com">{{$userpage->email}}</a></p>
                </div>
            </div>
        </div>
    </section>


      
@stop