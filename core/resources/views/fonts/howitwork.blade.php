@extends('fonts.layouts.master')
@section('site')
    | How It Works
@endsection
@section('content') 
<style>
    /* ======================== */
/*   Syed Sahar Ali Raza    */
/* ======================== */
p,h3{
    color:black;
}
@import url(https://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700italic,700,900italic,900);
@import url(https://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900);
@import url(https://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900);
body{background-color:#eee;}

#generic_price_table{
    background-color: #f0eded;
}

/*PRICE COLOR CODE START*/
#generic_price_table .generic_content{
    background-color: #fff;
}

#generic_price_table .generic_content .generic_head_price{
    background-color: #f6f6f6;
}

#generic_price_table .generic_content .generic_head_price .generic_head_content .head_bg{
    border-color: #e4e4e4 rgba(0, 0, 0, 0) rgba(0, 0, 0, 0) #e4e4e4;
}

#generic_price_table .generic_content .generic_head_price .generic_head_content .head span{
    color: #525252;
}

#generic_price_table .generic_content .generic_head_price .generic_price_tag .price .sign{
    color: #414141;
}

#generic_price_table .generic_content .generic_head_price .generic_price_tag .price .currency{
    color: #414141;
}

#generic_price_table .generic_content .generic_head_price .generic_price_tag .price .cent{
    color: #414141;
}

#generic_price_table .generic_content .generic_head_price .generic_price_tag .month{
    color: #414141;
}

#generic_price_table .generic_content .generic_feature_list ul li{  
    color: #a7a7a7;
}

#generic_price_table .generic_content .generic_feature_list ul li span{
    color: #414141;
}
#generic_price_table .generic_content .generic_feature_list ul li:hover{
    background-color: #E4E4E4;
    border-left: 5px solid #0e265d;
}

#generic_price_table .generic_content .generic_price_btn a{
    border: 1px solid #0e265d; 
    color: #0e265d;
} 

#generic_price_table .generic_content.active .generic_head_price .generic_head_content .head_bg,
#generic_price_table .generic_content:hover .generic_head_price .generic_head_content .head_bg{
    border-color: #0e265d rgba(0, 0, 0, 0) rgba(0, 0, 0, 0) #0e265d;
    color: #fff;
}

#generic_price_table .generic_content:hover .generic_head_price .generic_head_content .head span,
#generic_price_table .generic_content.active .generic_head_price .generic_head_content .head span{
    color: #fff;
}

#generic_price_table .generic_content:hover .generic_price_btn a,
#generic_price_table .generic_content.active .generic_price_btn a{
    background-color: #0e265d;
    color: #fff;
} 
#generic_price_table{
    margin: 50px 0 50px 0;
    font-family: 'Raleway', sans-serif;
}
.row .table{
    padding: 28px 0;
}

/*PRICE BODY CODE START*/

#generic_price_table .generic_content{
    overflow: hidden;
    position: relative;
    text-align: center;
}

#generic_price_table .generic_content .generic_head_price {
    margin: 0 0 20px 0;
}

#generic_price_table .generic_content .generic_head_price .generic_head_content{
    margin: 0 0 50px 0;
}

#generic_price_table .generic_content .generic_head_price .generic_head_content .head_bg{
    border-style: solid;
    border-width: 90px 1411px 23px 399px;
    position: absolute;
}

#generic_price_table .generic_content .generic_head_price .generic_head_content .head{
    padding-top: 40px;
    position: relative;
    z-index: 1;
}

#generic_price_table .generic_content .generic_head_price .generic_head_content .head span{
    font-family: "Raleway",sans-serif;
    font-size: 28px;
    font-weight: 400;
    letter-spacing: 2px;
    margin: 0;
    padding: 0;
    text-transform: uppercase;
}

#generic_price_table .generic_content .generic_head_price .generic_price_tag{
    padding: 0 0 20px;
}

#generic_price_table .generic_content .generic_head_price .generic_price_tag .price{
    display: block;
}

#generic_price_table .generic_content .generic_head_price .generic_price_tag .price .sign{
    display: inline-block;
    font-family: "Lato",sans-serif;
    font-size: 28px;
    font-weight: 400;
    vertical-align: middle;
}

#generic_price_table .generic_content .generic_head_price .generic_price_tag .price .currency{
    font-family: "Lato",sans-serif;
    font-size: 60px;
    font-weight: 300;
    letter-spacing: -2px;
    line-height: 60px;
    padding: 0;
    vertical-align: middle;
}

#generic_price_table .generic_content .generic_head_price .generic_price_tag .price .cent{
    display: inline-block;
    font-family: "Lato",sans-serif;
    font-size: 24px;
    font-weight: 400;
    vertical-align: bottom;
}

#generic_price_table .generic_content .generic_head_price .generic_price_tag .month{
    font-family: "Lato",sans-serif;
    font-size: 18px;
    font-weight: 400;
    letter-spacing: 3px;
    vertical-align: bottom;
}

#generic_price_table .generic_content .generic_feature_list ul{
    list-style: none;
    padding: 0;
    margin: 0;
}

#generic_price_table .generic_content .generic_feature_list ul li{
    font-family: "Lato",sans-serif;
    font-size: 18px;
    padding: 15px 0;
    transition: all 0.3s ease-in-out 0s;
}
#generic_price_table .generic_content .generic_feature_list ul li:hover{
    transition: all 0.3s ease-in-out 0s;
    -moz-transition: all 0.3s ease-in-out 0s;
    -ms-transition: all 0.3s ease-in-out 0s;
    -o-transition: all 0.3s ease-in-out 0s;
    -webkit-transition: all 0.3s ease-in-out 0s;

}
#generic_price_table .generic_content .generic_feature_list ul li .fa{
    padding: 0 10px;
}
#generic_price_table .generic_content .generic_price_btn{
    margin: 20px 0 32px;
}

#generic_price_table .generic_content .generic_price_btn a{
    border-radius: 50px;
    -moz-border-radius: 50px;
    -ms-border-radius: 50px;
    -o-border-radius: 50px;
    -webkit-border-radius: 50px;
    display: inline-block;
    font-family: "Lato",sans-serif;
    font-size: 18px;
    outline: medium none;
    padding: 12px 30px;
    text-decoration: none;
    text-transform: uppercase;
}

#generic_price_table .generic_content,
#generic_price_table .generic_content:hover,
#generic_price_table .generic_content .generic_head_price .generic_head_content .head_bg,
#generic_price_table .generic_content:hover .generic_head_price .generic_head_content .head_bg,
#generic_price_table .generic_content .generic_head_price .generic_head_content .head h2,
#generic_price_table .generic_content:hover .generic_head_price .generic_head_content .head h2,
#generic_price_table .generic_content .price,
#generic_price_table .generic_content:hover .price,
#generic_price_table .generic_content .generic_price_btn a,
#generic_price_table .generic_content:hover .generic_price_btn a{
    transition: all 0.3s ease-in-out 0s;
    -moz-transition: all 0.3s ease-in-out 0s;
    -ms-transition: all 0.3s ease-in-out 0s;
    -o-transition: all 0.3s ease-in-out 0s;
    -webkit-transition: all 0.3s ease-in-out 0s;
} 
@media (max-width: 320px) { 
}

@media (max-width: 767px) {
    #generic_price_table .generic_content{
        margin-bottom:75px;
    }
}
@media (min-width: 768px) and (max-width: 991px) {
    #generic_price_table .col-md-3{
        float:left;
        width:50%;
    }
    
    #generic_price_table .col-md-4{
        float:left;
        width:50%;
    }
    
    #generic_price_table .generic_content{
        margin-bottom:75px;
    }
}
@media (min-width: 992px) and (max-width: 1199px) {
}
@media (min-width: 1200px) {
}
#generic_price_table_home{
     font-family: 'Raleway', sans-serif;
}

.text-center h1,
.text-center h1 a{
    color: #7885CB;
    font-size: 30px;
    font-weight: 300;
    text-decoration: none;
}
.demo-pic{
    margin: 0 auto;
}
.demo-pic:hover{
    opacity: 0.7;
}

#generic_price_table_home ul{
    margin: 0 auto;
    padding: 0;
    list-style: none;
    display: table;
}
#generic_price_table_home li{
    float: left;
}
#generic_price_table_home li + li{
    margin-left: 10px;
    padding-bottom: 10px;
}
#generic_price_table_home li a{
    display: block;
    width: 50px;
    height: 50px;
    font-size: 0px;
}
#generic_price_table_home .blue{
    background: #3498DB;
    transition: all 0.3s ease-in-out 0s;
}
#generic_price_table_home .emerald{
    background: #0e265d;
    transition: all 0.3s ease-in-out 0s;
}
#generic_price_table_home .grey{
    background: #7F8C8D;
    transition: all 0.3s ease-in-out 0s;
}
#generic_price_table_home .midnight{
    background: #34495E;
    transition: all 0.3s ease-in-out 0s;
}
#generic_price_table_home .orange{
    background: #E67E22;
    transition: all 0.3s ease-in-out 0s;
}
#generic_price_table_home .purple{
    background: #9B59B6;
    transition: all 0.3s ease-in-out 0s;
}
#generic_price_table_home .red{
    background: #E74C3C;
    transition:all 0.3s ease-in-out 0s;
}
#generic_price_table_home .turquoise{
    background: #1ABC9C;
    transition: all 0.3s ease-in-out 0s;
}

#generic_price_table_home .blue:hover,
#generic_price_table_home .emerald:hover,
#generic_price_table_home .grey:hover,
#generic_price_table_home .midnight:hover,
#generic_price_table_home .orange:hover,
#generic_price_table_home .purple:hover,
#generic_price_table_home .red:hover,
#generic_price_table_home .turquoise:hover{
    border-bottom-left-radius: 50px;
    border-bottom-right-radius: 50px;
    border-top-left-radius: 50px;
    border-top-right-radius: 50px;
    transition: all 0.3s ease-in-out 0s;
}
#generic_price_table_home .divider{
    border-bottom: 1px solid #ddd;
    margin-bottom: 20px;
    padding: 20px;
}
#generic_price_table_home .divider span{
    width: 100%;
    display: table;
    height: 2px;
    background: #ddd;
    margin: 50px auto;
    line-height: 2px;
}
#generic_price_table_home .itemname{
    text-align: center;
    font-size: 50px ;
    padding: 50px 0 20px ;
    border-bottom: 1px solid #ddd;
    margin-bottom: 40px;
    text-decoration: none;
    font-weight: 300;
}
#generic_price_table_home .itemnametext{
    text-align: center;
    font-size: 20px;
    padding-top: 5px;
    text-transform: uppercase;
    display: inline-block;
}
#generic_price_table_home .footer{
    padding:40px 0;
}

.price-heading{
    text-align: center;
}
.price-heading h1{
    color: #666;
    margin: 0;
    padding: 0 0 50px 0;
}
.demo-button {
    background-color: #333333;
    color: #ffffff;
    display: table;
    font-size: 20px;
    margin-left: auto;
    margin-right: auto;
    margin-top: 20px;
    margin-bottom: 50px;
    outline-color: -moz-use-text-color;
    outline-style: none;
    outline-width: medium ;
    padding: 10px;
    text-align: center;
    text-transform: uppercase;
}
.bottom_btn{
    background-color: #333333;
    color: #ffffff;
    display: table;
    font-size: 28px;
    margin: 60px auto 20px;
    padding: 10px 25px;
    text-align: center;
    text-transform: uppercase;
}
.demo-button:hover{
    background-color: #666;
    color: #FFF;
    text-decoration:none;
    
}
.bottom_btn:hover{
    background-color: #666;
    color: #FFF;
    text-decoration:none;
}

</style>
    <!-- contact us section start-->
    <section class="contact-area" id="contact">
        
        <div class="contat-section-right-bg contact-form-bg"></div>
        
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-lg-12 ">
                    <div class="contact-wrapper contact-form-bg">
                        
                        <div class="contact-form">
                           
                   <div id="generic_price_table">   
<section>
        <div class="container">
            
            <!--BLOCK ROW START-->
            <div class="row">
                <div class="col-md-12">
                
                    <!--PRICE CONTENT START-->
                    <div class="generic_content active clearfix">
                        
                        <!--HEAD PRICE DETAIL START-->
                        <div class="generic_head_price clearfix">
                        
                            <!--HEAD CONTENT START-->
                            <div class="generic_head_content clearfix">
                            
                                <!--HEAD START-->
                                <div class="head_bg"></div>
                                <div class="head">
                                    <span>How It Works</span>
                                </div>
                                <!--//HEAD END-->
                                
                            </div>
                            <!--//HEAD CONTENT END-->
                            
                            <!--PRICE START-->
                            <div class="generic_price_tag clearfix">    
                              
                            </div>
                            <!--//PRICE END-->
                            
                        </div>                            
                        <!--//HEAD PRICE DETAIL END-->
                        
                        <!--FEATURE LIST START-->
                        <div class="generic_feature_list" style="margin: 10px;">
                          <p>The working mechanism at Zage Technologies is elementary that is networking. Make networks and refer members to the company. In return, you will make a profit. The company has set certain limits, you are supposed to act accordingly.  </p>
                            <h3>Free Coins</h3>
                            <p>Subscribe to us through a link and win 1000 free coins. Get us five members and avail a chance to win 500 more free coins making $150.</p>
                            <h3>Network Marketing</h3>
                            <p>Apart from winning free 1500 coins, through networking, you can earn more than that. After upgradation to $20, you will become the premium member of the company. Now, you will only make three members join us via your link and get a $2 profit when each member upgrades its account to premium. After these three members, you will pass level one by earning a total profit of $46.  <br> After every three direct memberships through your link, you will make a lot of money at the end of the month as per company’s authority. If 30 members join through you, the company owes you $460. Interestingly, Zage Coin is offering a two months additional profit as well.
                                After two months, if you succeed in linking 50 members, you will have a $50 profit. For 10,000 members, the profit will increase to $20,000. Remember, the company allows you to withdraw it only after getting the mentioned members within two months. </p>
                                
                            <h3>Referral Earning </h3>
                            <p>You can earn a deposit bonus of 10% by referring any person who invests in any of our packages. The company will pay the commission up to three levels. For instance, on your reference, if person A invests $1000 you will get 5% ($50) passing your first level. Another person B invests another $1000 on person A’s reference, you will get 3% ($30). This will be your second level. Further, if B referred C also investing $1000, you will get a 2% ($20) by completing the third level. </p>
                            
                            <h3>Salary </h3>
                            <p>There is a monthly salary system if you get a member through your link to invest a minimum of $10,000 besides your base investment. You will get a monthly salary commission of 3%, 2%, and 1% on getting funding by referral members at your first, second, and third level, respectively. For instance, if you manage to get an investment of $30,000 through three levels, after thirty days you will earn an amount of $600.  </p>
                            <h3>Extra Bonus </h3>
                            <p>On getting more investments and members, you will be awarded extra bonuses every month or two. These could be in the form of cash, gifts, or tours.   </p>
                        </div>
                        <!--//FEATURE LIST END-->
                        
                    </div>
                    <!--//PRICE CONTENT END-->
                        
                </div>
            </div>  
            <!--//BLOCK ROW END-->
            
        </div>
    </section>             
    
</div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact us section end-->
@endsection