$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function removeRow(id, url) {
    if (confirm('Xóa mà không thể khôi phục. Bạn có chắc ?')) {
        $.ajax({
            type: 'DELETE',
            datetype: 'JSON',
            data: { id },
            url: url,
            success: function(result) {
                alert(result.message);
                if (result.error === false) {
                    locasion.reload();
                }
            }
        });
    }
}

$('#upload').change(function() {
    const form = new FormData();
    form.append('file', $(this)[0].files[0]);
    $.ajax({
        processData: false,
        contentType: false,
        type: 'POST',
        dataType: 'JSON',
        data: form,
        url: '/admin/upload/services',
        success: function(results) {
            if (results.error === false) {
                $('#image_show').html('<a href="' +
                    results.url + '" target="_blank"><img src="' +
                    results.url + '" width="100px"></a>');
                $('#thumb').val(results.url);
            } else {
                alert('Upload File Lỗi')
            }
        }
    });
});

function question() {
    const val = $('#candidate :selected').attr('name');
    $('#category').val(val);
    $.ajax({
        type: 'POST',
        data: {
            id: $('#candidate :selected').attr('class')
        },
        url: '/users/setup/add',
        success: function(results) {
            for (var j = 0; j < results.length; j++) {
                $('.question').append(`
                    <option value = "${results[j].id}" >
                        ${results[j].question} 
                    </option>
                `);
            }
        }
    });
}

$('#candidate').change(function() {
    question();
});

var n = 6;
$('.add-question').on('click', function() {
    $('.add-question').before(`
        <div class="form-group" id="remove${n}">
            <label>Câu ${n}</label>
            <i class="fas fa-trash ml-3" onclick="remove(this)"></i>
            <select name="question_id_${n}" class="form-control question">
                <option value="0">Câu Hỏi</option>
            </select>
        </div>
    `);

    question();
    if (n == 10) {
        $('.add-question').empty();
    }
    n++;
});

$('div.remove').unbind('click', 'select.question').on('click', function() {
    console.log(1);
});

function remove(e) {
    var id = $(e).parent().attr('id');
    $(`#${id}`).empty();
}

var pageURL = $(location).attr("href");
for (var i = 1; i <= 20; i++) {
    if (pageURL == `http://127.0.0.1:8000/users/listusers/add/${i}`) {
        for (var j = 1; j < 11; j++) {
            if ($(`.question_id_${j} :selected`).val() == '') {
                $(`.question_id_${j}`).empty();
                $(`.answer_${j}`).empty();
            }
        }
    }
}