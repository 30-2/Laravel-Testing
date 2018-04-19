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
    <style>
        tr {
        width: 100%;
        display: inline-table;
        table-layout: fixed;
        }
        table{
        height:300px; // <-- Select the height of the table
        display: -moz-groupbox; // Firefox Bad Effect
        }
        tbody{
        overflow-y: scroll; 
        height: 200px; // <-- Select the height of the body
        width: 100%;
        position: absolute;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h1 class="page-header">Links COUNT  {{$links->total()}} </h1>
              
               <ul>
               
                @if (count($links) > 0)
                    <div class="infinite-scroll">
                    <table id="ActivationTable" class="table table-striped table-responsive">
                    <thead>
                    <tr>
                        <th class="col-xs-1">Number</th>
                        <th class="col-xs-4">Title</th>
                        <th class="col-xs-2">Field</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($links as $link)
                       
                        <tr class="box" >
                        <td>{{$link->id}}</td>
                        <td>{{$link->title}}<td>
                        <td>{{$link->url}}</td>
                         </tr>
                        @endforeach
                    </tbody>
                    </table>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
   
    <script src="/js/jquery.jscroll.js"></script>
    {{-- MAKE SURE THAT YOU PUT THE CORRECT PATH FOR jquery.jscroll.min.js --}}
    
    <script type="text/javascript">
       
        $('ul.pagination').hide();
        $(function() {
            //$( ".infinite-scroll" ).css( "border", "3px solid red" );
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
    </script>

</body>
</html>
{{-- For more details see: http://laraget.com/blog/implementing-infinite-scroll-pagination-using-laravel-and-jscroll --}}