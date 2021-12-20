var controller = new Vue({
    el: '#controller',
    data: {
        datas: [],
        data: {},
        actionUrl,
        apiUrl,
        editStatus: false,
        genderStatus: false,
    },
    mounted: function() {
        this.datatable();
    },
    methods: {
        datatable() {
            const _this = this;
            _this.table = $('#datatable').DataTable({
                ajax: {
                    url: _this.apiUrl,
                    type: 'GET',
                },
                columns,
            }).on('xhr', function() {
                _this.datas = _this.table.ajax.json().data;
            });
        },
        addData() {
            this.data = {};
            $('#modal-default').modal();

        },
        editData(event, row) {
            this.data = this.datas[row];
            this.editStatus = true;
            $('#modal-default').modal();
        },
        deleteData(event, id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $(event.target).parents('tr').remove();
                    axios.post(this.actionUrl + '/' + id, {
                        _method: 'DELETE'
                    }).then(response => {
                        Swal.fire(
                            'Good job!',
                            'Your data has been deleted',
                            'success'
                        );
                    });
                };
            });
        },
        submitForm(event, id) {
            event.preventDefault();
            const _this = this;
            var actionUrl = !this.editStatus ? this.actionUrl : this.actionUrl + '/' + id;
            axios
                .post(actionUrl, new FormData($(event.target)[0]))
                .then(response => {
                    $('#modal-default').modal('hide');
                    _this.table.ajax.reload();
                    Swal.fire(
                        'Good job!',
                        'Thanks Bro',
                        'success'
                    );
                })
                .catch(function(error) {
                    if (error.response) {
                        var message_error = error.response.data.errors;
                        var error_element = "";
                        $.each(
                            // console.log(message_error),
                            message_error,
                            function(indexInArray, valueOfElement) {
                                // error_element += `<div clas='text-danger'> ${valueOfElement}</div> <br>`;
                                error_element += `<div class="alert alert-danger" role="alert">
                                ${valueOfElement} </div>`
                            },
                        );

                        Swal.fire({
                            position: "top",
                            icon: "error",
                            title: 'Oops...',
                            html: error_element,
                            confirmButtonText: "Again !",
                        });
                    }
                });

        },


    }
});