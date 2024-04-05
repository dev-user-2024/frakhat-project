<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */
    "accepted"         => ":attribute باید پذیرفته شده باشد.",
    "active_url"       => "آدرس :attribute معتبر نیست",
    "after"            => ":attribute باید تاریخی بعد از :date باشد.",
    "alpha"            => ":attribute باید شامل حروف الفبا باشد.",
    "alpha_dash"       => ":attribute باید شامل حروف الفبا و عدد و خظ تیره(-) باشد.",
    "alpha_num"        => ":attribute باید شامل حروف الفبا و عدد باشد.",
    "array"            => ":attribute باید شامل آرایه باشد.",
    "before"           => ":attribute باید تاریخی قبل از :date باشد.",
    "between"          => array(
        "numeric" => ":attribute باید بین :min و :max باشد.",
        "file"    => ":attribute باید بین :min و :max کیلوبایت باشد.",
        "string"  => ":attribute باید بین :min و :max کاراکتر باشد.",
        "array"   => ":attribute باید بین :min و :max آیتم باشد.",
    ),
    "boolean"          => "The :attribute field must be true or false",
    "confirmed"        => ":attribute با تاییدیه مطابقت ندارد.",
    "date"             => ":attribute یک تاریخ معتبر نیست.",
    "date_format"      => ":attribute با الگوی :format مطاقبت ندارد.",
    "different"        => ":attribute و :other باید متفاوت باشند.",
    "digits"           => ":attribute باید :digits رقم باشد.",
    "digits_between"   => ":attribute باید بین :min و :max رقم باشد.",
    "email"            => "فرمت :attribute معتبر نیست.",
    "exists"           => ":attribute انتخاب شده، معتبر نیست.",
    "image"            => ":attribute باید تصویر باشد.",
    "in"               => ":attribute انتخاب شده، معتبر نیست.",
    "integer"          => ":attribute باید نوع داده ای عددی (integer) باشد.",
    "ip"               => ":attribute باید IP آدرس معتبر باشد.",
    "max"              => array(
        "numeric" => ":attribute نباید بزرگتر از :max باشد.",
        "file"    => ":attribute نباید بزرگتر از :max کیلوبایت باشد.",
        "string"  => ":attribute نباید بیشتر از :max کاراکتر باشد.",
        "array"   => ":attribute نباید بیشتر از :max آیتم باشد.",
    ),
    "mimes"            => ":attribute باید یکی از فرمت های :values باشد.",
    "min"              => array(
        "numeric" => ":attribute نباید کوچکتر از :min باشد.",
        "file"    => ":attribute نباید کوچکتر از :min کیلوبایت باشد.",
        "string"  => ":attribute نباید کمتر از :min کاراکتر باشد.",
        "array"   => ":attribute نباید کمتر از :min آیتم باشد.",
    ),
    "not_in"           => ":attribute انتخاب شده، معتبر نیست.",
    "numeric"          => ":attribute باید شامل عدد باشد.",
    "regex"            => ":attribute یک فرمت معتبر نیست",
    "required"         => "فیلد :attribute الزامی است لطفا پر کنید",
    "required_if"      => "فیلد :attribute هنگامی که :other برابر با :value است، الزامیست.",
    "required_with"    => ":attribute الزامی است زمانی که :values موجود است.",
    "required_with_all"=> ":attribute الزامی است زمانی که :values موجود است.",
    "required_without" => ":attribute الزامی است زمانی که :values موجود نیست.",
    "required_without_all" => ":attribute الزامی است زمانی که :values موجود نیست.",
    "same"             => ":attribute و :other باید مانند هم باشند.",
    "size"             => array(
        "numeric" => ":attribute باید برابر با :size باشد.",
        "file"    => ":attribute باید برابر با :size کیلوبایت باشد.",
        "string"  => ":attribute باید برابر با :size کاراکتر باشد.",
        "array"   => ":attribute باسد شامل :size آیتم باشد.",
    ),
    "timezone"         => "The :attribute must be a valid zone.",
    "unique"           => ":attribute قبلا انتخاب شده است.",
    "url"              => "فرمت آدرس :attribute اشتباه است.",
    "exists_code"      => "کد ارسالی در سیستم وجود ندارد",
    "expire_code"      => "اعتبار کد ارسالی به پایان رسیده است",
    "used"             => "این کد قبلا مورد استفاده قرار گرفته است",
    "exists_phone"     => "چنین شماره ای در سیستم ثبت نشده است",
    "recaptcha"        => "کپچا اعتبار لازم را ندارد",

    /*

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => array(
        'email'=>'ایمیل',
        'password'=>'رمزعبور',
        'fname'=>'نام',
        'lname'=>'نام خانوادگی',
        'national_code'=>'کدملی',
        'address'=>'ادرس',
        'picture'=>'تصویر',
        'upload_codemili'=>'اپلود کارت ملی',
        'phone_number'=>'شماره همراه',
        'title_gallery'=>'عنوان گالری',
        'description_gallery'=>'توضیحات',
        'pictures_gallery'=>'تصویر',
        'message'=>'پیام',
        'website_title'=>'عنوان سایت',
        'website_copyright'=>'قوانین کپی رایت',
        'website_logo'=>'لوگو',
        'website_favicon'=>'فایوایکن',
        'aboutme'=>'درباره ی ما',
        'meta_title'=>'عنوان سئو',
        'meta_description'=>'توضیحات سئو',
        'phoneNumber'=>'شماره همراه',
        'role'=>'سطح دسترسی',
        'category_title'=>'عنوان دسته بندی',
        'course_title'=>'عنوان دوره',
        'course_thumbnail'=>'تصویر شاخص دوره',
        'course_content'=>'توضیحات دوره',
        'course_time'=>'زمان دوره',
        'course_price'=>'قیمت دوره',
        'price'=>'قیمت',
        'code'=>'کد',
        'course_id'=>'محصولات',
        'news_title'=>'عنوان خبر',
        'news_excerpt'=>'خلاصه خبر',
        'news_thumbnail'=>'تصویر خبر',
        'category_id'=>'دسته بندی خبر',
        'content_news'=>'محتوا خبر',
        'page_title'=>'عنوان برگه',
        'expert_page'=>'خلاصه برگه',
        'thumbnail'=>'تصویر شاخص برگه',
        'page_content'=>'محتوا برگه',
        'slug'=>'مسیردستیابی',
        'title_season'=>'عنوان فصل',
        'video_link'=>'لینک ویدیو',
        'status_free'=>'پخش رایگان',
        'Priority'=>'اولویت',
        'news_id'=>'خبر',
        'title_video'=>'عنوان ویدیو',
        'description'=>'توضیحات',
        'link_video'=>'لینک ویدیو',
        'title_menu'=>'عنوان منو',
        'href_menu'=>'لینک منو',
        'Priority_menu'=>'اولویت منو',
        'card_number'=>'شماره کارت',
        'shaba_number'=>'شماره شبا',
        'title' => 'عنوان',
        'parent_id' => 'سرگروه',
        'languages.*.title' => 'عنوان همه زبان ها',
        'languages.*.content' => 'محتوای همه زبان ها',
        'user_id' => 'کاربر',
        'title_course'=>'عنوان دوره',


    ),

    //localization
    'post_status_draft' => 'پیش‌نویس',
    'post_status_pending' => 'در انتظار تأیید',
    'post_status_published' => 'منتشر شده',

];
