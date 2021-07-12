var page = {
    ajaxMethod: 'POST',

    add: function() {
        var formData = new FormData();

        formData.append('title', $('#formTitle').val());
        formData.append('content', $('#formContent').val());

        $.ajax({
            url: '/cms.wolf/admin/page/add/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function() {

            },
            success: function(data) {
                console.log('success:');
                console.log(data);
            }
        });
    }
};

console.log(page);