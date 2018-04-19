<!DOCTYPE html>
<html>
<head>
	<title>Laravel infinite scroll pagination</title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  	<style type="text/css">
  		.ajax-load{
  			background: #e1e1e1;
		    padding: 10px 0px;
		    width: 100%;
  		}
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
        width: 120%;
        position: absolute;
        }
  	</style>
</head>
<body>

<div class="container">
	<h2 class="text-center">Laravel infinite scroll pagination</h2>
	<br/>
	<div class="col-md-12" id="post-data">
	<table id="ActivationTable" class="table table-striped table-responsive">
		<thead>
            <tr>
                <th >Number</th>
                <th >Title</th>
                <th >Field</th>
            </tr>
        </thead>
        <tbody id = "bodyscroll"> 
					      
    		@include('links.data')
		</tbody>
		
        </table>   
		<div class="ajax-load text-center" style="display:none">
			<p><img src="http://demo.itsolutionstuff.com/plugin/loader.gif">Loading More post</p>
		</div>
		
		<input type = "hidden" id="pagetotal" value ={!! $links->lastPage(); !!}> 
	</div>
</div>



<script type="text/javascript">
	var page = 1;
	$('#bodyscroll').on('scroll', function() {
		//window.alert('top');
		//window.alert($('#bodyscroll').scrollTop());
		//window.alert('height');
		//window.alert($('#bodyscroll').height());
		if($('#bodyscroll').scrollTop() >= $('#bodyscroll').height()) {
			
			page++;
			//window.alert($('#pagetotal').val());
			if($('#pagetotal').val() >= page){
				//window.alert('enter');
				loadMoreData(page);
			}
	        
	    }
		//window.alert($('#bodyscroll').scrollTop());
		//window.alert($('#bodyscroll').height());
	});
	$(window).scroll(function() {
		
	    if($(window).scrollTop() + $(window).height() >= $(document).height()) {
	        page++;
	        loadMoreData(page);
	    }
	});

	function loadMoreData(page){
	  $.ajax(
	        {
	            url: '?page=' + page,
	            type: "get",
	            beforeSend: function()
	            {
					//$("#ActivationTable").append($('.ajax-load').show());
	                $('.ajax-load').show();
	            }
	        })
	        .done(function(data)
	        {
				//window.alert(data);
	            if(data.html == " "){
	                $('.ajax-load').html("No more records found");
	                return;
	            }
				$('.ajax-load').hide();
				//window.alert(data.html);
				$("#bodyscroll").append(data.html);
				//$('#ActivationTable > tbody:last-child').append(data.html);
	        })
	        .fail(function(jqXHR, ajaxOptions, thrownError)
	        {
	              //alert('server not responding...');
	        });
	}
</script>

</body>
</html>