//////////////////////////room add more////////////////////////
            var room_temp = '<div class="form-group parentss">'+
            
            '<div class="col-md-2">'+
           '{!! Form::fancyselect('room_type[]', $room_type, null, ['class'=>'form-control required select-icons']) !!}</div>'+
           
            '<div class="col-md-2">'+
            '{!! Form::fancyselect('guest[]', $room_cap, null, ['class'=>'form-control required select-icons']) !!}'+
            '</div>'+
            
            '<div class="col-md-2">'+
            '{!! Form::text('room_avail[]', null, ['class' => 'form-control required', 'placeholder' => 'Room Available']) !!}'+
            '</div>'+
    
            '<div class="col-md-2">'+
            '{!! Form::text('room_price[]', null, ['class' => 'form-control required', 'placeholder' => 'Room Price']) !!}'+
            '</div>'+
    
            '<div class="col-md-2">'+
            '{!! Form::text('room_short_desc[]', null, ['class' => 'form-control required', 'placeholder' => 'Short Description']) !!}'+
            '</div>'+
            
            '<div class="col-md-2">'+
            '{{ Form::file('room_img[]', ['id' => 'room_img', 'class' => 'form-control file-styled', 'multiple' => false]) }}'+
            '</div>'+
            '<a href="javascript:void(0)" class="btn-remove label label-danger">Remove</a>'+
            '</div>';
    
        $(".btn-add-more").on('click', function(e){
            e.preventDefault();
            $(this).before(room_temp)
        });
        
        $(document).on('click','.btn-remove',function(e){    
                e.preventDefault();
                $(this).parents(".parentss").remove();
        });
        
        
        //////////////////////////venu add more////////////////////////
        var venu_temp = '<div class="form-group venu-parents">'+
                
            '<div class="col-md-2">'+
            '{!! Form::text('venu_name[]', null, ['class' => 'form-control required', 'placeholder' => 'Venu Name']) !!}'+
            '</div>'+    
            
            '<div class="col-md-2">'+
            '{!! Form::text('venu_avail[]', null, ['class' => 'form-control required', 'placeholder' => 'Capacity']) !!}'+
            '</div>'+
    
            '<div class="col-md-2">'+
            '{!! Form::text('venu_price[]', null, ['class' => 'form-control required', 'placeholder' => 'Venu Price']) !!}'+
            '</div>'+
    
            '<div class="col-md-2">'+
            '{!! Form::text('venu_short_desc[]', null, ['class' => 'form-control required', 'placeholder' => 'Venu Short Description']) !!}'+
            '</div>'+
            
            '<div class="col-md-2">'+
            '{{ Form::file('venu_img[]', ['class' => 'form-control file-styled', 'multiple' => false]) }}'+
            '</div>'+
            '<a href="javascript:void(0)" class="venu-remove label label-danger">Remove</a>'+
            '</div>';
    
        $(".venu-add-more").on('click', function(e){
            e.preventDefault();
            $(this).before(venu_temp)
        });
        
        $(document).on('click','.venu-remove',function(e){    
                e.preventDefault();
                $(this).parents(".venu-parents").remove();
        });
        
        //////////////////////////conference add more////////////////////////
        var confer_temp = '<div class="form-group confer-parents">'+
                
            '<div class="col-md-2">'+
            '{!! Form::text('confer_name[]', null, ['class' => 'form-control required', 'placeholder' => 'Conference Name']) !!}'+
            '</div>'+    
            
            '<div class="col-md-2">'+
            '{!! Form::text('confer_avail[]', null, ['class' => 'form-control required', 'placeholder' => 'Capacity']) !!}'+
            '</div>'+
    
            '<div class="col-md-2">'+
            '{!! Form::text('confer_price[]', null, ['class' => 'form-control required', 'placeholder' => 'Conference Price']) !!}'+
            '</div>'+
    
            '<div class="col-md-2">'+
            '{!! Form::text('confer_short_descr[]', null, ['class' => 'form-control required', 'placeholder' => 'Conference Short Description']) !!}'+
            '</div>'+
            
            '<div class="col-md-2">'+
            '{{ Form::file('confer_img[]', ['class' => 'form-control file-styled', 'multiple' => false]) }}'+
            '</div>'+
            '<a href="javascript:void(0)" class="confer-remove label label-danger">Remove</a>'+
            '</div>';
    
        $(".confer-add-more").on('click', function(e){
            e.preventDefault();
            $(this).before(confer_temp)
        });
        
        $(document).on('click','.confer-remove',function(e){    
                e.preventDefault();
                $(this).parents(".confer-parents").remove();
        });


        //////////////////////////attraction add more////////////////////////
        var attract_temp = '<div class="form-group attract-parents">'+
                
            '<div class="col-md-4">'+
            '{!! Form::text('attraction_name[]', (isset($edit_data) && !empty($edit_data) ? $edit_data->alternate_no : ''), ['class' => 'form-control required', 'placeholder' => 'Name of Attraction *']) !!}'+
            '</div>'+    
            
            '<div class="col-md-4">'+
            '{!! Form::fancyselect('surrounding[]', $surr, (isset($edit_data) && !empty($edit_data) ? @$edit_data->id : ''), ['class'=>'form-control select-icons required']) !!}'+
            '</div>'+
    
            '<div class="col-md-4">'+
            '{!! Form::text('approx_dist[]', (isset($edit_data) && !empty($edit_data) ? $edit_data->alternate_no : ''), ['class' => 'form-control required', 'placeholder' => 'Approximate Distance *']) !!}'+
            '</div>'+
            '<a href="javascript:void(0)" class="attract-remove label label-danger">Remove</a>'+
            '</div>';
    
        $(".attract-add-more").on('click', function(e){
            e.preventDefault();
            $(this).before(attract_temp)
        });
        
        $(document).on('click','.attract-remove',function(e){    
                e.preventDefault();
                $(this).parents(".attract-parents").remove();
        });
        
        //////////////////////////extra offer add more////////////////////////
        var extra_temp = '<div class="form-group extra-parents">'+
                
            '<div class="col-md-4">'+
            '{!! Form::text('extra_name[]', (isset($edit_data) && !empty($edit_data) ? $edit_data->alternate_no : ''), ['class' => 'form-control required', 'placeholder' => 'Name of Attraction *']) !!}'+
            '</div>'+    
            
            '<div class="col-md-4">'+
            '{!! Form::fancyselect('surrounding[]', $surr, (isset($edit_data) && !empty($edit_data) ? @$edit_data->id : ''), ['class'=>'form-control select-icons required']) !!}'+
            '</div>'+
    
            '<div class="col-md-4">'+
            '{!! Form::text('approx_dist[]', (isset($edit_data) && !empty($edit_data) ? $edit_data->alternate_no : ''), ['class' => 'form-control required', 'placeholder' => 'Approximate Distance *']) !!}'+
            '</div>'+
            '<a href="javascript:void(0)" class="extra-remove label label-danger">Remove</a>'+
            '</div>';
    
        $(".extra-add-more").on('click', function(e){
            e.preventDefault();
            $(this).before(extra_temp)
        });
        
        $(document).on('click','.extra-remove',function(e){    
                e.preventDefault();
                $(this).parents(".extra-parents").remove();
        });
        
    
    $(document).ready(function () {
        
        $('#cv').css("display", "none");

        var befco = $('#condit').val();

        if (befco == 'Yes')
        {
            $('.both').css("display", "block");
        } else
        {
            $('.both').css("display", "none");
        }


        $('#condit').change(function ()
        {
            var co = $('#condit').val();

            if (co == 'Yes')
            {
                $('#cv').css("display", "block");
                $('.both').css("display", "block");
            } else
            {
                $('#cv').css("display", "none");
                $('.both').css("display", "none");

            }


        });
        
        var bm = $('#vid_con').val();

        if (bm == 'Yes')
        {
            $('#viddiv').css("display", "block");
        }

        $('#vid_con').change(function ()
        {
            var conn2 = $('#vid_con').val();

            if (conn2 == 'Yes')
            {
                $('#viddiv').css("display", "block");
            } else
            {
                $('#vidtext').val('');

                $('#viddiv').css("display", "none");
            }


        });
    });