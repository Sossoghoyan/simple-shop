jQuery(document).ready(function($) {
    var client_id = $("#client_id").text();
    function printFiles(files) {
        let html = "";
        for (let i = 0; i < files.length; i++) {
            html += `
                    <tr>
                        <td>${i + 1}</td>
                        <td><span class="file_name">${files[i].file_name}</span>
                            <img data-id="${files[i].id}" class="edit-file-name" src="http://task.loc/server/assets/images/edit.svg" alt=""></td>
                        <td>
                        <a target="_blank" href="http://task.loc/server/assets/uploads/files/${files[i].file_name}" class="btn btn-success">View</a>
                        
                       <span data-id="${files[i].id}" data-client-id="${client_id}" class="d btn btn-danger">Delete</span>
                       </td>
                    </tr>
                `;
        }

        $("#files").html(html);

        $(".d").on("click",  function() {
            let delete_file = $(this).parents("tr").find('.file_name').text();
            let id = $(this).attr("data-id");
            let id_client = $(this).attr("data-client-id");
            let file_remove = $(this).parents("tr");
            $.ajax({
                url: "http://task.loc/server/routes/web.php",
                method: "get",
                data: {action: "del_file", id:id, id_client:id_client, delete_file},
                success: function (e) {
                    $(file_remove).remove();
                }
            });
        })

        $(".edit-file-name").on("click", function() {
            let doc_name = $(this).parent().find('span').text().split('.')[0];
            let old_name = $(this).parent().find('span').text();
            let file_id = $(this).data("id");
            let file_span = $(this).parent().find('span');
            $(this).parent().append(`<input id='rename_txt' value='${doc_name}' type = 'text'> 
            <img class='close-edit' src='http://task.loc/server/assets/images/closeEdit.svg' alt=''>`);
            $(".close-edit").on("click",  function() {
                let inp_val = $("#rename_txt").val()+'.'+$(this).parent().find('span').text().split('.')[1];
                $.ajax({
                    url:"http://task.loc/server/routes/web.php",
                    method:"get",
                    data:{action:"ren_file", inp_val, file_id, old_name},
                    success:function () {
                        $(file_span).html(inp_val);
                        $("#rename_txt").remove();
                        $(".close-edit").remove();
                    }
                });
            })
        })

    }





    $.ajax({
        url:"http://task.loc/server/routes/web.php",
        method:"get",
        data:{action:"get_files",client_id},
        success:function (response) {
            response = JSON.parse(response)
            console.log(response);
            printFiles(response);
        }
    });

});