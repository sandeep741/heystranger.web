<footer id="main-footer" class="container-fluid">
    <div class="vc_row wpb_row st bg-holder vc_custom_1457429455924 vc_row-has-fill">
        <div class='container '>
            <div class='row'>
                <div class="wpb_column column_container col-md-3 vc_custom_1422334137119">
                    <div class="vc_column-inner wpb_wrapper">
                        <div class="wpb_text_column wpb_content_element ">
                            <div class="wpb_wrapper">
                                <p><img class="alignnone size-full wp-image-11123" src="{{ asset('/assets/images/logo-white.png') }}" alt="logo-white" width="110" height="40" /></p>
                                <p>{{ config('constants.footer_about') }}</p>
                            </div>
                        </div>
                        <div class="wpb_raw_code wpb_content_element wpb_raw_html">
                            <div class="wpb_wrapper">
                                <ul class="list list-horizontal list-space">
                                    <li>
                                        <a href="{{ config('constants.social')['facebook'] }}" target="_blank" class="fa fa-facebook box-icon-normal round animate-icon-bottom-to-top"></a>
                                    </li>
                                    <li>
                                        <a href="{{ config('constants.social')['twitter'] }}" target="_blank" class="fa fa-twitter box-icon-normal round animate-icon-bottom-to-top"></a>
                                    </li>
                                    <li>
                                        <a href="{{ config('constants.social')['linked_in'] }}" target="_blank" class="fa fa-linkedin box-icon-normal round animate-icon-bottom-to-top"></a>
                                    </li>
                                    <li>
                                        <a href="{{ config('constants.social')['google_plus'] }}" target="_blank" class="fa fa-google-plus box-icon-normal round animate-icon-bottom-to-top"></a>
                                    </li>
                                    <li>
                                        <a href="{{ config('constants.social')['pinterest'] }}" target="_blank" class="fa fa-pinterest box-icon-normal round animate-icon-bottom-to-top"></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="wpb_column column_container col-md-3 vc_custom_1422334156180">
                    <div class="vc_column-inner wpb_wrapper">
                        <div class="wpb_text_column wpb_content_element ">
                            <div class="wpb_wrapper">
                                <!-- MailChimp for WordPress v2.3.16 - https://wordpress.org/plugins/mailchimp-for-wp/ -->
                                <div id="mc4wp-form-2" class="form mc4wp-form">
                                    <form method="get" action="{{ route('home') }}">
                                        <h4>Newsletter</h4>
                                        <label>Enter your E-mail Address</label>
                                        <input type="email" name="EMAIL" class="form-control">
                                        <p class="mt5"><small>*We Never Send Spam</small>
                                        </p>
                                        <input type="submit" value="Subscribe" class="btn btn-primary">
                                        <div style="position: absolute; left: -5000px;"><input type="text" name="_mc4wp_ho_6b633c0a12ecd87bd4089deb69f7edd4" value="" tabindex="-1" autocomplete="off" /></div>
                                        <input type="hidden" name="_mc4wp_timestamp" value="1487265576" /><input type="hidden" name="_mc4wp_form_id" value="0" /><input type="hidden" name="_mc4wp_form_element_id" value="mc4wp-form-2" /><input type="hidden" name="_mc4wp_form_submit" value="1" /><input type="hidden" name="_mc4wp_form_nonce" value="bb2af00e32" />
                                    </form>
                                </div>
                                <!-- / MailChimp for WordPress Plugin -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="wpb_column column_container col-md-2 vc_custom_1422334176021">
                    <div class="vc_column-inner wpb_wrapper">
                        <div class="wpb_raw_code wpb_content_element wpb_raw_html">
                            <div class="wpb_wrapper">
                                <ul class="list list-footer">
                                    <li><a href="#">About US</a>
                                    </li>
                                    <li><a href="#">Press Centre</a>
                                    </li>
                                    <li><a href="#">Best Price Guarantee</a>
                                    </li>
                                    <li><a href="#">Travel News</a>
                                    </li>
                                    <li><a href="#">Jobs</a>
                                    </li>
                                    <li><a href="#">Privacy Policy</a>
                                    </li>
                                    <li><a href="#">Terms of Use</a>
                                    </li>
                                    <li><a href="#">Feedback</a>
                                    </li>
                                    <li><a href="#">How it words ?</a>
                                    </li>
                                    <li><a href="#">Become a Partner</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="wpb_column column_container col-md-4 vc_custom_1422334188578">
                    <div class="vc_column-inner wpb_wrapper">
                        <div class="wpb_raw_code wpb_content_element wpb_raw_html">
                            <div class="wpb_wrapper">
                                <h4>Have Questions?</h4>
                                <h4 class="text-color">+{{ config('constants.info')['contact_no'] }}</h4>
                                <h4><a class="text-color" href="#">{{ config('constants.info')['email_id'] }}</a></h4>
                                <p>24/7 Dedicated Customer Support</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End .row-->
        </div>
        <!--End .container-->
    </div>
    
    @if(\Request::route()->getName() == 'home')
    <div class="welcome-pop-up">
        <span>HeyStranger for Tour and Travel</span>
        <h3 style="color:#333;">March 15th, 2018</h3>

        <div class="clok-timer-img">
            <div class="site-banner-timer site-banner-block">
                <div id="banner-countdown"></div>
            </div>
        </div>
        <div class="close-pop" style="color:#333;"><i class="fa fa-close"></i></div>
    </div>
    <div class="bg-blacken active"></div>
    @endif
</footer>
<!-- Gotop -->
<div id="gotop" title="Go to top">
    <i class="fa fa-chevron-up"></i>
</div>
<!-- End Gotop -->

<script type='text/javascript'>
    /* <![CDATA[ */
    var list_location = {
        "list": "\"\""
    };
    var st_checkout_text = {
        "without_pp": "Submit Request",
        "with_pp": "Booking Now",
        "validate_form": "Please fill all required fields",
        "error_accept_term": "Please accept our terms and conditions",
        "adult_price": "Adult",
        "child_price": "Child",
        "infant_price": "Infant",
        "adult": "Adult",
        "child": "Child",
        "infant": "Infant",
        "price": "Price",
        "origin_price": "Origin Price"
    };
    var st_params = {
        "theme_url": "heystranger.com",
        "site_url": "heystranger.com",
        "ajax_url": "",
        "loading_url": "images\/wpspin_light.gif",
        "st_search_nonce": "738928d4c6",
        "facebook_enable": "on",
        "facbook_app_id": "",
        "booking_currency_precision": "2",
        "thousand_separator": ".",
        "decimal_separator": ",",
        "currency_symbol": "$",
        "currency_position": "left",
        "currency_rtl_support": "off",
        "free_text": "Free",
        "date_format": "mm\/dd\/yyyy",
        "date_format_calendar": "mm\/dd\/yyyy",
        "time_format": "12h",
        "mk_my_location": "images\/my_location.png",
        "locale": "en",
        "header_bgr": "",
        "text_refresh": "Refresh",
        "date_fomat": "MM\/DD\/YYYY",
        "text_loading": "Loading...",
        "text_no_more": "No More"
    };
    var st_timezone = {
        "timezone_string": ""
    };
    var st_list_map_params = {
        "mk_my_location": "images\/my_location.png",
        "text_my_location": "3000 m radius",
        "text_no_result": "No Result",
        "cluster_0": "<div class='cluster cluster-1'>CLUSTER_COUNT<\/div>",
        "cluster_20": "<div class='cluster cluster-2'>CLUSTER_COUNT<\/div>",
        "cluster_50": "<div class='cluster cluster-3'>CLUSTER_COUNT<\/div>",
        "cluster_m1": "images\/m1.png",
        "cluster_m2": "images\/m2.png",
        "cluster_m3": "images\/m3.png",
        "cluster_m4": "images\/m4.png",
        "cluster_m5": "images\/m5.png"
    };
    var st_config_partner = {
        "text_er_image_format": ""
    };
    var st_location_from_to = {
        "lists": []
    };
    var st_hotel_localize = {
        "booking_required_adult": "Please select adult number",
        "booking_required_children": "Please select children number",
        "booking_required_adult_children": "Please select Adult and  Children number",
        "room": "Room",
        "is_aoc_fail": "Please select the ages of children",
        "is_not_select_date": "Please select Check-in and Check-out date",
        "is_not_select_check_in_date": "Please select Check-in date",
        "is_not_select_check_out_date": "Please select Check-out date",
        "is_host_name_fail": "Please provide Host Name(s)"
    };
    var st_icon_picker = {
        "icon_list": ["fa-glass", "fa-music", "fa-search", "fa-envelope-o", "fa-heart", "fa-star", "fa-star-o", "fa-user", "fa-film", "fa-th-large", "fa-th", "fa-th-list", "fa-check", "fa-remove", "fa-close", "fa-times", "fa-search-plus", "fa-search-minus", "fa-power-off", "fa-signal", "fa-gear", "fa-cog", "fa-trash-o", "fa-home", "fa-file-o", "fa-clock-o", "fa-road", "fa-download", "fa-arrow-circle-o-down", "fa-arrow-circle-o-up", "fa-inbox", "fa-play-circle-o", "fa-rotate-right", "fa-repeat", "fa-refresh", "fa-list-alt", "fa-lock", "fa-flag", "fa-headphones", "fa-volume-off", "fa-volume-down", "fa-volume-up", "fa-qrcode", "fa-barcode", "fa-tag", "fa-tags", "fa-book", "fa-bookmark", "fa-print", "fa-camera", "fa-font", "fa-bold", "fa-italic", "fa-text-height", "fa-text-width", "fa-align-left", "fa-align-center", "fa-align-right", "fa-align-justify", "fa-list", "fa-dedent", "fa-outdent", "fa-indent", "fa-video-camera", "fa-photo", "fa-image", "fa-picture-o", "fa-pencil", "fa-map-marker", "fa-adjust", "fa-tint", "fa-edit", "fa-pencil-square-o", "fa-share-square-o", "fa-check-square-o", "fa-arrows", "fa-step-backward", "fa-fast-backward", "fa-backward", "fa-play", "fa-pause", "fa-stop", "fa-forward", "fa-fast-forward", "fa-step-forward", "fa-eject", "fa-chevron-left", "fa-chevron-right", "fa-plus-circle", "fa-minus-circle", "fa-times-circle", "fa-check-circle", "fa-question-circle", "fa-info-circle", "fa-crosshairs", "fa-times-circle-o", "fa-check-circle-o", "fa-ban", "fa-arrow-left", "fa-arrow-right", "fa-arrow-up", "fa-arrow-down", "fa-mail-forward", "fa-share", "fa-expand", "fa-compress", "fa-plus", "fa-minus", "fa-asterisk", "fa-exclamation-circle", "fa-gift", "fa-leaf", "fa-fire", "fa-eye", "fa-eye-slash", "fa-warning", "fa-exclamation-triangle", "fa-plane", "fa-calendar", "fa-random", "fa-comment", "fa-magnet", "fa-chevron-up", "fa-chevron-down", "fa-retweet", "fa-shopping-cart", "fa-folder", "fa-folder-open", "fa-arrows-v", "fa-arrows-h", "fa-bar-chart-o", "fa-bar-chart", "fa-twitter-square", "fa-facebook-square", "fa-camera-retro", "fa-key", "fa-gears", "fa-cogs", "fa-comments", "fa-thumbs-o-up", "fa-thumbs-o-down", "fa-star-half", "fa-heart-o", "fa-sign-out", "fa-linkedin-square", "fa-thumb-tack", "fa-external-link", "fa-sign-in", "fa-trophy", "fa-github-square", "fa-upload", "fa-lemon-o", "fa-phone", "fa-square-o", "fa-bookmark-o", "fa-phone-square", "fa-twitter", "fa-facebook-f", "fa-facebook", "fa-github", "fa-unlock", "fa-credit-card", "fa-feed", "fa-rss", "fa-hdd-o", "fa-bullhorn", "fa-bell", "fa-certificate", "fa-hand-o-right", "fa-hand-o-left", "fa-hand-o-up", "fa-hand-o-down", "fa-arrow-circle-left", "fa-arrow-circle-right", "fa-arrow-circle-up", "fa-arrow-circle-down", "fa-globe", "fa-wrench", "fa-tasks", "fa-filter", "fa-briefcase", "fa-arrows-alt", "fa-group", "fa-users", "fa-chain", "fa-link", "fa-cloud", "fa-flask", "fa-cut", "fa-scissors", "fa-copy", "fa-files-o", "fa-paperclip", "fa-save", "fa-floppy-o", "fa-square", "fa-navicon", "fa-reorder", "fa-bars", "fa-list-ul", "fa-list-ol", "fa-strikethrough", "fa-underline", "fa-table", "fa-magic", "fa-truck", "fa-pinterest", "fa-pinterest-square", "fa-google-plus-square", "fa-google-plus", "fa-money", "fa-caret-down", "fa-caret-up", "fa-caret-left", "fa-caret-right", "fa-columns", "fa-unsorted", "fa-sort", "fa-sort-down", "fa-sort-desc", "fa-sort-up", "fa-sort-asc", "fa-envelope", "fa-linkedin", "fa-rotate-left", "fa-undo", "fa-legal", "fa-gavel", "fa-dashboard", "fa-tachometer", "fa-comment-o", "fa-comments-o", "fa-flash", "fa-bolt", "fa-sitemap", "fa-umbrella", "fa-paste", "fa-clipboard", "fa-lightbulb-o", "fa-exchange", "fa-cloud-download", "fa-cloud-upload", "fa-user-md", "fa-stethoscope", "fa-suitcase", "fa-bell-o", "fa-coffee", "fa-cutlery", "fa-file-text-o", "fa-building-o", "fa-hospital-o", "fa-ambulance", "fa-medkit", "fa-fighter-jet", "fa-beer", "fa-h-square", "fa-plus-square", "fa-angle-double-left", "fa-angle-double-right", "fa-angle-double-up", "fa-angle-double-down", "fa-angle-left", "fa-angle-right", "fa-angle-up", "fa-angle-down", "fa-desktop", "fa-laptop", "fa-tablet", "fa-mobile-phone", "fa-mobile", "fa-circle-o", "fa-quote-left", "fa-quote-right", "fa-spinner", "fa-circle", "fa-mail-reply", "fa-reply", "fa-github-alt", "fa-folder-o", "fa-folder-open-o", "fa-smile-o", "fa-frown-o", "fa-meh-o", "fa-gamepad", "fa-keyboard-o", "fa-flag-o", "fa-flag-checkered", "fa-terminal", "fa-code", "fa-mail-reply-all", "fa-reply-all", "fa-star-half-empty", "fa-star-half-full", "fa-star-half-o", "fa-location-arrow", "fa-crop", "fa-code-fork", "fa-unlink", "fa-chain-broken", "fa-question", "fa-info", "fa-exclamation", "fa-superscript", "fa-subscript", "fa-eraser", "fa-puzzle-piece", "fa-microphone", "fa-microphone-slash", "fa-shield", "fa-calendar-o", "fa-fire-extinguisher", "fa-rocket", "fa-maxcdn", "fa-chevron-circle-left", "fa-chevron-circle-right", "fa-chevron-circle-up", "fa-chevron-circle-down", "fa-html5", "fa-css3", "fa-anchor", "fa-unlock-alt", "fa-bullseye", "fa-ellipsis-h", "fa-ellipsis-v", "fa-rss-square", "fa-play-circle", "fa-ticket", "fa-minus-square", "fa-minus-square-o", "fa-level-up", "fa-level-down", "fa-check-square", "fa-pencil-square", "fa-external-link-square", "fa-share-square", "fa-compass", "fa-toggle-down", "fa-caret-square-o-down", "fa-toggle-up", "fa-caret-square-o-up", "fa-toggle-right", "fa-caret-square-o-right", "fa-euro", "fa-eur", "fa-gbp", "fa-dollar", "fa-usd", "fa-rupee", "fa-inr", "fa-cny", "fa-rmb", "fa-yen", "fa-jpy", "fa-ruble", "fa-rouble", "fa-rub", "fa-won", "fa-krw", "fa-bitcoin", "fa-btc", "fa-file", "fa-file-text", "fa-sort-alpha-asc", "fa-sort-alpha-desc", "fa-sort-amount-asc", "fa-sort-amount-desc", "fa-sort-numeric-asc", "fa-sort-numeric-desc", "fa-thumbs-up", "fa-thumbs-down", "fa-youtube-square", "fa-youtube", "fa-xing", "fa-xing-square", "fa-youtube-play", "fa-dropbox", "fa-stack-overflow", "fa-instagram", "fa-flickr", "fa-adn", "fa-bitbucket", "fa-bitbucket-square", "fa-tumblr", "fa-tumblr-square", "fa-long-arrow-down", "fa-long-arrow-up", "fa-long-arrow-left", "fa-long-arrow-right", "fa-apple", "fa-windows", "fa-android", "fa-linux", "fa-dribbble", "fa-skype", "fa-foursquare", "fa-trello", "fa-female", "fa-male", "fa-gittip", "fa-gratipay", "fa-sun-o", "fa-moon-o", "fa-archive", "fa-bug", "fa-vk", "fa-weibo", "fa-renren", "fa-pagelines", "fa-stack-exchange", "fa-arrow-circle-o-right", "fa-arrow-circle-o-left", "fa-toggle-left", "fa-caret-square-o-left", "fa-dot-circle-o", "fa-wheelchair", "fa-vimeo-square", "fa-turkish-lira", "fa-try", "fa-plus-square-o", "fa-space-shuttle", "fa-slack", "fa-envelope-square", "fa-wordpress", "fa-openid", "fa-institution", "fa-bank", "fa-university", "fa-mortar-board", "fa-graduation-cap", "fa-yahoo", "fa-google", "fa-reddit", "fa-reddit-square", "fa-stumbleupon-circle", "fa-stumbleupon", "fa-delicious", "fa-digg", "fa-pied-piper", "fa-pied-piper-alt", "fa-drupal", "fa-joomla", "fa-language", "fa-fax", "fa-building", "fa-child", "fa-paw", "fa-spoon", "fa-cube", "fa-cubes", "fa-behance", "fa-behance-square", "fa-steam", "fa-steam-square", "fa-recycle", "fa-automobile", "fa-car", "fa-cab", "fa-taxi", "fa-tree", "fa-spotify", "fa-deviantart", "fa-soundcloud", "fa-database", "fa-file-pdf-o", "fa-file-word-o", "fa-file-excel-o", "fa-file-powerpoint-o", "fa-file-photo-o", "fa-file-picture-o", "fa-file-image-o", "fa-file-zip-o", "fa-file-archive-o", "fa-file-sound-o", "fa-file-audio-o", "fa-file-movie-o", "fa-file-video-o", "fa-file-code-o", "fa-vine", "fa-codepen", "fa-jsfiddle", "fa-life-bouy", "fa-life-buoy", "fa-life-saver", "fa-support", "fa-life-ring", "fa-circle-o-notch", "fa-ra", "fa-rebel", "fa-ge", "fa-empire", "fa-git-square", "fa-git", "fa-y-combinator-square", "fa-yc-square", "fa-hacker-news", "fa-tencent-weibo", "fa-qq", "fa-wechat", "fa-weixin", "fa-send", "fa-paper-plane", "fa-send-o", "fa-paper-plane-o", "fa-history", "fa-circle-thin", "fa-header", "fa-paragraph", "fa-sliders", "fa-share-alt", "fa-share-alt-square", "fa-bomb", "fa-soccer-ball-o", "fa-futbol-o", "fa-tty", "fa-binoculars", "fa-plug", "fa-slideshare", "fa-twitch", "fa-yelp", "fa-newspaper-o", "fa-wifi", "fa-calculator", "fa-paypal", "fa-google-wallet", "fa-cc-visa", "fa-cc-mastercard", "fa-cc-discover", "fa-cc-amex", "fa-cc-paypal", "fa-cc-stripe", "fa-bell-slash", "fa-bell-slash-o", "fa-trash", "fa-copyright", "fa-at", "fa-eyedropper", "fa-paint-brush", "fa-birthday-cake", "fa-area-chart", "fa-pie-chart", "fa-line-chart", "fa-lastfm", "fa-lastfm-square", "fa-toggle-off", "fa-toggle-on", "fa-bicycle", "fa-bus", "fa-ioxhost", "fa-angellist", "fa-cc", "fa-shekel", "fa-sheqel", "fa-ils", "fa-meanpath", "fa-buysellads", "fa-connectdevelop", "fa-dashcube", "fa-forumbee", "fa-leanpub", "fa-sellsy", "fa-shirtsinbulk", "fa-simplybuilt", "fa-skyatlas", "fa-cart-plus", "fa-cart-arrow-down", "fa-diamond", "fa-ship", "fa-user-secret", "fa-motorcycle", "fa-street-view", "fa-heartbeat", "fa-venus", "fa-mars", "fa-mercury", "fa-intersex", "fa-transgender", "fa-transgender-alt", "fa-venus-double", "fa-mars-double", "fa-venus-mars", "fa-mars-stroke", "fa-mars-stroke-v", "fa-mars-stroke-h", "fa-neuter", "fa-genderless", "fa-facebook-official", "fa-pinterest-p", "fa-whatsapp", "fa-server", "fa-user-plus", "fa-user-times", "fa-hotel", "fa-bed", "fa-viacoin", "fa-train", "fa-subway", "fa-medium", "fa-yc", "fa-y-combinator", "fa-optin-monster", "fa-opencart", "fa-expeditedssl", "fa-battery-4", "fa-battery-full", "fa-battery-3", "fa-battery-three-quarters", "fa-battery-2", "fa-battery-half", "fa-battery-1", "fa-battery-quarter", "fa-battery-0", "fa-battery-empty", "fa-mouse-pointer", "fa-i-cursor", "fa-object-group", "fa-object-ungroup", "fa-sticky-note", "fa-sticky-note-o", "fa-cc-jcb", "fa-cc-diners-club", "fa-clone", "fa-balance-scale", "fa-hourglass-o", "fa-hourglass-1", "fa-hourglass-start", "fa-hourglass-2", "fa-hourglass-half", "fa-hourglass-3", "fa-hourglass-end", "fa-hourglass", "fa-hand-grab-o", "fa-hand-rock-o", "fa-hand-stop-o", "fa-hand-paper-o", "fa-hand-scissors-o", "fa-hand-lizard-o", "fa-hand-spock-o", "fa-hand-pointer-o", "fa-hand-peace-o", "fa-trademark", "fa-registered", "fa-creative-commons", "fa-gg", "fa-gg-circle", "fa-tripadvisor", "fa-odnoklassniki", "fa-odnoklassniki-square", "fa-get-pocket", "fa-wikipedia-w", "fa-safari", "fa-chrome", "fa-firefox", "fa-opera", "fa-internet-explorer", "fa-tv", "fa-television", "fa-contao", "fa-500px", "fa-amazon", "fa-calendar-plus-o", "fa-calendar-minus-o", "fa-calendar-times-o", "fa-calendar-check-o", "fa-industry", "fa-map-pin", "fa-map-signs", "fa-map-o", "fa-map", "fa-commenting", "fa-commenting-o", "fa-houzz", "fa-vimeo", "fa-black-tie", "fa-fonticons", "fa-reddit-alien", "fa-edge", "fa-credit-card-alt", "fa-codiepie", "fa-modx", "fa-fort-awesome", "fa-usb", "fa-product-hunt", "fa-mixcloud", "fa-scribd", "fa-pause-circle", "fa-pause-circle-o", "fa-stop-circle", "fa-stop-circle-o", "fa-shopping-bag", "fa-shopping-basket", "fa-hashtag", "fa-bluetooth", "fa-bluetooth-b", "fa-percent", "fa-gitlab", "fa-wpbeginner", "fa-wpforms", "fa-envira", "fa-universal-access", "fa-wheelchair-alt", "fa-question-circle-o", "fa-blind", "fa-audio-description", "fa-volume-control-phone", "fa-braille", "fa-assistive-listening-systems", "fa-asl-interpreting", "fa-american-sign-language-interpreting", "fa-deafness", "fa-hard-of-hearing", "fa-deaf", "fa-glide", "fa-glide-g", "fa-signing", "fa-sign-language", "fa-low-vision", "fa-viadeo", "fa-viadeo-square", "fa-snapchat", "fa-snapchat-ghost", "fa-snapchat-square", "flaticon-font3-bridge", "flaticon-font3-carousel", "flaticon-font3-chinese-pagoda", "flaticon-font3-circus-lion", "flaticon-font3-clown", "flaticon-font3-forest", "flaticon-font3-green-park-city-space", "flaticon-font3-hohenzollern-bridge", "flaticon-font3-island-with-a-palm-tree", "flaticon-font3-oriental-temple", "flaticon-font3-sand-bucket-and-shovel", "flaticon-font2-beer", "flaticon-font2-candles", "flaticon-font2-confetti", "flaticon-font2-cutlery", "flaticon-font2-food", "flaticon-font2-sandwich", "flaticon-font2-shirt", "flaticon-font2-sparkler", "flaticon-font-backpack", "flaticon-font-briefcase", "flaticon-font-car", "flaticon-font-food", "flaticon-font-jeep", "flaticon-font-tourist", "flaticon-buffet1-burger18", "flaticon-icons-bathroom31", "flaticon-icons-claw1", "flaticon-icons-flowers12", "flaticon-icons-fried6", "flaticon-icons-person204", "flaticon-icons-poker4", "flaticon-icons-restaurant26", "flaticon-icons-spa10", "flaticon-icons-swimming24", "flaticon-icons-terrace", "flaticon-icons-wellness", "flaticon-dep-1-slipper", "flaticon-flaticon-lingerie", "flaticon-myicons-bathroom22", "flaticon-myicons-bathroom27", "flaticon-myicons-cleaning2", "flaticon-myicons-clothing275", "flaticon-myicons-connection30", "flaticon-myicons-deposit", "flaticon-myicons-floor", "flaticon-myicons-hairsalon41", "flaticon-myicons-light76", "flaticon-myicons-picnic7", "flaticon-myicons-satellitedish", "flaticon-myicons-shower7", "flaticon-myicons-summer5", "flaticon-myicons-toilet16", "flaticon-myicons-towel", "flaticon-myicons-wakeup1"]
    };
    var st_timezone = {
        "timezone_string": ""
    };
    var st_demo_css = {
        "color": "\r\n\r\n.map_type .st-map-type{\r\nbackground-color: __main_color__;\r\n}\r\n#gmap-control{\r\nbackground-color: __main_color__;\r\n}\r\n.gmapzoomminus , .gmapzoomplus{\r\nbackground-color: __main_color__;\r\n}\r\n\r\n.sort_icon .active,\r\n.woocommerce-ordering .sort_icon a.active{\r\ncolor:__main_color__;\r\ncursor: default;\r\n}\r\n.package-info-wrapper .icon-group i:not(\".fa-star\"):not(\".fa-star-o\"){\r\n   color:__main_color__;\r\n}\r\na,\r\na:hover,\r\n.list-category > li > a:hover,\r\n.pagination > li > a,\r\n.top-user-area .top-user-area-list > li > a:hover,\r\n.sidebar-widget.widget_archive ul> li > a:hover,\r\n.sidebar-widget.widget_categories ul> li > a:hover,\r\n.comment-form .add_rating,\r\n.booking-item-reviews > li .booking-item-review-content .booking-item-review-expand span,\r\n.form-group.form-group-focus .input-icon.input-icon-hightlight,\r\n.booking-item-payment .booking-item-rating-stars .fa-star,\r\n.booking-item-raiting-summary-list > li .booking-item-rating-stars,\r\n.woocommerce .woocommerce-breadcrumb .last,\r\n.product-categories li.current-cat:before,\r\n.product-categories li.current-cat-parent:before,\r\n.product-categories li.current-cat>a,\r\n.product-categories li.current-cat>span,\r\n.woocommerce .star-rating span:before,\r\n.woocommerce ul.products li.product .price,\r\n.woocommerce .woocommerce_paging a,\r\n.woocommerce .product_list_widget ins .amount,\r\n#location_header_static i,\r\n.booking-item-reviews > li .booking-item-rating-stars,\r\n.booking-item-payment .booking-item-rating-stars .fa-star-half-o,\r\n#top_toolbar .top_bar_social:hover,\r\n.woocommerce .woocommerce-message:before,.woocommerce .woocommerce-info:before,\r\n.vc_tta-color-grey.vc_tta-style-classic .vc_tta-tab > a,\r\n.booking-item-rating .booking-item-rating-stars ,\r\nbody .box-icon-border.box-icon-white:hover,body  [class^=\"box-icon-border\"].box-icon-white:hover,body  [class*=\" box-icon-border\"].box-icon-white:hover,body  .box-icon-border.box-icon-to-white:hover:hover,body  [class^=\"box-icon-border\"].box-icon-to-white:hover:hover,body  [class*=\" box-icon-border\"].box-icon-to-white:hover:hover,\r\n#main-footer .text-color,\r\n.change_same_location:focus,\r\nul.slimmenu.slimmenu-collapsed li ul li a,\r\nul.slimmenu.collapsed li ul li a,\r\n.st_category_header h4,.st_tour_box_styleul a.text-darken:hover,\r\n.st_accordion.st_tour_ver .panel-default > .panel-heading,\r\n.st_social.style2 >a:hover,\r\n.color-main,.main-color\r\n{\r\ncolor:__main_color__}\r\nbody .st_tour_grid .text-color,body .color-text,\r\nbody .st_tour_grid .text-color-hover:hover,body .st_tour_grid .color-text-hover:hover,body .st_tour_grid .text-darken.text-color-hover:hover,body .st_tour_grid .text-darken.color-text-hover:hover,\r\nbody .st_tour_list .text-color,body .color-text,\r\nbody .st_tour_list .text-color-hover:hover,body .st_tour_list .color-text-hover:hover,body .st_tour_list .text-darken.text-color-hover:hover,body .st_tour_list .text-darken.color-text-hover:hover\r\n{\r\n    color:__main_color__}\r\n::selection {\r\nbackground: __main_color__;\r\ncolor: #fff;\r\n}\r\n.share ul li a:hover{\r\ncolor:__main_color__!important;\r\n}\r\n\r\n    .calendar-content.fc-unthemed .btn.btn-available_allow_fist:hover::before{\r\n    border-color: __main_color__ #ccc #ccc __main_color__;\r\n    }\r\n    .calendar-content.fc-unthemed .btn.btn-available_allow_last:hover::before {\r\n    border-color: #ccc __main_color__ __main_color__ #ccc;\r\n\r\n    }\r\n\r\nheader#main-header,\r\n.btn-primary,\r\n.post .post-header,\r\n.top-user-area .top-user-area-list > li.top-user-area-avatar > a:hover > img,\r\n\r\n.booking-item:hover, .booking-item.active,\r\n.booking-item-dates-change:hover,\r\n.btn-group-select-num >.btn.active, .btn-group-select-num >.btn.active:hover,\r\n.btn-primary:hover,\r\n.booking-item-features > li:hover > i,\r\n.form-control:active,\r\n.form-control:focus,\r\n.fotorama__thumb-border,\r\n.sticky-wrapper.is-sticky .main_menu_wrap,\r\n.woocommerce form .form-row.woocommerce-validated .select2-container, \r\n.woocommerce form .form-row.woocommerce-validated input.input-text, \r\n.woocommerce form .form-row.woocommerce-validated select,\r\n.btn-primary:focus\r\n{\r\nborder-color:__main_color__;\r\n}\r\n#menu1 {\r\n  border-bottom: 2px solid __main_color__;\r\n}\r\n.woocommerce .woocommerce-message,.woocommerce .woocommerce-info {\r\n  border-top-color:  __main_color__;\r\n}\r\n.main-bgr,.bgr-main,\r\n.main-bgr-hover:hover,.bgr-main-hover:hover,\r\n.pagination > li > a.current, .pagination > li > a.current:hover,\r\n.btn-primary,\r\nul.slimmenu li.active > a, ul.slimmenu li:hover > a,\r\n.nav-drop > .nav-drop-menu > li > a:hover,\r\n.btn-group-select-num >.btn.active, .btn-group-select-num >.btn.active:hover,\r\n.btn-primary:hover,\r\n.pagination > li.active > a, .pagination > li.active > a:hover,\r\n.box-icon, [class^=\"box-icon-\"], [class*=\" box-icon-\"]:not(.box-icon-white):not(.box-icon-border-dashed):not(.box-icon-border),\r\n.booking-item-raiting-list > li > div.booking-item-raiting-list-bar > div, .booking-item-raiting-summary-list > li > div.booking-item-raiting-list-bar > div,\r\n.irs-bar,\r\n.nav-pills > li.active > a,\r\n.search-tabs-bg > .tabbable > .nav-tabs > li.active > a,\r\n.search-tabs-bg > .tabbable > .nav-tabs > li > a:hover > .fa,\r\n.irs-slider,\r\n.post-link,\r\n.hover-img .hover-title, .hover-img [class^=\"hover-title-\"], .hover-img [class*=\" hover-title-\"],\r\n.post-link:hover,\r\n#gotop:hover,\r\n.shop-widget-title,\r\n.woocommerce ul.products li.product .add_to_cart_button,\r\n.woocommerce .widget_price_filter .ui-slider .ui-slider-handle,\r\n.woocommerce .widget_price_filter .price_slider_wrapper .ui-widget-content,\r\n.woocommerce .widget_price_filter .ui-slider .ui-slider-range,\r\n.sidebar_section_title,\r\n.shop_reset_filter:hover,\r\n.woocommerce .woocommerce_paging a:hover,\r\n.pagination .page-numbers.current,\r\n.pagination .page-numbers.current:hover,\r\n.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,\r\n.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover,\r\n.chosen-container .chosen-results li.highlighted,\r\n#taSignIn,\r\n.grid_hotel_room .grid , \r\n.grid_hotel_room .grid figure,\r\nfigure.effect-layla,\r\n.st-page-sidebar-new .page-sidebar-menu .sub-menu.item .active > a,.st-page-sidebar-new .page-sidebar-menu > li.active > a,\r\n.single-location .search-tabs-bg .tabbable .nav-tabs > li.active a  ,\r\n.single-location .search-tabs-bg .tabbable .nav-tabs > li:hover a ,\r\n.single-location .search-tabs-bg .tabbable .nav-tabs > li a:hover,\r\nul.slimmenu.collapsed li .sub-toggle,\r\nul.slimmenu.collapsed li ul li a:hover,\r\n.end2,.end1,\r\nbody #gotop.go_top_tour_box,\r\n.st_tab.st_tour_ver .nav-tabs>li.active>a,.st_tab.st_tour_ver .nav-tabs>li.active::before,\r\n.st_accordion.st_tour_ver>.panel>.panel-heading>.panel-title>a[aria-expanded=true],\r\n.st_social.style1 >a:hover,\r\n.st_list_partner_nav .fa:hover,\r\n.st_tour_grid .fotorama__arr,.st_tour_grid .fotorama__video-close,.st_tour_grid .fotorama__fullscreen-icon,\r\n.st_tour_list .fotorama__arr,.st_tour_list .fotorama__video-close,.st_tour_list .fotorama__fullscreen-icon,\r\n.st_tour_ver .div_review_half\r\n{\r\n    background:__main_color__ ;\r\n    border-color: __main_color__;\r\n}\r\n\r\n    .vc_tta-color-grey.vc_tta-style-classic .vc_tta-tab > a {\r\n    color: __main_color__ !important;\r\n    }\r\n.calendar-content .fc-state-default,.calendar-content.fc-unthemed .btn.btn-available:hover , .calendar-content.fc-unthemed .st-active .btn.btn-available, .calendar-content.fc-unthemed .btn.btn-available.selected,\r\n.calendar-content.fc-unthemed .btn.btn-available:not(.next_month) {\r\n  background-color:__main_color__ !important;\r\n}\r\n.calendar-content.fc-unthemed .btn.btn-available:hover ,.datepicker table tr td.active:hover, .datepicker table tr td.active:hover:hover, .datepicker table tr td.active.disabled:hover, .datepicker table tr td.active.disabled:hover:hover, .datepicker table tr td.active:focus, .datepicker table tr td.active:hover:focus, .datepicker table tr td.active.disabled:focus, .datepicker table tr td.active.disabled:hover:focus, .datepicker table tr td.active:active, .datepicker table tr td.active:hover:active, .datepicker table tr td.active.disabled:active, .datepicker table tr td.active.disabled:hover:active, .datepicker table tr td.active.active, .datepicker table tr td.active:hover.active, .datepicker table tr td.active.disabled.active, .datepicker table tr td.active.disabled:hover.active, .open .dropdown-toggle.datepicker table tr td.active, .open .dropdown-toggle.datepicker table tr td.active:hover, .open .dropdown-toggle.datepicker table tr td.active.disabled, .open .dropdown-toggle.datepicker table tr td.active.disabled:hover,\r\n.calendar-content.fc-unthemed .st-active button.next_month,\r\n.calendar-content.fc-unthemed .btn.btn-available:not(.next_month)\r\n{\r\nbackground-color:__main_color__ !important;\r\nborder-color: __main_color__;\r\n}\r\n\r\n.datepicker table tr td.today:before, .datepicker table tr td.today:hover:before, .datepicker table tr td.today.disabled:before, .datepicker table tr td.today.disabled:hover:before{\r\nborder-bottom-color: __main_color__;\r\n}\r\n.booking-item-reviews > li .booking-item-review-person-avatar:hover\r\n{\r\n-webkit-box-shadow: 0 0 0 2px __main_color__;\r\nbox-shadow: 0 0 0 2px __main_color__;\r\n}\r\n#main-header ul.slimmenu li.current-menu-item > a, #main-header ul.slimmenu li:hover > a,\r\n#main-header .menu .current-menu-ancestor >a,\r\n#main-header .product-info-hide .product-btn:hover\r\n{\r\nbackground:__main_color__;\r\ncolor:white;\r\n}\r\n\r\n#main-header .menu .current-menu-item > a\r\n{\r\nbackground:__main_color__ !important;\r\ncolor:white !important;\r\n}\r\n\r\n\r\n.i-check.checked, .i-radio.checked\r\n{\r\n\r\nborder-color: __main_color__;\r\nbackground: __main_color__;\r\n}\r\n\r\n.box-icon-border, [class^=\"box-icon-border\"], [class*=\" box-icon-border\"]{\r\n    border-color: __main_color__;\r\n    color: __main_color__;\r\n}\r\n.box-icon-border:hover, [class^=\"box-icon-border\"]:hover, [class*=\" box-icon-border\"]:hover{\r\nbackground-color:__main_color__;\r\n}\r\n.border-main, .i-check.hover, .i-radio.hover,.st_list_partner_nav .fa\r\n{\r\nborder-color: __main_color__;\r\n}\r\n.owl-controls .owl-buttons div:hover\r\n{\r\n    background: __main_color__;\r\n    -webkit-box-shadow: 0 0 0 1px __main_color__;\r\n    box-shadow: 0 0 0 1px __main_color__;\r\n}\r\n.irs-diapason{\r\nbackground: __main_color__;\r\n}\r\nul.slimmenu.slimmenu-collapsed li .slimmenu-sub-collapser {\r\n background:__main_color__}    .calendar-content .fc-toolbar{\r\n    background-color: __main_color__;\r\n    margin: 0;\r\n    }\r\n    .calendar-content.fc-unthemed .fc-basic-view .fc-head {\r\n    color: __main_color__;\r\n    }\r\n\r\n    .booking-item-rating .fa ,\r\n    .booking-item.booking-item-small .booking-item-rating-stars,\r\n    .comment-form .add_rating,\r\n    .booking-item-payment .booking-item-rating-stars .fa-star,\r\n    .st-item-rating .fa,\r\n    li  .fa-star , li  .fa-star-o , li  .fa-star-half-o{\r\n    color:__main_color__    }\r\n.feature_class{\r\nbackground: #19A1E5;\r\n}\r\n.feature_class::before {\r\nborder-color: #19A1E5 #19A1E5 transparent transparent;\r\n}\r\n.feature_class::after {\r\nborder-color: #19A1E5 transparent #19A1E5 #19A1E5;\r\n}\r\n.featured_single .feature_class::before{\r\nborder-color: transparent #19A1E5 transparent transparent;\r\n}\r\n.item-nearby .st_featured::before {\r\n    border-color: transparent transparent #19A1E5 #19A1E5;\r\n}\r\n.item-nearby .st_featured::after {\r\n   border-color: #19A1E5 #19A1E5 #19A1E5 transparent  ;\r\n}\r\n.st_sale_class{\r\nbackground-color: #cc0033;\r\n}\r\n.st_sale_simple::after,.st_sale_simple::before,.st_sale_label_1::before{\r\nborder-color: #cc0033 transparent transparent #cc0033 ;\r\n}\r\n.st_sale_class.st_sale_paper * {color: #cc0033 }\r\n.st_sale_class .st_star_label_sale_div::after{\r\n    border-color: #cc0033}\r\n"
    };
    /* ]]> */
</script>

<script type="text/javascript" src="{{ asset('/assets/admin/js/jquery.min.js') }}"></script>

<!----------timer js-------->
<script type="text/javascript" src="{{ asset('/assets/js/heystranger-js/flipclock.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/js/heystranger-js/popup-timer.js') }}"></script>

<script type="text/javascript" src="{{ asset('/assets/js/bootstrap.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/js/sticky.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/js/icheck.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/js/jquery.slimmenu.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/js/handlebars-v2.0.0.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/js/typeahead.js') }}"></script>

<!----------date and timpicker-------->
<script type="text/javascript" src="{{ asset('/assets/js/bootstrap-datepicker.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/js/bootstrap-timepicker.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/js/custom.js') }}"></script>
<!--======================loader js include here=========================-->
<script src="{{ asset('/assets/js/heystranger-js/jquery.loading.block.js') }}"></script>
<script src="{{ asset('/assets/js/heystranger-js/loader.function.js') }}"></script>

<style>

    .bg-blacken, .bg-blackrw {
        background: rgba(0, 0, 0, 0.6) none repeat scroll 0 0;
        height: 100%;
        left: 0;
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 9999;display:none;
    }

    .bg-blacken.active {
        display:block;
    }
    .bg-blackrw.active {
        display:block;
    }

    .welcome-pop-up {
        background-color: #ffffff;
        background-image: url("/assets/images/logo-white.png");
        background-repeat: no-repeat;
        box-shadow: 0 0 124px #492422;
        display: table-cell;
        font-size: 30px;
        height: 480px;
        left: 50%;
        margin-left: -317px;
        margin-top: -240px;
        padding: 185px 50px 0;
        position: fixed;
        text-align: center;
        top: 50%;
        vertical-align: middle;
        width: 634px;
        z-index: 99;
        border-radius: 4px;
    }
    .welcome-pop-up > h3 sup {
        font-size: 30px;
        text-transform: capitalize;
        vertical-align: top;
    }
    .close-pop {
        color: #ffffff;
        cursor: pointer;
        font-size: 16px;
        padding: 15px;
        position: absolute;
        right: 0;
        top: 0;
    }
    .welcome-pop-up + .bg-blacken.active {
        z-index: 9;
    }
    .welcome-pop-up > h3 {
        color: #ad1c21;
        font-family: roboto;
        font-size: 35px;
        font-weight: 600;
        margin-bottom: 24px;
        margin-top: 16px;
        text-align: center;
        text-transform: capitalize;
    }
    .welcome-pop-up > span {
        border-bottom: 1px solid #dddddd;
        color: #8f8f8f;
        display: block;
        font-family: roboto;
        font-size: 19px;
        line-height: 39px;
        margin-bottom: 0;
        text-align: center;
    }
</style>
@yield('jscript')