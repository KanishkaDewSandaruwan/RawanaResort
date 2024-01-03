/*.............................................................. Grid View ..............................................................*/

window.addEventListener('DOMContentLoaded', event => {
    // Simple-DataTables
    // https://github.com/fiduswriter/Simple-DataTables/wiki

    const datatablesSimple = document.getElementById('datatablesSimple');
    if (datatablesSimple) {
        new simpleDatatables.DataTable(datatablesSimple);
    }
});

const API_PATH = '../server/api.php?function_code=';
const HOME_API_PATH = 'server/api.php?function_code=';


/*.............................................................. Settings Data..............................................................*/

//settings



upImage = (cat_id) => {
    $('#formFile' + cat_id)[0].click();
}


settingsUpdate = (ele, field) => {

    var val = document.getElementById(ele.id).value;

    var data = {
        field: field,
        value: val,
    }

    $.ajax({
        method: "POST",
        url: API_PATH + "changesettings",
        data: data,
        success: function ($data) {
            console.log($data);
            successToast();
        },
        error: function (error) {
            console.log(`Error ${error}`);
        }
    });
}



/*.............................................................. Login..............................................................*/

login = (myForm) => {
    var formData = new FormData(myForm);

    $.ajax({
        method: "POST",
        url: API_PATH + "login",
        data: formData,
        success: function ($data) {
            console.log($data);
            if ($data > 0) {
                if (formData.get("email") == 'admin' || formData.get("email") == 'Admin') {
                    window.location.href = 'index.php';
                } else {
                    window.location.href = '../index.php';
                }
            } else {
                iziToast.error({
                    timeout: 2000,
                    title: 'Error',
                    message: "Username or Password is Wrong",
                });
            }
        },
        cache: false,
        contentType: false,
        processData: false,
        error: function (error) {
            console.log(`Error ${error}`);
        }
    });
}

/*.............................................................. Update Data..............................................................*/


updateData = (ele, id, field, table, id_fild) => {

    var itemid = ele.id;
    var val = document.getElementById(ele.id).value;

    var data = {
        id_fild: id_fild,
        id: id,
        field: field,
        value: val,
        table: table,
    }

    if (field == 'email') {
        if (emailvalidation(val)) {
            callUpdateRequest(data);
        }

    } else if (field == 'phone') {
        if (phonenumber(val)) {
            callUpdateRequest(data);
        }
    } else {
        callUpdateRequest(data);
    }
}

changeDescription = (form) => {
    let fd = new FormData(form);

    $.ajax({
        method: "POST",
        url: API_PATH + "changeDescription",
        data: fd,
        success: function ($data) {
            console.log($data);
            loading("Product Description Saving Success..")

        },
        cache: false,
        contentType: false,
        processData: false,
        error: function (error) {
            console.log(`Error ${error}`);
        }
    });

}

callUpdateRequest = (data) => {

    $.ajax({
        method: "POST",
        url: API_PATH + "updateData",
        data: data,
        success: function ($data) {
            console.log($data);
            successToast();
        },
        error: function (error) {
            console.log(`Error ${error}`);
        }
    });
}

//change password

changePasswordAdmin = (form) => {
    var formData = new FormData(form);

    if (formData.get('current_password').trim() != '') {
        if (formData.get('new_password').trim() != '') {
            if (formData.get('confirm_new_password').trim() != '') {
                if (formData.get('new_password') === formData.get('confirm_new_password')) {
                    if (checkPasswordAdmin(formData.get('current_password'), formData.get('email')) > 0) {

                        var data = {
                            id: formData.get('email'),
                            field: 'password',
                            value: formData.get('new_password'),
                            id_fild: 'email',
                            table: 'customer',
                        }

                        $.ajax({
                            method: "POST",
                            url: API_PATH + "updateData",
                            data: data,
                            success: function ($data) {
                                console.log($data);
                                successToastwithLogoutInAdmin();
                            },
                            error: function (error) {
                                console.log(`Error ${error}`);
                            }
                        });

                    } else { errorMessage("Current Password is Wrong"); }
                } else { errorMessage("Password is Not Match!"); }
            } else { errorMessage("Please Enter Phone Number"); }
        } else { errorMessage("Please Enter New Password"); }
    } else { errorMessage("Please Enter Current Password"); }

}



checkPasswordAdmin = (password, email) => {
    const data = {
        password: password,
        email: email,
    }
    var values;
    $.ajax({
        method: "POST",
        url: API_PATH + "checkPasswordByEmail",
        data: data,
        async: false,
        success: function (data) {
            values = data;
            console.log(data);
        },

        error: function (error) {
            console.log(`Error ${error}`);
        }
    });
    return values;
}

pickData = (ele) => {

    var itemid = ele.id;
    var val = document.getElementById(ele.id).value;

    const data = {
        service_id: val,
    }

    $.ajax({
        method: "POST",
        url: HOME_API_PATH + "getServiceData",
        data: data,
        success: function (data) {
            console.log(data);

            var obj = JSON.parse(data);
            document.getElementById('booking_price').value = obj[0];
            document.getElementById('waiting_time').value = obj[1];
            document.getElementById('number_of_works').value = obj[2];
        },
        error: function (error) {
            console.log(`Error ${error}`);
        }
    });

}


updateSubCatData = (ele, id, field, table, id_fild) => {

    var itemid = ele.id;
    var val = document.getElementById(ele.id).value;

    var data = {
        id_fild: id_fild,
        id: id,
        field: field,
        value: val,
        table: table,
    }


    $.ajax({
        method: "POST",
        url: API_PATH + "updateSubCatData",
        data: data,
        success: function ($data) {
            if ($data > 0) {
                errorMessage_R("You can't Change Subcategory. Because your are the parent category. please change or remove subcategories!");
            } else {
                successToast();
            }
        },
        error: function (error) {
            console.log(`Error ${error}`);
        }
    });

}

insertImage = (ele) => {
    var formData = new FormData(ele);

    $.ajax({
        method: "POST",
        url: API_PATH + "insertImageUpload",
        data: formData,
        success: function ($data) {
            console.log($data);
            loading("Image Uploding...");
        },
        cache: false,
        contentType: false,
        processData: false,
        error: function (error) {
            console.log(`Error ${error}`);
        }
    });
}




$(document).ready(function(){
    $('.sign_in').click(function(){
        $('.login').addClass('active')
        $('.welcome').addClass('active')
        $('.sign_in').addClass('active')
        $('.btn').addClass('active')
        $('.sign_up').addClass('active')
    })
    $('.btn').click(function(){
        $('.sign_up').removeClass('active')
        $('.login').removeClass('active')
        $('.welcome').removeClass('active')
        $('.sign_up').removeClass('active')
        $('.btn').removeClass('active')
        $('.sign_in').removeClass('active')
    })
})
