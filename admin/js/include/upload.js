uploadImage = (ele) => {
    var formData = new FormData(ele);

    $.ajax({
        method: "POST",
        url: API_PATH + "imageUploadCategory",


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

uploadImageroomEdit = (ele) => {
    var formData = new FormData(ele);

    $.ajax({
        method: "POST",
        url: API_PATH + "uploadImageroomEdit",


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

uploadImagevehicleEdit = (ele) => {
    var formData = new FormData(ele);

    $.ajax({
        method: "POST",
        url: API_PATH + "uploadImagevehicleEdit",


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

uploadImageLocationEdit = (ele) => {
    var formData = new FormData(ele);

    $.ajax({
        method: "POST",
        url: API_PATH + "uploadImageLocationEdit",


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

uploadSettingImage = (ele) => {
    var formData = new FormData(ele);

    $.ajax({
        method: "POST",
        url: API_PATH + "SettingImage",
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