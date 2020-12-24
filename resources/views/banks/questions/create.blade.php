@extends('layouts.template')


@section('content')

<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-home icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>BANCO
                <div class="page-title-subheading">Registrar Banco
                </div>
            </div>
        </div>
            <div class="page-title-actions">
                <div class="d-inline-block dropdown">
                <a href="{{route('banks.list',$course->id)}}"  class="btn-shadow btn btn-info">
                <span class="btn-icon-wrapper pr-1 opacity-8">
                    <i class="fa fa-plus"></i>
                </span>
                        Regresar
                    </a>
                </div>
            </div>
    </div>
</div>

    @include('layouts.message')
        <form action="{{ route('banks.store',$bank->id) }}"
                method="POST" id="formbanks" class="form-horizontal">

        @include('banks.questions.partials.forms')
        </form>

@endsection
@section('js')

    <script>
        $(document).ready(function () {

            $('.selection-input').select2({
                theme: 'bootstrap4',
            });
            $('#formBanks').submit(function()
            {
                $('.btnSubmitCourse').prop('disabled',true);
                $('.btnSubmitCourse').html('<p><i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only"></span> Registrando...</p>');
            });
        });
    </script>
    <script>
    $('#adding').click(function(){

        $('#adding').attr('disabled', true);
        let count = 1;
        dynamic_field(count);
        function dynamic_field(number)
        {
        html = '<tr>';

            html += '<td><input type="text" name="title2[]" value="{{ old('title', $bank->title) }}" placeholder="Ingrese una opcion"class="form-control" /></td>';
            html += '<td><input type="hidden" name="parent_id"  value="{{$bank->id}}"></td>';
            html += '<td><input type="hidden" name="course_id" class="form-control" value="{{$course->id}}"></td>';
            html += '<td><label class="btn btn-success active"><input type="checkbox" name="is_correct[]"  value="1" {{ old('is_correct', $bank->is_correct) == '1' ? 'checked' : '' }} autocomplete="off" checked><span class="glyphicon glyphicon-ok"></span></label></td>';

            if(number > 1 )
            {

                html += '<td><button type="button" name="remove" id="" class="btn btn-danger remove"><span class="btn-icon-wrapper pr-1 opacity-8"><i class="fa fa-minus"></i></span>Remover</button></td></tr>';
                $('#pocos').append(html);
                //$('tbody').append(html);
            }
            else
            {

                html += '<td><button type="button" name="add" id="add" class="btn btn-success"><span class="btn-icon-wrapper pr-1 opacity-8"><i class="fa fa-plus"></i></span>Añadir Opciones</button></td></tr>';

                $('#pocos').html(html);
                //$('tbody').html(html);
            }
        }

        $(document).on('click', '#add', function(){

        count++;

        dynamic_field(count);
        if(count >=2){
            $('#save').attr('disabled', false);

        }
        if(count >=8){
            $('#add').attr('disabled', true);

        }
        });



        $(document).on('click', '.remove', function(){
        count--;
        $(this).closest("tr").remove();
        if(count <=2){
            $('#save').attr('disabled', true);

        }
        if(count <8){
            $('#add').attr('disabled', false);

        }
        });

        $('#formBanks').on('submit', function(event){
            event.preventDefault();
            $.ajax({
                url:'{{ route("banks.store",$bank->id) }}',
                method:'POST',
                data:$(this).serialize(),
                dataType:'json',
                beforeSend:function(){
                    $('#save').attr('disabled','disabled');
                },
                success:function(data)
                {
                    if(data.error)
                    {
                        var error_html = '';
                        for(var count = 0; count < data.error.length; count++)
                        {
                            error_html += '<p>'+data.error[count]+'</p>';
                        }
                        $('#result').html('<div class="alert alert-danger">'+error_html+'</div>');
                    }
                    else
                    {
                        dynamic_field(1);
                        $('#result').html('<div class="alert alert-success">'+data.success+'</div>');
                    }
                    $('#save').attr('disabled', false);
                    $('#adding').attr('disabled', false);
                }
            })
        });

        });
        </script>



@endsection
