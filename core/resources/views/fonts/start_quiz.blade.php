<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <title>Take exam | {{ $general->web_title }}</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

      <script type="text/javascript" src="{{ asset('assets/inilabs/jquery.min.js')}}"></script>
      <script type="text/javascript" src="{{ asset('assets/inilabs/toastr.min.js')}}"></script>
      <link href="{{ asset('assets/inilabs/toastr.min.css')}}" rel="stylesheet">
      <link href="{{ asset('assets/inilabs/bootstrap.min.css')}}" rel="stylesheet">
      <link href="{{ asset('assets/inilabs/icomoon.css')}}" rel="stylesheet">
      <link href="{{ asset('assets/inilabs/ini-icon.css')}}" rel="stylesheet">
      <link id="headStyleCSSLink" href="{{ asset('assets/inilabs/style.css')}}" rel="stylesheet">
      <link rel="stylesheet" href="{{ asset('assets/inilabs/combined.css')}}" >
      <link rel="stylesheet" href="{{ asset('assets/inilabs/checkbox.css')}}">
      <link rel="stylesheet" href="{{ asset('assets/inilabs/fuelux.min.css')}}">
      <script type="text/javascript">
         $(window).load(function() {
           $(".se-pre-con").fadeOut("slow");;
         });
      </script>
   </head>
   <body class="skin-blue fuelux">
      <div class="se-pre-con"></div>
      <div class="wrapper row-offcanvas row-offcanvas-left">
         <aside >
            <section class="content">
               <div class="row">
                  <div class="col-xs-12">
                     <style type="text/css">
                        .fuelux .wizard .step-content {
                        border: 0px;
                        }
                     </style>
                     <div class="col-sm-12 do-not-refresh">
                        <div class="callout callout-danger">
                           <h4>Warning</h4>
                           <p>Do Not Press Back/refresh Button</p>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-7 fu-example section">
                           <div class="box outheBoxShadow wizard" data-initialize="wizard" id="questionWizard">
                              <div class="box-header bg-white">
                                 <div class="checkbox hints">
                                    <label>
                                    </label>
                                    <span class="pull-right">
                                    <label>
                                    </label>
                                    </span>
                                 </div>
                              </div>
                              <div class="steps-container">
                                 <ul class="steps hidden" style="margin-left: 0">
                                  @php $a=1;  @endphp
                                  @foreach($quiz as $quiz_question)
                                    <li data-step="{{ $a }}" class="@if($a==1) active @endif"></li>
                                    @php $a++ @endphp
                                  @endforeach
                                    <li data-step="2" class=""></li>
                                    <li data-step="3" class=""></li>
                                    <li data-step="3" class=""></li>
                                 </ul>
                              </div>
                              <form id="answerForm" method="post" action="{{ route('submit.mcq') }}"> 
                                {{ csrf_field() }}
                                 <div class="box-body step-content">
                                    <input style="display:none" type="text" name="vdo_id" value="{{ $vdo_id }}">
                                    <input style="display:none" type="text" name="totalQuestions" value="{{ $quiz_count }}">
                                    <input style="display:none" type="text" name="totalQuestions" value="{{ $quiz_count }}">
                                   @php $i=1;  @endphp
                                   @foreach($quiz as $quiz_question)
                                    <div class="clearfix step-pane sample-pane  @if($i==1) active @endif" data-questionID="{{ $quiz_question->id }}" data-step="{{ $i }}">
                                       <div class="question-body">
                                          <label class="lb-title">Question {{ $i }} of {{ $quiz_count }}</label>
                                          <label class="lb-content">
                                             <p>{!! $quiz_question->question !!}</p>
                                             <p><br></p>
                                          </label>
                                          <label class="lb-mark"> {{ $quiz_question->marks }} Mark </label>
                                       </div>
                                       <div class="question-answer" id="step{{ $i }}">
                                          <table class="table">
                                             <tr>
                                                <td>
                                                   <input id="option{{ $i }}1" value="1" name="answer[1][{{ $quiz_question->id }}][]" type="radio">
                                                   <label for="option{{ $i }}1">
                                                   <span class="fa-stack radio-button">
                                                   <i class="active fa fa-check">
                                                   </i>
                                                   </span>
                                                   <span >{{ $quiz_question->option_1 }}</span>
                                                   </label>
                                                </td>
                                                <td>
                                                   <input id="option{{ $i }}2" value="2" name="answer[1][{{ $quiz_question->id }}][]" type="radio">
                                                   <label for="option{{ $i }}2">
                                                   <span class="fa-stack radio-button">
                                                   <i class="active fa fa-check">
                                                   </i>
                                                   </span>
                                                   <span > {{ $quiz_question->option_2 }}</span>
                                                   </label>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td>
                                                   <input id="option{{ $i }}3" value="3" name="answer[1][{{ $quiz_question->id }}][]" type="radio">
                                                   <label for="option{{ $i }}3">
                                                   <span class="fa-stack radio-button">
                                                   <i class="active fa fa-check">
                                                   </i>
                                                   </span>
                                                   <span >{{ $quiz_question->option_3 }}</span>
                                                   </label>
                                                </td>

                                                <td>
                                                   <input id="option{{ $i }}4" value="4" name="answer[1][{{ $quiz_question->id }}][]" type="radio">
                                                   <label for="option{{ $i }}4">
                                                   <span class="fa-stack radio-button">
                                                   <i class="active fa fa-check">
                                                   </i>
                                                   </span>
                                                   <span >{{ $quiz_question->option_4 }}</span>
                                                   </label>
                                                </td>
                                             </tr>
                                          </table>
                                       </div>
                                    </div>
                                   @php $i++ @endphp
                                   @endforeach

                                    <div class="question-answer-button">
                                       <button class="btn oe-btn-answered btn-prev" type="button" name="" id="prevbutton" disabled>
                                       <i class="fa fa-angle-left"></i> Previous                    </button>
                                       
                                       <input type="hidden" name="time_taken" class="duration1">

                                       <button class="btn oe-btn-answered btn-next" type="button" name="" id="nextbutton" data-last="Finish ">
                                       Next <i class="fa fa-angle-right"></i>
                                       </button>
                                       
                                    </div>
                                 </div>
                              </form>
                           </div>
                        </div>
                        <div class="col-sm-5">
                           <div class="row">
                              <div class="col-sm-12 counterDiv">
                                 <div class="box outheBoxShadow">
                                    <div class="box-body outheMargAndBox">
                                       <div class="box outheBoxShadow">
                                          <div class="box-header bg-white">
                                             <h3 class="box-title fontColor"> Time Status</h3>
                                          </div>
                                          <div class="box-body">
                                             <div id="timerdiv" class="timer">
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-sm-12 counterDiv">
                                 <div class="box outheBoxShadowColor">
                                    <div class="box-body innerMargAndBox">
                                       <div class="row">
                                          <div class="col-sm-6">
                                             <h3 class="fontColor">Total Time</h3>
                                          </div>
                                          <div class="col-sm-6">
                                             <h3 class="fontColor duration">00:00:00</h3>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-sm-12">
                                 <div class="box outheBoxShadow">
                                    <div class="box-body outheMargAndBox">
                                       <div class="box-header bg-white">
                                          <h3 class="box-title fontColor">
                                             Class Test                                <br>
                                          </h3>
                                       </div>
                                       <div class="box-body margAndBox" style="">
                                          <nav aria-label="Page navigation">
                                             <ul class="examQuesBox questionColor">
                                              @php $i1=1;  @endphp
                                              @foreach($quiz as $quiz_question)
                                                <li><a class="notvisited" id="question{{ $i1 }}" href="javascript:void(0);" onclick="jumpQuestion({{ $i1 }})">{{ $i1 }}</a></li>
                                              @php $i1++ @endphp
                                              @endforeach              
                                             </ul>
                                          </nav>
                                          <nav aria-label="Page navigation">
                                             <h2>Summary</h2>
                                             <ul class="examQuesBox text">
                                                <li><a class="answered" id="summaryAnswered" href="#">0</a> Answered</li>
                                              
                                                <li><a class="notanswered" id="summaryNotAnswered" href="#">0</a> Not Answered</li>
                                             </ul>
                                          </nav>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.6/sweetalert2.css" integrity="sha512-IThEP8v8WRHuDqEKg3D6V0jROeRcQXGu/02HzCudtHKlLSzl6F6EycdHw34M3gsBA5zsUyR4ynW6j5vS1qE4wQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.6/sweetalert2.min.js" integrity="sha512-CrNI25BFwyQ47q3MiZbfATg0ZoG6zuNh2ANn/WjyqvN4ShWfwPeoCOi9pjmX4DoNioMQ5gPcphKKF+oVz3UjRw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                     <script type="text/javascript">
                        $('#reviewbutton').on('click', function () {
                            marked = 1;
                            $('#questionWizard').wizard('next');
                        });
                        
                        $('#clearbutton').on('click', function () {
                            clearAnswer();
                        });
                        
                        $('#questionWizard').on('actionclicked.fu.wizard', function (evt, data) {
                            
                            totalQuestions = parseInt(totalQuestions);
                            var steps = 0;
                            if(data.direction == "next") {
                                steps = data.step+1;
                            } else {
                                steps = data.step-1;
                            }                        
                            if(steps == totalQuestions) {
                                $('#nextbutton').removeClass('oe-btn-answered');
                                $('#nextbutton').addClass('oe-btn-notanswered');
                                $('#nextbutton i').remove();
                                $('#finishedbutton').hide();
                            } else if(steps == totalQuestions+1) {
                                finished();
                            } else {                              
                                $('#nextbutton').removeClass('oe-btn-notanswered');
                                $('#nextbutton').addClass('oe-btn-answered');
                                $('#nextbutton i').remove();
                                $('#nextbutton').append(' <i class="fa fa-angle-right"></i>');
                                $('#finishedbutton').show();
                            }
                            NowStep = steps;
                        
                            changeColor(data.step);
                            summaryUpdate();
                        });
                        
                        function summaryUpdate() {
                            var summaryNotVisited = $('.questionColor li .notvisited').length;
                            var summaryAnswered = $('.questionColor li .answered').length;
                            var summaryMarked = $('.questionColor li .marked').length;
                            var summaryNotAnswered = $('.questionColor li .notanswered').length;
                            $('#summaryNotVisited').html(summaryNotVisited);
                            $('#summaryAnswered').html(summaryAnswered);
                            $('#summaryMarked').html(summaryMarked);
                            $('#summaryNotAnswered').html(summaryNotAnswered);
                        }
                        
                        function changeColor(stepID) {

                            list = $('#answerForm #step'+stepID+' input ');
                            var have = 0;
                            var result = $.each( list, function() {
                                elementType = $(this).attr('type');
                                if(elementType == 'radio' || elementType == 'checkbox') {
                                    if($(this).prop('checked')) {
                                        have = 1;
                                        return have;
                                    }
                                } else if(elementType == 'text') {
                                    if($(this).val() != '') {
                                        have = 1;
                                        return have;
                                    }
                                }
                            });
                            if(have) {
                                $('#question'+stepID).removeClass('notvisited');
                                $('#question'+stepID).removeClass('notanswered');
                                $('#question'+stepID).removeClass('marked');
                                $('#question'+stepID).addClass('answered');
                            } else {
                                $('#question'+stepID).removeClass('notvisited');
                                $('#question'+stepID).removeClass('answered');
                                if($('#question'+stepID).attr('class') != 'marked') {
                                    $('#question'+stepID).addClass('notanswered');
                                }
                            }
                        
                            if(marked) {
                                marked = 0;
                                if($('#question'+stepID).attr('class') != 'answered') {
                                    $('#question'+stepID).removeClass('notvisited');
                                    $('#question'+stepID).removeClass('notanswered');
                                    $('#question'+stepID).addClass('marked');
                                }
                            }
                        }
                        
                        function jumpQuestion(questionNumber) {
                            changeColor(NowStep);
                            NowStep = questionNumber;
                            $('#questionWizard').wizard('selectedItem', {
                                step: questionNumber
                            });
                            changeColor(questionNumber);
                            if(questionNumber == totalQuestions) {
                                $('#nextbutton').removeClass('oe-btn-answered');
                                $('#nextbutton').addClass('oe-btn-notanswered');
                                $('#nextbutton i').remove();
                                $('#finishedbutton').hide();
                            } else {
                                $('#nextbutton').removeClass('oe-btn-notanswered');
                                $('#nextbutton').addClass('oe-btn-answered');
                                $('#nextbutton i').remove();
                                $('#nextbutton').append(' <i class="fa fa-angle-right"></i>');
                                $('#finishedbutton').show();
                            }
                            summaryUpdate();
                        }
                        
                        function clearAnswer() {
                            list = $('#answerForm #step'+NowStep+' input ');
                            $.each( list, function() {
                                elementType = $(this).attr('type');
                                switch(elementType) {
                                    case 'radio': $(this).prop('checked', false); break;
                                    case 'checkbox': $(this).attr('checked', false); break;
                                    case 'text': $(this).val(''); break;
                                }
                            });
                            if($('#question'+NowStep).attr('class') == 'marked') {
                                $('#question'+NowStep).removeClass('marked');
                                $('#question'+NowStep).addClass('notanswered');
                            }
                        }
                        
                        function finished() {
                            let timerInterval
                            Swal.fire({
                              title: 'Data saving!',
                              html: 'Please Wait <b></b> Milliseconds.',
                              timer: 5000,
                              timerProgressBar: true,
                              didOpen: () => {
                                Swal.showLoading()
                                timerInterval = setInterval(() => {
                                  const content = Swal.getHtmlContainer()
                                  if (content) {
                                    const b = content.querySelector('b')
                                    if (b) {
                                      b.textContent = Swal.getTimerLeft()
                                    }
                                  }
                                }, 100)
                              },
                              willClose: () => {
                                clearInterval(timerInterval)
                              }
                            }).then((result) => {
                              if (result.dismiss === Swal.DismissReason.timer) {

                                $('#answerForm').submit();                                

                              }
                            })

                        }
                        
                        function counter() {
                            setInterval(function() {
                                durationUpdate();
                                $('#timerdiv').html( ((hours < 10) ? '0' + hours : hours) + ':' + ((minutes < 10) ? '0' + minutes : minutes) + ':' + ((seconds < 10) ? '0' + seconds : seconds ));
                                $('.duration1').val( ((hours < 10) ? '0' + hours : hours) + ':' + ((minutes < 10) ? '0' + minutes : minutes) + ':' + ((seconds < 10) ? '0' + seconds : seconds ));
                                duration = (hours*60)+minutes;
                            }, 1000);
                        }
                        
                        function durationUpdate() {
                            hours = 0;
                            minutes = duration;
                            if(minutes > 60) {
                                hours = parseInt(duration/60, 10);
                                minutes = duration % 60;
                            }
                            --seconds;
                            minutes = (seconds < 0) ? --minutes : minutes;
                            if(minutes < 0 && hours != 0) {
                                --hours;
                                minutes = 59;
                            }
                        
                            if(hours < 0) {
                                hours = 0;
                            }
                        
                            seconds = (seconds < 0) ? 59 : seconds;
                            if (minutes < 0 && hours == 0) {
                                minutes = 0;
                                seconds = 0;
                                finished();
                                clearInterval(interval);
                            }
                        }
                        
                        function timeString() {
                            return ((hours < 10) ? '0' + hours : hours) + ':' + ((minutes < 10) ? '0' + minutes : minutes) + ':' + ((seconds < 10) ? '0' + seconds : seconds );
                        }
                        
                        var duration = parseInt("{{ $Contest_duration }}");
                        var totalQuestions = parseInt("{{ $quiz_count }}");
                        var seconds = 1;
                        var hours = 0;
                        var minutes = -1;
                        var NowStep = 1;
                        var marked = 0;
                        durationUpdate();
                        $('.duration').html(timeString());                        
                        if(duration != 0) {
                            counter();
                        } else {
                            $('.counterDiv').hide();
                        }
                        summaryUpdate();
                        
                        $('.sidebar-menu li a').css('pointer-events', 'none');
                        
                        function disableF5(e) {
                            if ( ( (e.which || e.keyCode) == 116 ) || ( e.keyCode == 82 && e.ctrlKey ) ) {
                                e.preventDefault();
                            }
                        }
                        
                        $(document).bind("keydown", disableF5);
                        
                        function Disable(event) {
                            if (event.button == 2)
                            {
                                window.oncontextmenu = function () {
                                    return false;
                                }
                            }
                        }
                        
                        document.onmousedown = Disable;
                        
                        if(totalQuestions == 1) {
                            $('#nextbutton').removeClass('oe-btn-answered');
                            $('#nextbutton').addClass('oe-btn-notanswered');
                            $('#nextbutton i').remove();
                            $('#finishedbutton').hide();
                        }
                     </script>                    
                  </div>
               </div>
            </section>
         </aside>
      </div>
      <!-- ./wrapper -->
      <script type="text/javascript" src="https://demo.itest.inilabs.xyz/assets/bootstrap/bootstrap.min.js"></script>
      <!-- Style js -->
      <script type="text/javascript" src="https://demo.itest.inilabs.xyz/assets/inilabs/style.js"></script>
      <script type="text/javascript" src="https://demo.itest.inilabs.xyz/assets/datatables/dataTables.bootstrap.js"></script>
      <script type="text/javascript" src="https://demo.itest.inilabs.xyz/assets/inilabs/inilabs.js"></script>
      <script>
         $(document).ready(function() {
             $('#example3, #example1, #example2').DataTable( {
                 dom: 'Bfrtip',
                 buttons: [
                     'copyHtml5',
                     'excelHtml5',
                     'csvHtml5',
                     'pdfHtml5'
                 ],
                 search: false
             });
         });
      </script>
      <script type="text/javascript">
         $(function() {
             $("#withoutBtn").dataTable();
         });
      </script>
      <script type="text/javascript" src="https://demo.itest.inilabs.xyz/assets/inilabs/form/fuelux.min.js"></script>
      <script type="text/javascript">
         $("ul.sidebar-menu li").each(function(index, value) {
             if($(this).attr('class') == 'active') {
                 $(this).parents('li').addClass('active');
             }
         });
         
      </script>
   </body>
</html>