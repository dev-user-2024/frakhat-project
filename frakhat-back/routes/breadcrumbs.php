<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('home', function ($trail) {
    $trail->push('خانه', route('panel'));
});


//language
Breadcrumbs::for('language_list', function ($trail) {
    $trail->parent('home');
    $trail->push('زبان', route('language.index'));
});
Breadcrumbs::for('language_create', function ($trail) {
    $trail->parent('language_list');
    $trail->push('افزودن زبان', route('language.index'));
});
Breadcrumbs::for('language_edit', function ($trail) {
    $trail->parent('language_list');
    $trail->push('ویرایش زبان', route('language.index'));
});

//category posts
Breadcrumbs::for('category_Post_list', function ($trail) {
    $trail->parent('home');
    $trail->push('لیست دسته بندی خبر ', route('category.index', 'type'));
});
Breadcrumbs::for('category_Post_edit', function ($trail,$id) {
    $trail->parent('category_Post_list');
    $trail->push('ویرایش دسته بندی خبر ', route('category.edit','id'));
});
Breadcrumbs::for('category_Post_create', function ($trail) {
    $trail->parent('category_Post_list');
    $trail->push('افزودن دسته بندی خبر ', route('category.create', 'type'));
});

//category course
Breadcrumbs::for('category_Course_list', function ($trail) {
    $trail->parent('home');
    $trail->push('لیست دسته بندی دورها', route('category.index', 'type'));
});
Breadcrumbs::for('category_Course_create', function ($trail) {
    $trail->parent('category_Course_list');
    $trail->push('افزودن دسته بندی دورها', route('category.create', 'type'));
});
Breadcrumbs::for('category_Course_edit', function ($trail,$id) {
    $trail->parent('category_Course_list');
    $trail->push('ویرایش دسته بندی دورها', route('category.edit','id'));
});

//posts text
Breadcrumbs::for('post_text_list', function ($trail) {
    $trail->parent('home');
    $trail->push('لیست   خبرها', route('post.index', 'type'));
});
Breadcrumbs::for('post_text_create', function ($trail) {
    $trail->parent('post_text_list');
    $trail->push('افزودن خبر', route('post.create', 'type'));
});
Breadcrumbs::for('post_text_edit', function ($trail,$id) {
    $trail->parent('post_text_list');
    $trail->push('ویرایش خبر', route('post.edit','id'));
});

//posts image
Breadcrumbs::for('post_image_list', function ($trail) {
    $trail->parent('home');
    $trail->push('لیست  گالری خبرها', route('post.index', 'type'));
});
Breadcrumbs::for('post_image_create', function ($trail) {
    $trail->parent('post_image_list');
    $trail->push('افزودن گالری خبر', route('post.create', 'type'));
});
Breadcrumbs::for('post_image_edit', function ($trail,$id) {
    $trail->parent('post_image_list');
    $trail->push('ویرایش گالری خبر', route('post.edit','id'));
});

//posts text
Breadcrumbs::for('post_video_list', function ($trail) {
    $trail->parent('home');
    $trail->push('لیست ویدیوها', route('post.index', 'type'));
});
Breadcrumbs::for('post_video_create', function ($trail) {
    $trail->parent('post_video_list');
    $trail->push('افزودن ویدیو', route('post.create', 'type'));
});
Breadcrumbs::for('post_video_edit', function ($trail,$id) {
    $trail->parent('post_video_list');
    $trail->push('ویرایش  ویدیو', route('post.edit','id'));
});

//tags
Breadcrumbs::for('tag_list', function ($trail) {
    $trail->parent('home');
    $trail->push('لیست تگها', route('tag.index'));
});
Breadcrumbs::for('tag_edit', function ($trail) {
    $trail->parent('tag_list');
    $trail->push(' ویرایش تگ', route('tag.edit', 'id'));
});
Breadcrumbs::for('tag_create', function ($trail) {
    $trail->parent('tag_list');
    $trail->push('افزودن تگ', route('tag.create'));
});

//comment post
Breadcrumbs::for('comment_Post_list', function ($trail) {
    $trail->parent('home');
    $trail->push('لیست نظرات  خبرها', route('comment.index', 'type'));
});
//comment course
Breadcrumbs::for('comment_Course_list', function ($trail) {
    $trail->parent('home');
    $trail->push('لیست نظرات  دروه ها', route('comment.index', 'type'));
});

//categoryUser
Breadcrumbs::for('categoryUser_list', function ($trail) {
    $trail->parent('home');
    $trail->push('لیست سطح دسترسی دسته بندی', route('categoryUser.index'));
});
Breadcrumbs::for('categoryUser_edit', function ($trail) {
    $trail->parent('categoryUser_list');
    $trail->push(' ویرایش سطح دسترسی دسته بندی', route('categoryUser.edit', 'id'));
});
Breadcrumbs::for('categoryUser_create', function ($trail) {
    $trail->parent('categoryUser_list');
    $trail->push('افزودن سطح دسترسی دسته بندی', route('categoryUser.create'));
});

//userDetail admin
Breadcrumbs::for('userDetail_admin_list', function ($trail) {
    $trail->parent('home');
    $trail->push('لیست مدیران', route('userDetail.index', 'type'));
});
Breadcrumbs::for('userDetail_admin_create', function ($trail) {
    $trail->parent('userDetail_admin_list');
    $trail->push('افزودن مدیر', route('userDetail.create', 'type'));
});
Breadcrumbs::for('userDetail_admin_edit', function ($trail,$id) {
    $trail->parent('userDetail_admin_list');
    $trail->push('ویرایش  مدیر', route('userDetail.edit',['role', 'id']));
});

//userDetail teacher
Breadcrumbs::for('userDetail_teacher_list', function ($trail) {
    $trail->parent('home');
    $trail->push('لیست مدرسان', route('userDetail.index', 'type'));
});
Breadcrumbs::for('userDetail_teacher_create', function ($trail) {
    $trail->parent('userDetail_teacher_list');
    $trail->push('افزودن مدرس', route('userDetail.create', 'type'));
});
Breadcrumbs::for('userDetail_teacher_edit', function ($trail,$id) {
    $trail->parent('userDetail_teacher_list');
    $trail->push('ویرایش  مدرس', route('userDetail.edit',['role', 'id']));
});

//userDetail marketer
Breadcrumbs::for('userDetail_marketer_list', function ($trail) {
    $trail->parent('home');
    $trail->push('لیست بازاریاب', route('userDetail.index', 'type'));
});
Breadcrumbs::for('userDetail_marketer_create', function ($trail) {
    $trail->parent('userDetail_marketer_list');
    $trail->push('افزودن بازاریاب', route('userDetail.create', 'type'));
});
Breadcrumbs::for('userDetail_marketer_edit', function ($trail,$id) {
    $trail->parent('userDetail_marketer_list');
    $trail->push('ویرایش  بازاریاب', route('userDetail.edit',['role', 'id']));
});

//userDetail user
Breadcrumbs::for('userDetail_user_list', function ($trail) {
    $trail->parent('home');
    $trail->push('لیست کاربران', route('userDetail.index', 'type'));
});
Breadcrumbs::for('userDetail_user_create', function ($trail) {
    $trail->parent('userDetail_user_list');
    $trail->push('افزودن کاربر', route('userDetail.create', 'type'));
});
Breadcrumbs::for('userDetail_user_edit', function ($trail,$id) {
    $trail->parent('userDetail_user_list');
    $trail->push('ویرایش  کاربر', route('userDetail.edit',['role', 'id']));
});
//userDetail reporter
Breadcrumbs::for('userDetail_reporter_list', function ($trail) {
    $trail->parent('home');
    $trail->push('لیست خبرنگاران', route('userDetail.index', 'type'));
});
Breadcrumbs::for('userDetail_reporter_create', function ($trail) {
    $trail->parent('userDetail_reporter_list');
    $trail->push('افزودن خبرنگار', route('userDetail.create', 'type'));
});
Breadcrumbs::for('userDetail_reporter_edit', function ($trail,$id) {
    $trail->parent('userDetail_reporter_list');
    $trail->push('ویرایش  خبرنگار', route('userDetail.edit',['role', 'id']));
});





//course
Breadcrumbs::for('course_list', function ($trail) {
    $trail->parent('home');
    $trail->push('لیست دوره ها', route('courseList'));
});
Breadcrumbs::for('course_create', function ($trail) {
    $trail->parent('course_list');
    $trail->push('افزودن دوره ها', route('courseCreate'));
});
Breadcrumbs::for('course_edit', function ($trail,$id) {
    $trail->parent('course_list');
    $trail->push('ویرایش دوره ها', route('courseEdit','id'));
});
//course season
Breadcrumbs::for('season_course_list', function ($trail,$id) {
    $trail->parent('course_list');
    $trail->push('لیست فصل دوره', route('seasonCourseList','id'));
});
Breadcrumbs::for('season_course_create', function ($trail) {
    $trail->parent('course_list');
    $trail->push('افزودن فصل دوره', route('seassonCreate'));
});
//adversting
Breadcrumbs::for('adversting_list', function ($trail) {
    $trail->parent('home');
    $trail->push('لیست بنر تبلیغاتی', route('advertingList'));
});
Breadcrumbs::for('adversting_creates', function ($trail) {
    $trail->parent('adversting_list');
    $trail->push('افزودن بنر تبلیغاتی', route('advertingcreate'));
});
Breadcrumbs::for('adversting_edit', function ($trail,$id) {
    $trail->parent('adversting_list');
    $trail->push('ویرایش بنر تبلیغاتی', route('advertingEdit','id'));
});
//menu
Breadcrumbs::for('menus_list', function ($trail) {
    $trail->parent('home');
    $trail->push('لیست منو', route('MenuList'));
});
Breadcrumbs::for('menus_create', function ($trail) {
    $trail->parent('menus_list');
    $trail->push('افزودن منو', route('MenuCreate'));
});







Breadcrumbs::for('contactUs', function ($trail) {
    $trail->parent('home');
    $trail->push(' تماس باما', route('contactUs'));
});
Breadcrumbs::for('setting_list', function ($trail) {
    $trail->parent('home');
    $trail->push(' تنظیمات سایت', route('setting_list'));
});
Breadcrumbs::for('setting_edit', function ($trail,$id) {
    $trail->parent('setting_list');
    $trail->push(' ویرایش تنظیمات سایت', route('settingEdit','id'));
});
Breadcrumbs::for('social_list', function ($trail) {
    $trail->parent('home');
    $trail->push(' شبکه های اجتماعی', route('socialList'));
});
Breadcrumbs::for('social_edit', function ($trail,$id) {
    $trail->parent('social_list');
    $trail->push(' ویرایش شبکه های اجتماعی', route('socialEdit','id'));
});
Breadcrumbs::for('page_list', function ($trail) {
    $trail->parent('home');
    $trail->push(' لیست برگه ها', route('pageList'));
});
Breadcrumbs::for('page_edit', function ($trail,$id) {
    $trail->parent('page_list');
    $trail->push(' ویرایش برگه', route('pageEdit','id'));
});
Breadcrumbs::for('page_create', function ($trail) {
    $trail->parent('page_list');
    $trail->push(' افزودن برگه', route('pageCreate'));
});




//Breadcrumbs::for('video_list', function ($trail) {
//    $trail->parent('home');
//    $trail->push('لیست ویدیو', route('videoList'));
//});
//Breadcrumbs::for('video_create', function ($trail) {
//    $trail->parent('video_list');
//    $trail->push('افزودن ویدیو', route('videoCreate'));
//});
//Breadcrumbs::for('video_edit', function ($trail,$id) {
//    $trail->parent('video_list');
//    $trail->push('ویرایش ویدیو', route('videoEdit','id'));
//});
//Breadcrumbs::for('news_list', function ($trail) {
//    $trail->parent('home');
//    $trail->push(' لیست خبرها', route('news.index'));
//});
//Breadcrumbs::for('comments_list', function ($trail,$id) {
//    $trail->parent('news_list');
//    $trail->push(' لیست نظرات', route('CommentsList','id'));
//});
//Breadcrumbs::for('news_edit', function ($trail,$id) {
//    $trail->parent('news_list');
//    $trail->push(' ویرایش خبر', route('news.edit','id'));
//});
//Breadcrumbs::for('news_create', function ($trail) {
//    $trail->parent('news_list');
//    $trail->push('افزودن خبر', route('news.create'));
//});
//Breadcrumbs::for('news_list_admin', function ($trail) {
//    $trail->parent('news_list');
//    $trail->push('لیست خبرها', route('AdminNewsList'));
//});
//Breadcrumbs::for('gallery_list', function ($trail) {
//    $trail->parent('news_list');
//    $trail->push('لیست گالری خبرها', route('galleryList'));
//});
//Breadcrumbs::for('gallery_create', function ($trail) {
//    $trail->parent('news_list');
//    $trail->push('افزودن گالری ', route('galleryCreate'));
//});
//Breadcrumbs::for('gallery_edit', function ($trail) {
//    $trail->parent('news_list');
//    $trail->push('ویرایش گالری ', route('galleryEdit'));
//});


Breadcrumbs::for('trachonesh_list', function ($trail) {
    $trail->parent('home');
    $trail->push('لیست تراکنش ها', route('trachoneshUserList'));
});
Breadcrumbs::for('order_list', function ($trail) {
    $trail->parent('home');
    $trail->push('لیست سفارشات', route('OrderUserList'));
});
Breadcrumbs::for('order_details', function ($trail,$id) {
    $trail->parent('order_list');
    $trail->push('جزئیات سفارش', route('orderDetail','id'));
});

Breadcrumbs::for('discount_code_list', function ($trail) {
    $trail->parent('course_list');
    $trail->push('لیست کد تخفیف', route('discountList'));
});
Breadcrumbs::for('discount_code_create', function ($trail) {
    $trail->parent('discount_code_list');
    $trail->push('افزودن کد تخفیف', route('discountCreate'));
});
Breadcrumbs::for('discount_code_edit', function ($trail,$id) {
    $trail->parent('discount_code_list');
    $trail->push('ویرایش کد تخفیف', route('discountEdit','id'));
});


//Breadcrumbs::for('profile_admin', function ($trail) {
//    $trail->parent('home');
//    $trail->push('حساب کاربری  مدیر', route('AdminProfile'));
//});
//Breadcrumbs::for('reporter_admin', function ($trail) {
//    $trail->parent('home');
//    $trail->push('حساب کاربری خبرنگار', route('ReporterProfile'));
//});
//Breadcrumbs::for('admin_lists', function ($trail) {
//    $trail->parent('home');
//    $trail->push('لیست مدیران', route('adminList'));
//});
//Breadcrumbs::for('reporter_lists', function ($trail) {
//    $trail->parent('home');
//    $trail->push('لیست خبرنگاران', route('reporterList'));
//});
//Breadcrumbs::for('users_list', function ($trail) {
//    $trail->parent('home');
//    $trail->push('لیست کاربران', route('usersList'));
//});
//Breadcrumbs::for('users_create', function ($trail) {
//    $trail->parent('home');
//    $trail->push('افزودن کاربر', route('usersCreate'));
//});
