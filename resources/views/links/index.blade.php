{{-- For more details see: http://laraget.com/blog/implementing-infinite-scroll-pagination-using-laravel-and-jscroll --}}
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>Laravel and jScroll - Infinite Scrolling</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css">
    <!--link rel="stylesheet" href="/css/lightbox.css"-->
    <link rel="stylesheet" href="/css/magnific.css">
    <style type="text/css">
    .white-popup-block {
        position: relative;
        background: #FFF;
        padding: 20px;
        width: auto;
        max-width: 500px;
        margin: 20px auto;
        }
</style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h1 class="page-header">Links COUNT  {{$links->total()}} </h1>
                <a class="popup-modal" href="#test-modal">Open modal</a>
                
                <div id="test-modal" class="white-popup-block mfp-hide">
                    <h1>Modal dialog</h1>
                    <p>You won't be able to dismiss this by usual means (escape or
                        click button), but you can close it programatically based on
                        user choices or actions.</p>
                    <p><a class="popup-modal-dismiss" href="#">Dismiss</a></p>
                </div>

                <a href="images/catalog/won.jpg" target="_blank">
                  ddd
                </a>
                <!-- link that opens popup -->
                <a class="popup-with-form" href="#test-form">Open form</a>
               
                <!-- form itself -->
                <form id="test-form" class="white-popup-block mfp-hide">
                    <h1>Form</h1>
                    <fieldset style="border:0;">
                        <p>Lightbox has an option to automatically focus on the first input. It's strongly recommended to use <code>inline</code> popup type for lightboxes with form instead of <code>ajax</code> (to keep entered data if the user accidentally refreshed the page).</p>
                        <ol>
                            <li>
                                <label for="name">Name</label>
                                <input id="name" name="name" type="text" placeholder="Name" required="">
                            </li>
                            <li>
                                <label for="email">Email</label>
                                <input id="email" name="email" type="email" placeholder="example@domain.com" required="">
                            </li>
                            <li>
                                <label for="phone">Phone</label>
                                <input id="phone" name="phone" type="tel" placeholder="Eg. +447500000000" required="">
                            </li>
                            <li>
                                <label for="textarea">Textarea</label><br>
                                <textarea id="textarea">Try to resize me to see how popup CSS-based resizing works.</textarea>
                            </li>
                        </ol>
                    </fieldset>
                </form>
               
               <ul>
               
               <div class="dz-preview dz-file-preview">
  
                @if (count($links) > 0)
                    <div class="infinite-scroll">
                        @foreach($links as $link)
                       
                            <div class="media">
                               
                                <div class="media-body">
                                   <li> <h4> {{ $link->id }}</h4> </li>
                                   <li> <h4 class="media-heading">{{ $link->title }}
                                        
                                    </h4> </li>
                                    <li> 
                                        <small>{{ $link->url }}</small>
                                    </li>
                                    <br>
                                    
                                </div>
                            </div>
                            <hr>
                        @endforeach
                        {{ $links->links() }}
                    </div>
                @endif
                </ul>
            </div>

            <div class="col-md-12 text-center">
                <small><a href="http://laraget.com" class="text-muted">Filip Zdravkovic - Laraget.com</a></small>
            </div>
        </div>
    </div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>                               
    <!--script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://rawgit.com/enyo/dropzone/master/dist/dropzone.js"></script>

   
    <script src="/js/jquery.jscroll.js"></script>
    <!--script src="/js/lightbox.js"></script-->
    <script src="/js/magnific.js"></script>
    {{-- MAKE SURE THAT YOU PUT THE CORRECT PATH FOR jquery.jscroll.min.js --}}
    
    <script type="text/javascript">
       
        $('ul.pagination').hide();
        $(function() {
            $( ".infinite-scroll" ).css( "border", "3px solid red" );
            $('.infinite-scroll').jscroll({
                
                autoTrigger: true,
                loadingHtml: '<img class="center-block" src="/images/loading1.png" alt="Loading..." />', // MAKE SURE THAT YOU PUT THE CORRECT IMG PATH
                padding: 0,
                nextSelector: '.pagination li.active + li a',
                contentSelector: 'div.infinite-scroll',
                callback: function() {
                    $('ul.pagination').remove();
                }
            });
        });
       
        $(function () {
            $('.popup-modal').magnificPopup({
                type: 'inline',
                preloader: false,
                focus: '#username',
                modal: true
            });
            $(document).on('click', '.popup-modal-dismiss', function (e) {
                e.preventDefault();
                $.magnificPopup.close();
            });
        });
        $(document).ready(function() {
            $('.popup-with-form').magnificPopup({
                type: 'inline',
                preloader: false,
                focus: '#name',

                // When elemened is focused, some mobile browsers in some cases zoom in
                // It looks not nice, so we disable it:
                callbacks: {
                    beforeOpen: function() {
                        if($(window).width() < 700) {
                            this.st.focus = false;
                        } else {
                            this.st.focus = '#name';
                        }
                    }
                }
            });
           
        });
    </script>

</body>
</html>
{{-- For more details see: http://laraget.com/blog/implementing-infinite-scroll-pagination-using-laravel-and-jscroll --}}