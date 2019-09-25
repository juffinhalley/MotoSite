<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/NewBattleItems', 'NewBattleItems@getResponse');
Route::get('/getMapData', function(){

    // $items = [
    //         [
    //             "type" => "gas",
    //             "pos" => [
    //                 "lat" => "46.7183605",
    //                 "lng" => "32.7810254"
    //             ],
    //             "icon" => [
    //                 "def" => "images/map_icons/gas_icon.png",
    //                 "hover" => "images/map_icons/gas_icon_active.png"
    //             ],
    //             "name" => "Мотосалон «Motoshop»",
    //             "rating" => "4.9",
    //             "addres" => "77-й километр Шоссе М17",
    //             "url" => "#",
    //             "feedsUrl" => "#"
    //         ],[
    //             "type" => "meets",
    //             "pos" => [
    //                 "lat" => "46.6301857",
    //                 "lng" => "32.6109056"
    //             ],
    //             "icon" => [
    //                 "def" => "images/map_icons/gathering_place_icon.png",
    //                 "hover" => "images/map_icons/gathering_place_icon_active.png"
    //             ],
    //             "name" => "Мотосалон «Motoshop66»",
    //             "rating" => "5",
    //             "addres" => "77-й Шоссе километр  М17",
    //             "url" => "#",
    //             "feedsUrl" => "#"
    //         ],[
    //             "type" => "rests",
    //             "pos" => [
    //                 "lat" => "46.6307357",
    //                 "lng" => "32.7322828"
    //             ],
    //             "icon" => [
    //                 "def" => "images/map_icons/hotel_icon.png",
    //                 "hover" => "images/map_icons/hotel_icon_active.png"
    //             ],
    //             "name" => "Мотосалон «Motoshop6»",
    //             "rating" => "4.7",
    //             "addres" => "77-й километр Шоссе М171",
    //             "url" => "#",
    //             "feedsUrl" => "#"
    //         ],[
    //             "type" => "motoschools",
    //             "pos" => [
    //                 "lat" => "46.5335049",
    //                 "lng" => "32.9592518"
    //             ],
    //             "icon" => [
    //                 "def" => "images/map_icons/motoschool_icon.png",
    //                 "hover" => "images/map_icons/motoschool_icon_active.png"
    //             ],
    //             "name" => "Мотосалон «Motoshop15»",
    //             "rating" => "1.9",
    //             "addres" => "77-й М17километр Шоссе ",
    //             "url" => "#",
    //             "feedsUrl" => "#"
    //         ],[
    //             "type" => "sto",
    //             "pos" => [
    //                 "lat" => "46.4340577",
    //                 "lng" => "32.5633642"
    //             ],
    //             "icon" => [
    //                 "def" => "images/map_icons/service_icon_own.png",
    //                 "hover" => "images/map_icons/service_icon_own_active.png"
    //             ],
    //             "name" => "Мотосалон «Motoshop1»",
    //             "rating" => "2.2",
    //             "addres" => " Шоссе М17 77-й километр",
    //             "url" => "#",
    //             "feedsUrl" => "#"
    //         ],[
    //             "type" => "services",
    //             "pos" => [
    //                 "lat" => "46.6527022",
    //                 "lng" => "32.5717521"
    //             ],
    //             "icon" => [
    //                 "def" => "images/map_icons/service_icon.png",
    //                 "hover" => "images/map_icons/service_icon_active.png"
    //             ],
    //             "name" => "Мотосалон «Motoshop4»",
    //             "rating" => "2.9",
    //             "addres" => "километр 77-й  Шоссе М17",
    //             "url" => "#",
    //             "feedsUrl" => "#"
    //         ],[
    //             "type" => "interest",
    //             "pos" => [
    //                 "lat" => "46.4765592",
    //                 "lng" => "32.7229136"
    //             ],
    //             "icon" => [
    //                 "def" => "images/map_icons/rest_icon.png",
    //                 "hover" => "images/map_icons/rest_icon_active.png"
    //             ],
    //             "name" => "Мотосалон «Motoshop2»",
    //             "rating" => "3.9",
    //             "addres" => "77-й киломе М17 етр Шосс",
    //             "url" => "#",
    //             "feedsUrl" => "#"
    //         ],[
    //             "type" => "salons",
    //             "pos" => [
    //                 "lat" => "46.4610594",
    //                 "lng" => "33.4586305"
    //             ],
    //             "icon" => [
    //                 "def" => "images/map_icons/motoshop_icon.png",
    //                 "hover" => "images/map_icons/motoshop_icon_active.png"
    //             ],
    //             "name" => "Мотосалон «Motoshop3»",
    //             "rating" => "4.4",
    //             "addres" => "77-й Шоссе М17 километр",
    //             "url" => "#",
    //             "feedsUrl" => "#"
    //         ]
    // ];


    // ---------------------------------
    function rand_float($st_num=0,$end_num=1,$mul=1000000)
    {
    if ($st_num>$end_num) return false;
        return mt_rand($st_num*$mul,$end_num*$mul)/$mul;
    }

    $items = [];

    $icons = [
        [
            "def" => "images/map_icons/gathering_place_icon.png",
            "hover" => "images/map_icons/gathering_place_icon_active.png"
        ],[
            "def" => "images/map_icons/gas_icon.png",
            "hover" => "images/map_icons/gas_icon_active.png"
        ],[
            "def" => "images/map_icons/hotel_icon.png",
            "hover" => "images/map_icons/hotel_icon_active.png"
        ],[
            "def" => "images/map_icons/motoschool_icon.png",
            "hover" => "images/map_icons/motoschool_icon_active.png"
        ],[
            "def" => "images/map_icons/service_icon_own.png",
            "hover" => "images/map_icons/service_icon_own_active.png"
        ],[
            "def" => "images/map_icons/service_icon.png",
            "hover" => "images/map_icons/service_icon_active.png"
        ],[
            "def" => "images/map_icons/rest_icon.png",
            "hover" => "images/map_icons/rest_icon_active.png"
        ],[
            "def" => "images/map_icons/motoshop_icon.png",
            "hover" => "images/map_icons/motoshop_icon_active.png"
        ]
    ];

    $types = [
        "sto",
        "gas",
        "salons",
        "rests",
        "interest",
        "meets",
        "motoschools",
        "services",
    ];

    for ($i=0; $i < 5000; $i++) {
        $items[] = [
            "type" => $types[array_rand($types)],
            "pos" => [
                "lat" => rand_float(-36,70)."\n",
                "lng" => rand_float(-170,170)."\n"
            ],
            "icon" => $icons[array_rand($icons)],
            "name" => "Мотосалон «Motoshop".$i."»",
            "rating" => rand_float(0,5,4)."\n",
            "addres" => "77-й Шоссе километр  М17",
            "url" => "#",
            "feedsUrl" => "#"
        ];
    }
    // ----------------------------

    $map = [
        'zoom' => '3.75',
        'startPos' => [
            'lat' => '46.5057373',
            'lng' => '33.0703005'
        ],
        'markers' => $items
    ];

    return response()->json($map);
});
Route::get('/search', function(){
    $video = view('block.search.video')->render();
    $places = view('block.search.places')->render();
    $photo = view('block.search.photo')->render();
    $peoples = view('block.search.peoples')->render();
    $motos = view('block.search.motos')->render();
    $events = view('block.search.events')->render();
    $clubs = view('block.search.clubs')->render();
    $battles = view('block.search.battles')->render();
    $articles = view('block.search.articles')->render();
    $announces = view('block.search.video')->render();

    $data = [
        "succes" => true,
        "markup" =>
            $video.
            $places.
            $photo.
            $peoples.
            $motos.
            $events.
            $clubs.
            $battles.
            $articles.
            $announces
    ];

    return response()->json($data);
});

Route::get('/eventConfirm', function(){
    $hwm = 7;

    return ["newData" => $hwm];
});
Route::get('/removeWanted', function(){
    return ["succes" => true];
});

Route::get('/', function () {
    return view('index');
})->name('/');

Route::get('/map', function () {
    return view('map');
})->name('map');

Route::get('/wanted', function () {
    return view('wanted');
})->name('wanted');

Route::get('/motos', function () {
    return view('motos');
})->name('motos');

Route::get('/profile', function () {
    return view('profile');
})->name('profile');

Route::get('/adspage', function () {
    return view('adspage');
})->name('adspage');

Route::get('/adspage2', function () {
    return view('adspage2');
})->name('adspage2');

Route::get('/adspage3', function () {
    return view('adspage3');
})->name('adspage3');

Route::get('/battles', function () {
    return view('battles');
})->name('battles');

Route::get('/faq', function () {
    return view('faq');
})->name('faq');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/agreement', function () {
    return view('agreement');
})->name('agreement');

Route::get('/support', function () {
    return view('support');
})->name('support');

Route::get('/events', function () {
    return view('events');
})->name('events');

Route::get('/events2', function () {
    return view('events2');
})->name('events2');

Route::get('/events3', function () {
    return view('events3');
})->name('events3');

Route::get('/event', function () {
    return view('event');
})->name('event');

Route::get('/eventEnd', function () {
    return view('eventEnd');
})->name('eventEnd');

Route::get('/eventCreate', function () {
    return view('eventCreate');
})->name('eventCreate');

Route::get('/eventCreate2', function () {
    return view('eventCreate2');
})->name('eventCreate2');

Route::get('/eventCreateLead', function () {
    return view('eventCreateLead');
})->name('eventCreateLead');

Route::get('/achivments', function () {
    return view('achivments');
})->name('achivments');

Route::get('/articles', function () {
    return view('articles');
})->name('articles');

Route::get('/404', function () {
    return view('404');
})->name('404');

Route::get('/403', function () {
    return view('403');
})->name('403');

Route::get('/ui', function () {
    return view('ui');
})->name('ui');

Route::get('/motosPage', function () {
    return view('/motosPage');
})->name('motosPage');

Route::get('/motosPage2', function () {
    return view('/motosPage2');
})->name('motosPage2');

Route::get('/motosPage3', function () {
    return view('/motosPage3');
})->name('motosPage3');

Route::get('/motosPage4', function () {
    return view('/motosPage4');
})->name('motosPage4');

Route::get('/motosPage5', function () {
    return view('/motosPage5');
})->name('motosPage5');

Route::get('/createLbRecord', function () {
    return view('/createLbRecord');
})->name('createLbRecord');

Route::get('/logbookNote', function () {
    return view('logbookNote');
})->name('logbookNote');

Route::get('/logbook', function () {
    return view('logbook');
})->name('logbook');

Route::get('/motoEditPage', function () {
    return view('motoEditPage');
})->name('motoEditPage');

Route::get('/motoCreatePage', function () {
    return view('motoCreatePage');
})->name('motoCreatePage');

Route::get('/motoCreatePageBegin', function () {
    return view('motoCreatePageBegin');
})->name('motoCreatePageBegin');

Route::get('/motoProfileUnreg', function () {
    return view('motoProfileUnreg');
})->name('motoProfileUnreg');

Route::get('/motoAchivments', function () {
    return view('motoAchivments');
})->name('motoAchivments');

Route::get('/mainBattles', function () {
    return view('mainBattles');
})->name('mainBattles');

Route::get('/mainBattlesWin', function () {
    return view('mainBattlesWin');
})->name('mainBattlesWin');

Route::get('/motoProfile', function () {
    return view('motoProfile');
})->name('motoProfile');

Route::get('/motoProfileSelf', function () {
    return view('motoProfileSelf');
})->name('motoProfileSelf');

Route::get('/messages', function () {
    return view('messages');
})->name('messages');

Route::get('/motoCreateRecord', function () {
    return view('motoCreateRecord');
})->name('motoCreateRecord');

Route::get('/motoEditRecord', function () {
    return view('motoEditRecord');
})->name('motoEditRecord');

Route::get('/menuSettings', function () {
    return view('/menuSettings');
})->name('menuSettings');

Route::get('/siteTop', function () {
    return view('/siteTop');
})->name('siteTop');

Route::get('/siteTopMoto', function () {
    return view('/siteTopMoto');
})->name('siteTopMoto');

Route::get('/topMotoAllTime', function () {
    return view('/topMotoAllTime');
})->name('topMotoAllTime');

Route::get('/topMotoYear', function () {
    return view('/topMotoYear');
})->name('topMotoYear');

Route::get('/topMotoMonth', function () {
    return view('/topMotoMonth');
})->name('topMotoMonth');

Route::get('/topMotoWeek', function () {
    return view('/topMotoWeek');
})->name('topMotoWeek');

Route::get('/topMotoDay', function () {
    return view('/topMotoDay');
})->name('topMotoDay');

Route::get('/siteTopPhoto', function () {
    return view('/siteTopPhoto');
})->name('siteTopPhoto');

Route::get('/topPhotoAllTime', function () {
    return view('/topPhotoAllTime');
})->name('topPhotoAllTime');

Route::get('/topPhotoYear', function () {
    return view('/topPhotoYear');
})->name('topPhotoYear');

Route::get('/topPhotoMonth', function () {
    return view('/topPhotoMonth');
})->name('topPhotoMonth');

Route::get('/topPhotoWeek', function () {
    return view('/topPhotoWeek');
})->name('topPhotoWeek');

Route::get('/topPhotoDay', function () {
    return view('/topPhotoDay');
})->name('topPhotoDay');

Route::get('/siteTopUser', function () {
    return view('/siteTopUser');
})->name('siteTopUser');

Route::get('/topUserAllTime', function () {
    return view('/topUserAllTime');
})->name('topUserAllTime');

Route::get('/topUserYear', function () {
    return view('/topUserYear');
})->name('topUserYear');

Route::get('/topUserMonth', function () {
    return view('/topUserMonth');
})->name('topUserMonth');

Route::get('/topUserDay', function () {
    return view('/topUserDay');
})->name('topUserDay');

Route::get('/siteTopVideo', function () {
    return view('/siteTopVideo');
})->name('siteTopVideo');

Route::get('/topVideoAllTime', function () {
    return view('/topVideoAllTime');
})->name('topVideoAllTime');

Route::get('/topVideoYear', function () {
    return view('/topVideoYear');
})->name('topVideoYear');

Route::get('/topVideoMonth', function () {
    return view('/topVideoMonth');
})->name('topVideoMonth');

Route::get('/topVideoDay', function () {
    return view('/topVideoDay');
})->name('topVideoDay');

Route::get('/myPlaces', function () {
    return view('/myPlaces');
})->name('myPlaces');

Route::get('/helpPlaces', function () {
    return view('/helpPlaces');
})->name('helpPlaces');

Route::get('/meetPlaces', function () {
    return view('/meetPlaces');
})->name('meetPlaces');

Route::get('/interestPlaces', function () {
    return view('/interestPlaces');
})->name('interestPlaces');

Route::get('/restPlaces', function () {
    return view('/restPlaces');
})->name('restPlaces');

Route::get('/shopPlaces', function () {
    return view('/shopPlaces');
})->name('shopPlaces');

Route::get('/schoolPlaces', function () {
    return view('/schoolPlaces');
})->name('schoolPlaces');

Route::get('/schoolPlaces', function () {
    return view('/schoolPlaces');
})->name('schoolPlaces');

Route::get('/servicePlaces', function () {
    return view('/servicePlaces');
})->name('servicePlaces');

Route::get('/stoPlaces', function () {
    return view('/stoPlaces');
})->name('stoPlaces');

Route::get('/stoPlace', function () {
    return view('/stoPlace');
})->name('stoPlace');

Route::get('/usersFilter', function () {
    return view('/usersFilter');
})->name('usersFilter');

Route::get('/usersFilterSearch', function () {
    return view('/usersFilterSearch');
})->name('usersFilterSearch');

Route::get('/users', function () {
    return view('/users');
})->name('users');


Route::get('/addedNewMM', function () {
    return response()->view('block.popups.addedNewMM');
});

// Popups

Route::get('/confirmButton', function () {

    $data = [
        "success" => true,
        "confirm" => true,
        "text" => "Необходимо ещё 7"
    ];

    return response()->json($data);
});

//

Auth::routes();

Route::get('/dialogue1', 'ChatController@chat');
Route::post('/send', 'ChatController@send');

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/getOldMessages', function () {
    return "";
});
