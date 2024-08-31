$(document).ready(function(){
    fetchTasks();
    let edit = false;
  
//insertar
    $('#task-form').submit(function(e){
        const postData = {
            ID_Categoria: $('#ID_Categoria').val(),
            categoria: $('#categoria').val(),
            descripcion : $('#descripcion').val(),
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
                libros.forEach(categoria => {
                    template += `
                        <tr categoria="${categoria.categoria}">
                            <td>${categoria.ID_Categoria}</td>
                            <td><a href="#" class="categoria-item">${categoria.categoria}</a></td>
                            <td>${categoria.descripcion}</td>
                            <td>
                                <button class="borrar btn btn-danger">
                                    Borrar
                                </button>
                            </td>
                        </tr>
           `
                });
                $('#categorias').html(template);
            }
        });
    }

    //Eliminar
    $(document).on('click', '.borrar', function(){
        if(confirm('¿Estás seguro?')){
            let element = $(this)[0].parentElement.parentElement;
            let categoria = $(element).attr('categoria');
            $.post('task-delete.php', {categoria}, function(response){
                console.log(response);
                fetchTasks();
            });
        }
    });

    //Editar
    $(document).on('click', '.categoria-item', function(){
        let element = $(this)[0].parentElement.parentElement;
        let categoria = $(element).attr('categoria');
        $.post('task-single.php', {categoria}, function(response){
            const categoria = JSON.parse(response);
            $('#ID_Categoria').val(categoria.ID_Categoria);
            $('#categoria').val(categoria.categoria);
            $('#descripcion').val(categoria.descripcion);
            edit=true;
        });
    });
});