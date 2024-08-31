$(document).ready(function(){
    $('#resultado').hide();
    fetchTasks();
    let edit = false;

//buscar
    $('#search').keyup(function(e){
        let search = $('#search').val();
        $.ajax({
            url: 'task-search.php',
            type: 'POST',
            data: { search },
            success: function(response){
                let libros = JSON.parse(response);
                let template='';

                libros.forEach(libro => {
                    template += `<li>${libro.Nombre}</li>`
                });
                $('#container').html(template);
                $('#resultado').show();
            }
        })
    })
  
//insertar
    $('#task-form').submit(function(e){
        const postData = {
            id_libro : $('#id_libro').val(),
            ID_Categoria: $('#ID_Categoria').val(),
            Nombre: $('#Nombre').val(),
            Autor: $('#Autor').val(),
            Año: $('#Año').val()
        };

        let url = edit === false ? 'task-add.php':'task-edit.php';

        $.post(url, postData, function(response){
            console.log(response);
            fetchTasks();
            $('#task-form').trigger('reset');
        });
        e.preventDefault();
    });

//listar en la tabla
    function fetchTasks(){     
        $.ajax({
            url: 'task-list.php',
            type: 'GET',
            success: function(response){
                let libros = JSON.parse(response);
                let template = '';
                libros.forEach(libro => {
                    template += `
                        <tr Nombre="${libro.Nombre}">
                            <button type="hidden">${libro.id_libro}</button>
                            <td>${libro.ID_Categoria}</td>
                            <td><a href="#" class="libro-item">${libro.Nombre}</a></td>
                            <td>${libro.Autor}</td>
                            <td>${libro.Año}</td>
                            <td>
                                <button class="borrar btn btn-danger">
                                    Borrar
                                </button>
                            </td>
                        </tr>
           `
                });
                $('#libros').html(template);
            }
        });
    }

    //Eliminar
    $(document).on('click', '.borrar', function(){
        if(confirm('¿Estás seguro?')){
            let element = $(this)[0].parentElement.parentElement;
            let Nombre = $(element).attr('Nombre');
            $.post('task-delete.php', {Nombre}, function(response){
                console.log(response);
                fetchTasks();
            });
        }
    });

    //Editar
    $(document).on('click', '.libro-item', function(){
        let element = $(this)[0].parentElement.parentElement;
        let Nombre = $(element).attr('Nombre');
        $.post('task-single.php', {Nombre}, function(response){
            const libro = JSON.parse(response);
            $('#id_libro').val(libro.id_libro);
            $('#ID_Categoria').val(libro.ID_Categoria);
            $('#Nombre').val(libro.Nombre);
            $('#Autor').val(libro.Autor);
            $('#Año').val(libro.Año);
            edit=true;
        });
    });
});