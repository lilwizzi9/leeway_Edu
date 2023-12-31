<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class General extends Model
{
    protected $table = 'generals';
    protected $fillable = [
        'web_title', 'currency', 'symbol',
        'message', 'email', 'mobile',
        'status', 'about_text', 'image',
        'facebook', 'twitter', 'linkedin',
        'google_plus', 'printerest', 'theme','about_video_link',
        'footer', 'footer_text', 'policy','terms',
        'address','google_map_address','start_date','emailver',
        'smsver','emessage','esender','sec_color','email_nfy','sms_nfy','mcq_duration','mcq_passing_perc','lewt_by_usd'
    ];
}
