@extends('main')

@section('title', '| Homepage')

@section('content')
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron" style="background-image:url('http://www.planwallpaper.com/static/images/maxresdefault.jpg')">
                  <h1>EveryJuan, Don't Be Financially Illiterate!</h1>
                  <p class="lead">All About Food, Travel, but Most Importantly How You Can Afford Them Through Financial Literacy. Because the Best Things in Life Are Not Always For Free</p>
                </div>
            </div>
        </div> <!-- end of header .row -->

        <div class="row">
            <div class="col-md-8">
                
                @foreach($posts as $post)

                    <div class="post">
                        <h3>{{ $post->title }}</h3>
                        <p>{{ substr(strip_tags($post->body), 0, 300) }}{{ strlen(strip_tags($post->body)) > 300 ? "..." : "" }}</p>
                        <a href="{{ url('blog/'.$post->slug) }}" class="btn btn-primary">Read More</a>
                    </div>

                    <hr>

                @endforeach

            </div>

            <div class="col-md-3 col-md-offset-1">
                  <h3>Featured News</h3>

                  <hr>
                  
                  <h4><strong>SSS to increase contributions of members to over 12.5%</strong></h4>
                  <h5>Published: 4:02 p.m., Oct. 1, 2017 </h5>
                      <p>Starting January next year, the contribution rate of Social Security System (SSS) members will increase to over 12.5 percent of the monthly salary credit to enable the pension fund for workers in the private sector to cover the higher pensions of retirees.
                      <br>
                      <a href="http://business.inquirer.net/237794/sss-social-security-system-contribution-hike-rate-january-pension-tax-reform-package" target="_blank">Read more</a></p>

                  <hr>    


                  <h4><strong>Budgeting for the self-employed</strong></h4>
                  <h5>September 11, 2017</h5> 
                      <p>Fixed expenses come first and above all else. Fixed expenses are constant. These include your rent or mortgage. Although you have rights as a tenant, you don’t want to go through all that hassle just to uphold it. The same applies to your monthly amortization. Utility bills also go under this category. It can be demoralizing to have power and water cut off because of unpaid dues.
                      <br>
                      <a href="https://businessmirror.com.ph/budgeting-for-the-self-employed/" target="_blank">Read more</a></p>

                  <hr>    

                  <h4><strong>Is the customer always right?</strong></h4>
                  <h5>By A. R. Samson October 2, 2017</h5>
                      <p>Perhaps, the rise of the self-service culture enshrined in the Internet has eroded the quality (or even desire) for pampering the customer. E-commerce has left the servicing of customers to a programmer’s algorithm. The shopper can buy anything in the net: airline ticket, hotel booking, jeans, shoes, theater tickets, and car rental. The interaction between the automated service provider and customer is a multiple-choice sequence of decisions that leads into a payment method.
                      <br>
                      <a href="http://bworldonline.com/customer-always-right/" target="_blank">Read more</a></p>
            </div>
        </div>
@stop