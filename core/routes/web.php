<?php



Route::get('/cache_clear',function(){

   Artisan::call('cache:clear');

});



Route::get('/view_clear',function(){

   Artisan::call('view:clear');

});

Route::get('/config_clear',function(){

   Artisan::call('config:cache');

});

Route::get('/route_clear',function(){

   Artisan::call('route:clear');

});



Route::get('google-analytics-summary',array('as'=>'google-analytics-summary','uses'=>'HomeController@getAnalyticsSummary'));



Route::get('/updateLevel/{id}', 'HomeController@updateLevel');



Route::get('/dailyProfitCron', 'CronController@dailyProfitCron');

Route::get('/weeklyProfitCron', 'CronController@weeklyProfitCron');

Route::get('/depositBonus_comCron', 'CronController@depositBonus_comCron');



Route::get('/walletupdate', 'CronController@walletupdate');

Route::get('/cron2', 'PaymentController@cron');



Route::get('/register/{id}', 'FontendController@register_page');



Route::post('/register/register_operation', 'Auth\RegisterController@register_operation');



Route::post('/register/login_operation', 'Auth\RegisterController@login_operation');



Route::get('/', 'FontendController@fontIndex');

// Route::get('/login', 'FontendController@homeIndex');

Route::get('/contact', 'FontendController@contactIndex')->name('contact.index');



Route::post('post_withdrawl','HomeController@post_withdrawl');
Route::post('add_sponser_db','HomeController@add_sponser_db');

Route::post('check_bnb_balance','HomeController@check_bnb_balance');
Route::post('check_lewt_balance','HomeController@check_lewt_balance');



/// Investments Pages added manually 06/05/2021 By Faiz ////

Route::get('/investment/gold', 'FontendController@gold')->name('gold.index');

Route::get('/investment/platinum', 'FontendController@platinum')->name('platinum.index');

Route::get('/investment/diamond', 'FontendController@diamond')->name('diamond.index');

Route::get('/investment/titanium', 'FontendController@titanium')->name('titanium.index');



// End Investment pages routes //////

Route::get('/about-us', 'FontendController@about')->name('about.index');

Route::get('/How-It-Work', 'FontendController@howitwork')->name('howitwork.index');



Route::get('/terms', 'FontendController@termsIndex')->name('terms.index');

Route::get('/policy', 'FontendController@policyIndex')->name('policy.index');

Route::get('/menu/{id}/{any}', 'FontendController@menuIndex')->name('menu.index.pranto');

Route::get('/admin', 'AdminAuth\LoginController@showLoginForm');

Route::post('/message', 'FontendController@sendMessage')->name('contact.us.message');

Route::post('/get/ref/id', 'FontendController@getRefId')->name('get.ref.id');

Route::post('/get/position', 'FontendController@getPosition')->name('get.user.position');

Route::post('/forgot/password', 'FontendController@forgotPass')->name('forget.password.user');

Route::get('/reset/{token}', 'FontendController@resetLink')->name('reset.passlink');

Route::post('/reset/password', 'FontendController@passwordReset')->name('reset.passw');

Route::get('pagenotfound', 'FontendController@pageNotFound')->name('pagenot.found');



Route::post('subscribe', 'FontendController@storeSubscriber')->name('store.new.letter');

Route::post('blog/subscribe', 'FontendController@storeSubscriberBlog')->name('store.new.letter.blog');



Route::get('news', 'FontendController@newsIndex')->name('news.index');

Route::get('/news/{id}/{title}', 'FontendController@newsShow')->name('news.show.pranto');





//Payment IPN

Route::post('/ipnpaypal', 'PaymentController@ipnpaypal')->name('ipn.paypal');

Route::post('/ipnperfect', 'PaymentController@ipnperfect')->name('ipn.perfect');

Route::get('/ipnbtc', 'PaymentController@ipnbtc')->name('ipn.btc');

Route::post('/ipnstripe', 'PaymentController@ipnstripe')->name('ipn.stripe');

Route::post('/ipncoin', 'PaymentController@ipncoin')->name('ipn.coinPay');

Route::post('/ipncoin-gate', 'PaymentController@coinGateIPN')->name('ipn.coinGate');

Route::get('/coin-gate', 'PaymentController@coingatePayment')->name('coinGate');

Route::post('/ipnskrill', 'PaymentController@skrillIPN')->name('ipn.skrill');

Route::get('/ipnblock', 'PaymentController@blockIpn')->name('ipn.block');





//Authorization

Route::get('/authorization', 'FontendController@authorization')->name('authorization');

Route::post('/sendemailver', 'FontendController@sendemailver')->name('sendemailver');

Route::post('/emailverify', 'FontendController@emailverify')->name('emailverify');

Route::post('/sendsmsver', 'FontendController@sendsmsver')->name('sendsmsver');

Route::post('/smsverify', 'FontendController@smsverify')->name('smsverify');

Route::post('/g2fa-verify', 'FontendController@verify2fa')->name('go2fa.verify');

Route::get('/register_cabinet', 'Auth\RegisterController@register_cabinet' );



Route::group(['prefix' => 'admin'], function () {





    Route::get('/login', 'AdminAuth\LoginController@showLoginForm1')->name('login');

    Route::post('/login', 'AdminAuth\LoginController@login');

    Route::post('/logout', 'AdminAuth\LoginController@logout')->name('admin.logout');



Route::middleware(['admin'])->group(function () {



    Route::get('news', 'GeneralController@subblogIndex')->name('sub.blog.index');

    Route::get('news/create/new', 'GeneralController@subblogCreate')->name('sub.blog.create.admin');

    Route::post('news/create/new', 'GeneralController@subblogStore')->name('sub.blog.crete.admin');

    Route::post('news/delete/{id}', 'GeneralController@subblogDelete')->name('sub.blog.delete');

    Route::get('news/update/{id}', 'GeneralController@subblogEdit')->name('sub.edit.blog.admin');

    Route::put('news/update/{id}', 'GeneralController@subblogUpdate')->name('sub.blog.update.admin');



    Route::get('newsletter', 'GeneralController@newsLetter')->name('newletter.index');

    Route::get('subscriber', 'GeneralController@subscriber')->name('sunscriber.index');

    Route::post('newsletter', 'GeneralController@sendMailsubscriber')->name('news.letter.mail');

    Route::post('newsletter/delete/{id}', 'GeneralController@deleteSubscriber')->name('subscriber.delete');



    Route::get('lending/referral/bonus', 'AdminController@lendBonusIndex')->name('ref.bonus.lend');

    Route::get('lending/complete', 'AdminController@lendCompleteIndex')->name('lend.complete');

    Route::get('lending/history', 'AdminController@lendHistoryIndex')->name('lend.history.index');



    Route::get('lending/packages', 'AdminController@packageIndex')->name('package.index');

    Route::post('create/packages', 'AdminController@packageCreate')->name('create.package');

    Route::put('update/packages/{id}', 'AdminController@packageUpdate')->name('package.upate');



    Route::get('background/images', 'GeneralController@backgroundImage')->name('background.image.index');

    Route::put('background/images/update', 'GeneralController@backgroundImageUpdate')->name('image.background.update');



    Route::get('referral/view', 'AdminController@refView')->name('ref.amount.total');

    Route::get('subtract/admin', 'AdminController@subtractAdmin')->name('admin.subtract.view');

    Route::get('generate/admin', 'AdminController@generateAdmin')->name('admin.generate.view');

    Route::get('send/money/{id}', 'AdminController@sendMoneyView')->name('user.total.send.money');

    Route::get('withdraw/view/{id}', 'AdminController@withDrawView')->name('user.total.withdraw');

    Route::get('add/fund/view/{id}', 'AdminController@depositView')->name('user.total.deposit');

    Route::get('transaction/view/{id}', 'AdminController@transView')->name('user.total.trans');

    Route::get('transfer/balance', 'AdminController@transBalanceLog')->name('index.transfer.user');

    Route::get('add/fund/user', 'AdminController@depositLog')->name('index.deposit.user');



    // coins

    Route::get('admin/add/buying', 'AdminController@buying')->name('add.buying');

    Route::get('admin/add/sale', 'AdminController@sale')->name('add.sale');

    

    Route::get('admin/add/coins', 'AdminController@coins')->name('add.coins');

    Route::post('create/coins', 'AdminController@coinCreate')->name('create.coin');    

    Route::put('update/coin/{id}', 'AdminController@coinUpdate')->name('coin.upate');

    // end coins



    Route::get('deactive/user', 'AdminController@deactiveUser')->name('index.deactive.user');

    Route::get('paid/user', 'AdminController@paidUser')->name('paid.user.index');

    Route::get('free/user', 'AdminController@freeUser')->name('free.user.index');



    Route::GET('user/search', 'AdminController@userSearch')->name('username.search');

    

    Route::GET('user/search/email', 'AdminController@userSearchEmail')->name('email.search');

    

    Route::GET('user/search/referr', 'AdminController@userSearchreferr')->name('referr.search');



    Route::post('generate/matching', 'AdminController@matchGenerate')->name('generate.match');

    Route::get('match', 'AdminController@matchIndex')->name('match.index');



    Route::post('/users/amount/{id}', 'AdminController@indexBalanceUpdate')->name('user.balance.update');

    Route::get('/users/send/mail/{id}', 'AdminController@userSendMail')->name('user.mail.send');

    

    Route::get('/users/upgrade/{id}', 'AdminController@userupgrade')->name('user.upgrade');



    Route::post('/send/mail/{id}', 'AdminController@userSendMailUser')->name('send.mail.user');

    Route::get('/users/balance/{id}', 'AdminController@indexUserBalance')->name('add.subs.index');

    

    Route::get('/users/kyc/verify/{id}', 'AdminController@user_kycVerify')->name('user.kyc.verify');

    

    Route::get('/users/kyc/reject/{id}', 'AdminController@user_kycreject')->name('user.kyc.reject');

    

    Route::get('/users/detail/{id}', 'AdminController@indexUserDetail')->name('user.view');

    Route::put('/users/update/{id}', 'AdminController@userUpdate')->name('user.detail.update');

    

    Route::put('/users/kyc/update/{id}', 'AdminController@userkycUpdate')->name('user.kyc.update');



    Route::get('/tree/image', 'GeneralController@indexTreeImage')->name('user.tree.image');

    Route::put('/tree/image/update', 'GeneralController@updateTreeImage')->name('tree.image.update');



    Route::get('/template', 'AdminController@indexEmail')->name('email.index.admin');

    Route::post('/template-update', 'AdminController@updateEmail')->name('template.update');



    //Sms Api

    Route::get('/sms-api', 'AdminController@smsApi')->name('sms.index.admin');

    Route::post('/sms-update', 'AdminController@smsUpdate')->name('sms.update');



    Route::get('/withdraw/method', 'AdminController@indexWithdraw')->name('add.withdraw.method');

    Route::post('/withdraw/store', 'AdminController@storeWithdraw')->name('store.withdraw.method');

    Route::put('/withdraw/update/{id}', 'AdminController@updateWithdraw')->name('update.method');



    Route::get('/mothly_profit_investment_history', 'AdminController@mothly_profit_investment_history')->name('mothly_profit_investment_history');

    

    Route::get('/withdraw/requests', 'AdminController@requestWithdraw')->name('withdraw.request.index');

    Route::get('/withdraw/details/{id}', 'AdminController@detailWithdraw')->name('withdraw.detail.user');

    Route::post('/withdraw/update/{id}', 'AdminController@repondWithdraw')->name('withdraw.process');



    Route::get('/withdraw/log', 'AdminController@showWithdrawLog')->name('withdraw.viewlog.admin');



    Route::get('/supports', 'TicketController@indexSupport')->name('support.admin.index');

    Route::get('/support/reply/{ticket}', 'TicketController@adminSupport')->name('ticket.admin.reply');

    Route::post('/reply/{ticket}', 'TicketController@adminReply')->name('store.admin.reply');

    

    Route::get('/support/close/{id}', 'TicketController@ticketCloseadmin')->name('ticket.admin.close');



    Route::get('users', 'AdminController@usersIndex')->name('user.manage');



    Route::get('footer', 'FooterController@footerIndex')->name('footer.content');

    Route::put('footer_update/{id}', 'FooterController@footerUpdate')->name('footer.update');



    Route::get('/footer', "GeneralController@indexFooter")->name('footer.index.admin');

    Route::put('/footer/update', "GeneralController@updateFooter")->name('footer.update');



    Route::get('/social/index', "GeneralController@indexSocial")->name('social.admin.index');

    Route::post('/social/store', "GeneralController@storeSocial")->name('store.social');

    Route::post('/social/delete/{id}', "GeneralController@deleteSocialSocial")->name('social.delete');

    Route::put('/social/update/{id}', "GeneralController@updateSocial")->name('update.social');



    Route::get('/direct_joining_comm/index', "GeneralController@direct_joining_comm")->name('direct_joining_comm.index');

    Route::post('/direct_joining_comm/store', "GeneralController@storedirect_joining_comm")->name('store.direct_joining_comm');

    Route::post('/direct_joining_comm/delete/{id}', "GeneralController@deletedirect_joining_comm")->name('direct_joining_comm.delete');

    Route::put('/direct_joining_comm/update/{id}', "GeneralController@updatedirect_joining_comm")->name('update.direct_joining_comm');



    Route::get('/direct_deposit_bonus/index', "GeneralController@direct_deposit_bonus")->name('direct_deposit_bonus.index');

    Route::post('/direct_deposit_bonus/store', "GeneralController@direct_deposit_bonusStore")->name('store.direct_deposit_bonus');

    Route::post('/direct_deposit_bonus/delete/{id}', "GeneralController@deletedirect_deposit_bonus")->name('direct_deposit_bonus.delete');

    Route::put('/direct_deposit_bonus/update/{id}', "GeneralController@updatedirect_deposit_bonus")->name('update.direct_deposit_bonus');



    Route::get('/contact', "GeneralController@indexContact")->name('contact.admin.index');

    Route::put('/contact/update', "GeneralController@updateContact")->name('contact.admin.update');



    Route::get('/about', "GeneralController@indexAbout")->name('about.admin.index');

    Route::put('/about/update/{id}', "GeneralController@updateAbout")->name('about.admin.update');



    Route::get('/general', "GeneralController@index")->name('general.index');

    Route::put('/general-update/{id}', "GeneralController@update")->name('general.update');



    Route::get('/terms', "GeneralController@indexTerms")->name('terms.polices');

    Route::put('/terms/update/{id}', "GeneralController@updateTerms")->name('terms.update');



    Route::get('/charge/commission', "GeneralController@indexCommision")->name('charge.commission');

    Route::put('/charge/commission/{id}', "GeneralController@UpdateCommision")->name('commission.update');



    Route::get('logo/icon', 'LogoController@logoIndex')->name('logo.icon');

    Route::put('logo_update', 'LogoController@updateLogo')->name('logo.update');

    Route::put('icon_update', 'LogoController@updateIcon')->name('icon.update');



    Route::get('slider', 'SilderController@slideIndex')->name('slide.settings');

    Route::post('slider/store', 'SilderController@slideStore')->name('slider.store.pranto');

    Route::get('slider/delete/{id}', 'SilderController@slideDelete')->name('slide.delete');

    Route::put('slider/update/{id}', 'SilderController@slideUpdate')->name('slider.update.pranto');



    Route::get('service', 'ServiceController@serviceIndex')->name('service.index');

    Route::get('service_create', 'ServiceController@serviceCreate')->name('service.create');

    Route::post('service/store', 'ServiceController@serviceStore')->name('store.service');

    Route::put('service_update/{id}', 'ServiceController@serviceUpdate')->name('service.update');

    Route::post('service/delete/{id}', 'ServiceController@serviceDelete')->name('service.delete');

    Route::get('service/edit/{id}', 'ServiceController@serviceEdit')->name('service.edit');





 

    Route::get('results', 'AdminController@results')->name('results.index');



    

    Route::get('videos', 'AdminController@videos')->name('videos.index');

    Route::post('video_store', 'AdminController@videosStore')->name('video.store');

    Route::get('video_edit/{id}', 'AdminController@videoEdit')->name('video.edit');

    Route::put('video_update/{id}', 'AdminController@videoUpdate')->name('video.update');

    Route::post('video_delete/{id}', 'AdminController@videoDelete')->name('video.delete');





    Route::get('video_mcq/{id}', 'AdminController@video_mcq')->name('video.mcq');

    Route::post('add_video_mcq', 'AdminController@add_video_mcq')->name('add.video.mcq');

    Route::post('edit_video_mcq', 'AdminController@edit_video_mcq')->name('edit.video.mcq');

    Route::post('video_mcq/delete/{id}', 'AdminController@video_mcqDelete')->name('video_mcq.delete');





    Route::get('testimonial', 'TestimonalController@testIndex')->name('testimonial.index');

    Route::post('testimonial_store', 'TestimonalController@testStore')->name('testimonial.store');

    Route::post('testimonial_delete/{id}', 'TestimonalController@testDelete')->name('testimonial.delete');

    Route::get('testimonial_edit/{id}', 'TestimonalController@testEdit')->name('test.edit');

    Route::put('testimonial_update/{id}', 'TestimonalController@testUpdate')->name('test.update');



    Route::get('team', 'TeamController@teamIndex')->name('team.index');

    Route::post('team/store', 'TeamController@teamStore')->name('team.store');

    Route::post('team/delete/{id}', 'TeamController@teamDelete')->name('team.delete.delete');

    Route::put('team/update/{id}', 'TeamController@teamUpdateUpdate')->name('team.update.update');





    Route::post('change-password', 'AdminController@saveResetPassword')->name('change.password');



    Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('register');

    Route::post('/register', 'AdminAuth\RegisterController@register');



    //Gateway

    Route::resource('gateway', 'GatewayController', ['except' => [

        'create', 'show', 'edit'

    ]]);



    Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');

    Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('password.email');

    Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');

    Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');



});

});



Auth::routes();



Route::group(['middleware' => 'web'], function() {



    Route::get('/start-mcq/{id}', 'HomeController@start_mcq');

    Route::post('/start-mcq', 'HomeController@submit_mcq')->name('submit.mcq');

    Route::get('/my-results', 'HomeController@allresults')->name('allresults');





    Route::get('/redeem_coin', 'HomeController@redeem_coin')->name('redeem_coin');



    Route::get('/lending/history', 'HomeController@lendHistory')->name('lend.history');



    Route::post('/lend/preview', 'HomeController@lendPreview')->name('lend.preview');

    Route::post('/sure/lend', 'HomeController@lendStore')->name('confirm.lend.store');

    Route::get('/lend/packages', 'HomeController@lendIndex')->name('lend.index');



    Route::get('/videos', 'HomeController@videosIndex')->name('videos.index');



    Route::get('/log_activity', 'HomeController@log_activityIndex')->name('log_activity.index');

    //user coins

     

     Route::get('/lend/coins', 'HomeController@coinIndex')->name('coin.index');

     Route::post('/lend/buy_coin', 'HomeController@lendbuy_coin')->name('lend.buy_coin');

     Route::post('/lend/sell_coin', 'HomeController@lendsell_coin')->name('lend.sell_coin');

    //end user coins



    Route::get('/update/premium', 'HomeController@updatePremium')->name('update.to.pro');



    Route::get('/tree/search', 'HomeController@searchTreeIndex')->name('tree.username.search');

    Route::get('/tree/{username}', 'HomeController@searchTreeIndex')->name('tree.username.search2');



    Route::get('/security/two/step', 'HomeController@twoFactorIndex')->name('two.factor.index');

    Route::post('/g2fa-create', 'HomeController@create2fa')->name('go2fa.create');

    Route::post('/g2fa-disable', 'HomeController@disable2fa')->name('disable.2fa');



    Route::put('/update/profile', 'HomeController@updateProfile')->name('update.profile');

    Route::get('/security', 'HomeController@securityIndex')->name('security.index');

    Route::post('/update/password', 'HomeController@changePassword')->name('change.password.user');

    

    Route::post('/update/password/otp', 'HomeController@changePasswordOtp')->name('change.password.user.otp');

 

    Route::post('/get/user', 'HomeController@confirmUserAjax')->name('get.user');

    Route::post('/transfer/fund', 'HomeController@transferFund')->name('store.transfer.fund');

    Route::post('/get/charge', 'HomeController@getChargeAjax')->name('get.total.charge');

    Route::post('/change/pin', 'HomeController@pinChange')->name('change.pin');

    Route::post('/reset/pin', 'HomeController@resetPin')->name('reset.pin');



    Route::post('/home', 'HomeController@index')->name('home');

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/binary/summery', 'HomeController@binarySummeryindex')->name('binary.summery.index');

    Route::get('/tree', 'HomeController@treeIndex')->name('tree.index');

    Route::get('/referral', 'HomeController@referralIndex')->name('referral.index');



    Route::get('/myteam', 'HomeController@myteam')->name('myteam');

    

    Route::get('/all/commission', 'HomeController@allCommsisionlIndex')->name('all.commision.index');



    Route::get('/all/roi/income', 'HomeController@allRoilIndex')->name('all.roi.index');



    Route::get('/referral/commission', 'HomeController@referraCommsisionlIndex')->name('ref.commision.index');

    Route::get('/binary/commission', 'HomeController@binaryCommsisionlIndex')->name('bin.commision.index');

    Route::get('/fund', 'HomeController@fundIndex')->name('add.fund.index');


    Route::get('/withdraw', 'HomeController@withdrawHistory')->name('request.users_management.index');


    Route::get('/add_withdraw', 'HomeController@withdrawIndex')->name('request.add_users_management.index');

    Route::get('/add_withdraw_leeway', 'HomeController@withdrawIndex_leeway');

    Route::post('/withdraw/preview', 'HomeController@withdrawPreview')->name('withdraw.preview.user');

    Route::get('/transfer/fund', 'HomeController@transferFundIndex')->name('fund.transfer.index');

    Route::get('/transaction/pin', 'HomeController@transacPinIndex')->name('transaction.pin.index');

    Route::get('/transaction', 'HomeController@transacHistory')->name('transaction.history');

    Route::get('/profile', 'HomeController@profileIndex')->name('profile.index');

    Route::get('/support', 'TicketController@ticketIndex')->name('support.index.customer');

    Route::get('/support/new', 'TicketController@ticketCreate')->name('add.new.ticket');



    Route::post('/deposit/store', 'HomeController@storeDeposit')->name('buy.preview');

    Route::get('/add/confirm', 'PaymentController@buyConfirm')->name('buy.confirm');

    Route::post('/confirm/withdraw', 'HomeController@storeWithdraw')->name('confirm.withdraw.store');



    Route::post('/store/ticket', 'TicketController@ticketStore')->name('ticket.store');

    Route::get('/comment/close/{ticket}', 'TicketController@ticketClose')->name('ticket.close');

    Route::get('/support/reply/{ticket}', 'TicketController@ticketReply')->name('ticket.customer.reply');

    Route::post('/support/store/{ticket}', 'TicketController@ticketReplyStore')->name('store.customer.reply');

});

