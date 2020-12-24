const { ajax, ajaxSetup } = require("jquery");

$(document).ready(function(){    
    let urlID = getUrlID();    
    $('#videconference').click(function(){  
        $.ajax({
            type:"POST",
            url:"http://ruta", 
            data:{nombre:"pepe",edad:10},
            success:function(datos){ 
                 console.log(datos.promedio)
             },
        })
        var content = "<table class='table table-bordered'>"
        content += '<tr><td>Fecha</td><td>Plataforma</td><td>Codigo</td><td>Clave</td><td></td></tr>'
        content += "</table>";
        $('#modalBodyContent').html(content); 
        $('#exampleModal').modal('show');
    });
});


function getUrlID()
{
    jQuery.ajax
    var url = $(location).attr('href');
    var segments = url.split( '/' );
    var id = segments[6];
    return id;
}