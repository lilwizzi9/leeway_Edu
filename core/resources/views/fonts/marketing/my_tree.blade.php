@extends('fonts.layouts.user')
@section('site')
| My | Tree
@endsection
@section('style')
<style>
   .userInfo {
   display: none;
   }
   .tree ul {
   padding-top: 20px; position: relative;
   transition: all 0.5s;
   -webkit-transition: all 0.5s;
   -moz-transition: all 0.5s;
   }
   .popover-title {
   margin: 4px;
   padding: 7px 14px;
   font-size: 14px;
   width: 248px;
   background-color: #1b334d;
   border-bottom: 1px solid #ebebeb;
   border-radius: 5px 5px 0 0;
   }
   .popover.right>.arrow:after {
   left: 1px;
   border-left-width: 0;
   border-right-color: #1b334d;
   }
   .popover-content {
   padding: 9px 14px;
   color: black;
   font-size: 13px;
   }
   .tree li {
   float: left; text-align: center;
   list-style-type: none;
   position: relative;
   padding: 20px 5px 0 5px;
   transition: all 0.5s;
   -webkit-transition: all 0.5s;
   -moz-transition: all 0.5s;
   }
   /*We will use ::before and ::after to draw the connectors*/
   .tree li::before, .tree li::after{
   content: '';
   position: absolute; top: 0; right: 50%;
   border-top: 1px solid #ccc;
   width: 50%; height: 20px;
   }
   .tree li::after{
   right: auto; left: 50%;
   border-left: 1px solid #ccc;
   }
   /*We need to remove left-right connectors from elements without 
   any siblings*/
   .tree li:only-child::after, .tree li:only-child::before {
   display: none;
   }
   /*Remove space from the top of single children*/
   .tree li:only-child{ padding-top: 0;}
   /*Remove left connector from first child and 
   right connector from last child*/
   .tree li:first-child::before, .tree li:last-child::after{
   border: 0 none;
   }
   /*Adding back the vertical connector to the last nodes*/
   .tree li:last-child::before{
   border-right: 1px solid #ccc;
   border-radius: 0 5px 0 0;
   -webkit-border-radius: 0 5px 0 0;
   -moz-border-radius: 0 5px 0 0;
   }
   .tree li:first-child::after{
   border-radius: 5px 0 0 0;
   -webkit-border-radius: 5px 0 0 0;
   -moz-border-radius: 5px 0 0 0;
   }
   /*Time to add downward connectors from parents*/
   .tree ul ul::before{
   content: '';
   position: absolute; top: 0; left: 50%;
   border-left: 1px solid #ccc;
   width: 0; height: 20px;
   }
   .tree li a{
   border: 1px solid #ccc;
   padding: 5px 10px;
   text-decoration: none;
   color: #666;
   font-family: arial, verdana, tahoma;
   font-size: 11px;
   display: inline-block;
   border-radius: 5px;
   -webkit-border-radius: 5px;
   -moz-border-radius: 5px;
   transition: all 0.5s;
   -webkit-transition: all 0.5s;
   -moz-transition: all 0.5s;
   }
   /*Time for some hover effects*/
   /*We will apply the hover effect the the lineage of the element also*/
   .tree li a:hover, .tree li a:hover+ul li a {
   background: #c8e4f8; color: #000; border: 1px solid #94a0b4;
   }
   /*Connector styles on hover*/
   .tree li a:hover+ul li::after, 
   .tree li a:hover+ul li::before, 
   .tree li a:hover+ul::before, 
   .tree li a:hover+ul ul::before{
   border-color:  #94a0b4;
   }
   #mydiv {
   position: absolute;  
   text-align: center;
   }
   #mydivheader {
   padding: 10px;
   cursor: move;
   color: #fff;
   }
   .popover .popover-header {
   font-size: 0.9375rem;
   border-bottom: 0;
   color: #f6f8f9;
   background: #336693;
   }
   .bs-popover-right .arrow::after, .bs-popover-auto[x-placement^="right"] .arrow::after {
   left: 1px;
   border-right-color: #336693;
   }
   /*Thats all. I hope you enjoyed it.
   Thanks :)*/
</style>
@endsection
@section('main-content')
<div class="page-content-wrapper">
   <div class="page-content">
       <div class="row">      
         <div class="col-md-12">
             <form action="{{route('tree.username.search')}}" method="get">
             <div class="row">
                 <div class="col-md-6 offset-md-6">
                     <div class="panel panel-info">
    				<div class="panel-heading" style="color: #0e265d; background-color: #fee600;">
    					<h3 class="panel-title" >How to use ?</h3>
    				</div>
    				<div class="panel-body">
    					<p>On this feature you can see all of the members listed on your network, ranging from the sponsored person and existing members under you.</p>
    					<p>
    						1. Hover Your mouse into the tree chart<br>
    						2. You can drag the chart so you can extend your diagram view<br>
    						3. If you want to see your downline's network, just click on their box and you will get the information
    					</p>
    				</div>
    				<div class="clearfix"></div>
    			</div>
                 </div>
                 <div class="col-md-6 offset-md-6">
                  <div class="row" style="border:1px solid; padding:5px;">
                    <a href="javascript:void(0)" class="back" style="font-size:30px;"><i class="fa fa-arrow-circle-left"></i> Go Back</a>
                  </div>
                 </div>
             </div>
             </form>
         </div>
         </div> 

      <div class="tree" id="mydiv" style="width:10000px;">
         <?php
            $root = \App\User::where('username', $treefor)->first();
            if($root->paid_status == 0){
                $paid = '<b class="btn btn-warning btn-block">Not Upgrade User</b>';
            }else{
                $paid = '<b class="btn btn-primary btn-block">Upgrade User</b>';
            }
            
            ?>
         <ul id="mydivheader">
            <li>
               <a href="{{ url('tree/search') }}?username={{$root->username}}" class="user" data-toggle="popover" title="{{$root->first_name}} {{$root->last_name}}" data-content="TYPE: <?php if($root->paid_status==1){ echo'Upgrade User'; }else{ echo"Not Upgrade User"; } ?>" >
               <span data-toggle="tooltip" title="Click {{$root->username}}">
               @if($root->paid_status == 0)
               <img src="{{asset('assets/user/user.png')}}" alt="**" style="max-width: 50px;;">
               @else
               <img src="{{asset('assets/user/paid_user.png')}}" alt="**" style="max-width: 50px;;">
               @endif
               {{$root->first_name}}</span>
               </a>
               <ul>
                  <?php
                     $countsl = \App\User::where('referrer_id', $root->id)->count();                
                     if($countsl == 0){
                     ?>
                  <li><a href="#">
                     <img src="{{asset('assets/user/no_user.png')}}" alt="**" style="max-width: 50px;;">NO USER
                     </a>
                  </li>
                  <?php
                     }else{                    
                     $sl0 = \App\User::where('referrer_id', $root->id)->get();
                     foreach ($sl0 as $sl) {
                     
                     if($sl->paid_status == 0){
                         $paid = '<b class="btn btn-warning btn-block">Not Upgrade User</b>';
                     }else{
                         $paid = '<b class="btn btn-primary btn-block">Upgrade User</b>';
                     } ?>  
                  <li class="d">
                     <a href="{{ url('tree/search') }}?username={{$sl->username}}" data-toggle="popover" title="{{$sl->first_name}} {{$sl->last_name}}" data-content="TYPE: <?php if($sl->paid_status==1){ echo'Upgrade User'; }else{ echo"Not Upgrade User"; } ?> ">
                     <span data-toggle="tooltip" title="Click {{$sl->username}}">
                     @if($sl->paid_status == 0)
                     <img src="{{asset('assets/user/user.png')}}" alt="**" style="max-width: 50px;">
                     @else
                     <img src="{{asset('assets/user/paid_user.png')}}" alt="**" style="max-width: 50px;">
                     @endif
                     {{--<img src="{{asset('assets/user/user.png')}}" alt="**" style="max-width: 50px;;">--}}
                     {{$sl->first_name}}</span>
                     </a>
                     <ul>
                        <?php
                           $tllc = \App\User::where('referrer_id', $sl->id)->count();
                           if($tllc == 0){
                           ?>  
                        <li><a href="#">
                           <img src="{{asset('assets/user/no_user.png')}}" alt="**" style="max-width: 50px;;">NO USER
                           </a>
                        </li>
                        <?php
                           }else{
                           $t110 = \App\User::where('referrer_id', $sl->id)->get();
                           foreach($t110 as $tll){
                           if($tll->paid_status == 0){
                               $paid = '<b class="btn btn-warning btn-block">Not Upgrade User</b>';
                           }else{
                               $paid = '<b class="btn btn-primary btn-block">Upgrade User</b>';
                           }
                           
                           ?>     
                        <li>
                           <a href="{{ url('tree/search') }}?username={{$tll->username}}" data-toggle="popover" title="{{$tll->first_name}} {{$tll->last_name}}" data-content="TYPE: <?php if($tll->paid_status==1){ echo'Upgrade User'; }else{ echo"Not Upgrade User"; } ?> ">
                           <span data-toggle="tooltip" title="Click {{$tll->username}}">
                           @if($tll->paid_status == 0)
                           <img src="{{asset('assets/user/user.png')}}" alt="**" style="max-width: 50px;;">
                           @else
                           <img src="{{asset('assets/user/paid_user.png')}}" alt="**" style="max-width: 50px;;">
                           @endif
                           {{$tll->first_name}}</span>
                           </a>

                           <ul>
                        <?php
                           $tllc2 = \App\User::where('referrer_id', $tll->id)->count();
                           if($tllc2 == 0){
                           ?>  
                        <li><a href="#">
                           <img src="{{asset('assets/user/no_user.png')}}" alt="**" style="max-width: 50px;;">NO USER
                           </a>
                        </li>
                        <?php
                           }else{
                           $t1102 = \App\User::where('referrer_id', $tll->id)->get();
                           foreach($t1102 as $tll2){
                           if($tll2->paid_status == 0){
                               $paid = '<b class="btn btn-warning btn-block">Not Upgrade User</b>';
                           }else{
                               $paid = '<b class="btn btn-primary btn-block">Upgrade User</b>';
                           }
                           
                           ?>     
                        <li>
                           <a href="{{ url('tree/search') }}?username={{$tll2->username}}" data-toggle="popover" title="{{$tll2->first_name}} {{$tll2->last_name}}" data-content="TYPE: <?php if($tll2->paid_status==1){ echo'Upgrade User'; }else{ echo"Not Upgrade User"; } ?>">
                           <span data-toggle="tooltip" title="Click {{$tll2->username}}">
                           @if($tll2->paid_status == 0)
                           <img src="{{asset('assets/user/user.png')}}" alt="**" style="max-width: 50px;;">
                           @else
                           <img src="{{asset('assets/user/paid_user.png')}}" alt="**" style="max-width: 50px;;">
                           @endif
                           {{$tll2->first_name}}</span>
                           </a>
                        </li>
                        <?php
                           }
                           }
                           ?>
                     </ul>
                           
                        </li>
                        <?php
                           }
                           }
                           ?>
                     </ul>
                  </li>
                  <?php } }?>
               </ul>
            </li>
         </ul>
      </div>
   </div>
</div>
@endsection
@section('script')
<script>
 $('.back').click(function(e){
    // prevent default behavior
    e.preventDefault();
    // Go back 1 page 
    window.history.back();
    // can also use 
    // window.history.go(-1);
  });
   // $('.user').each(function() {
   //     var $this = $(this);
   //     $this.popover({
   //         trigger: 'click , hover',
   //         placement: 'bottom',
   //         html: true,
   //         content: $this.find('.userInfo').html()
   //     });
   // });
   $(document).ready(function(){
   $('[data-toggle="popover"]').popover();   
   });
   $(document).ready(function(){
   $('[data-toggle="tooltip"]').tooltip();
   });
   
   dragElement(document.getElementById("mydiv"));
   
   function dragElement(elmnt) {
   var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
   if (document.getElementById(elmnt.id + "header")) {
   /* if present, the header is where you move the DIV from:*/
   document.getElementById(elmnt.id + "header").onmousedown = dragMouseDown;
   } else {
   /* otherwise, move the DIV from anywhere inside the DIV:*/
   elmnt.onmousedown = dragMouseDown;
   }
   
   function dragMouseDown(e) {
   e = e || window.event;
   e.preventDefault();
   // get the mouse cursor position at startup:
   pos3 = e.clientX;
   pos4 = e.clientY;
   document.onmouseup = closeDragElement;
   // call a function whenever the cursor moves:
   document.onmousemove = elementDrag;
   }
   function elementDrag(e) {
   e = e || window.event;
   e.preventDefault();
   // calculate the new cursor position:
   pos1 = pos3 - e.clientX;
   pos2 = pos4 - e.clientY;
   pos3 = e.clientX;
   pos4 = e.clientY;
   // set the element's new position:
   elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
   elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
   }
   
   function closeDragElement() {
   /* stop moving when mouse button is released:*/
   document.onmouseup = null;
   document.onmousemove = null;
   }
   }
</script>
@endsection