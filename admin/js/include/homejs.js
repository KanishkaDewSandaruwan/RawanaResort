addContactMessage = (form) => {
  var formData = new FormData(form);

  if (formData.get("name").trim() != "") {
    if (formData.get("email").trim() != "") {
      if (formData.get("subject").trim() != "") {
        if (formData.get("message").trim() != "") {
          $.ajax({
            method: "POST",
            url: HOME_API_PATH + "addcontact",
            data: formData,
            success: function ($data) {
              console.log($data);
              successToast();
            },
            cache: false,
            contentType: false,
            processData: false,
            error: function (error) {
              console.log(`Error ${error}`);
            },
          });
        } else {
          errorMessage("Please Enter Message");
        }
      } else {
        errorMessage("Please Enter Subject");
      }
    } else {
      errorMessage("Please Enter Email Address");
    }
  } else {
    errorMessage("Please Enter Your Name");
  }
};

updatedDate = (form) => {
  var formData = new FormData(form);

  if (formData.get("change_date").trim() != "") {
    var end_date = new Date(formData.get("end_date"));
    var changed_date = new Date(formData.get("change_date"));

    var Difference_In_Time = changed_date.getTime() - end_date.getTime();
    var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);

    if (Difference_In_Days > 0) {
      var sub_total = Difference_In_Days * formData.get("vehicle_price");
      var new_total = parseInt(sub_total) + parseInt(formData.get("total"));

      document.getElementById("extended_total").value = new_total;
      document.getElementById("changed_date").value =
        formData.get("change_date");
      document.getElementById("num_ofDays").value = Difference_In_Days;
      document.getElementById("current_total").value = formData.get("total");
    } else {
      errorMessage("Please Select Future Date");
    }
  } else {
    errorMessage("Please Select the Date");
  }
};

makeBooking = (form) => {
  var formData = new FormData(form);

  $.ajax({
    method: "POST",
    url: HOME_API_PATH + "addBooking",
    data: formData,
    success: function ($data) {
      console.log($data);
      if ($data > 0) {
        errorMessage("This Time is Already Taken! Please Select Other Time");
      } else {
        successToast();
      }
    },
    cache: false,
    contentType: false,
    processData: false,
    error: function (error) {
      console.log(`Error ${error}`);
    },
  });
};

//profile changers

changeEmail = (form) => {
  var formData = new FormData(form);

  if (formData.get("current_email").trim() != "") {
    if (formData.get("new_email").trim() != "") {
      if (
        checkEmail(formData.get("current_email"), formData.get("customer_id")) >
        0
      ) {
        var data = {
          id: formData.get("customer_id"),
          field: "email",
          value: formData.get("new_email"),
          id_fild: "customer_id",
          table: "customer",
        };

        $.ajax({
          method: "POST",
          url: HOME_API_PATH + "updateData",
          data: data,
          success: function ($data) {
            console.log($data);
            successToastwithLogout();
          },
          error: function (error) {
            console.log(`Error ${error}`);
          },
        });
      } else {
        errorMessage("Current Emaiil is Wrong!");
      }
    } else {
      errorMessage("Please Enter Email Address");
    }
  } else {
    errorMessage("Please Enter Your Name");
  }
};

changePassword = (form) => {
  var formData = new FormData(form);

  if (formData.get("current_password").trim() != "") {
    if (formData.get("new_password").trim() != "") {
      if (formData.get("confirm_new_password").trim() != "") {
        if (
          formData.get("new_password") === formData.get("confirm_new_password")
        ) {
          if (
            checkPassword(
              formData.get("current_password"),
              formData.get("customer_id")
            ) > 0
          ) {
            var data = {
              id: formData.get("customer_id"),
              field: "password",
              value: formData.get("new_password"),
              id_fild: "customer_id",
              table: "customer",
            };

            $.ajax({
              method: "POST",
              url: HOME_API_PATH + "updateData",
              data: data,
              success: function ($data) {
                console.log($data);
                successToastwithLogout();
              },
              error: function (error) {
                console.log(`Error ${error}`);
              },
            });
          } else {
            errorMessage("Current Password is Wrong");
          }
        } else {
          errorMessage("Password is Not Match!");
        }
      } else {
        errorMessage("Please Enter Phone Number");
      }
    } else {
      errorMessage("Please Enter New Password");
    }
  } else {
    errorMessage("Please Enter Current Password");
  }
};

checkPassword = (password, customer_id) => {
  const data = {
    password: password,
    customer_id: customer_id,
  };
  var values;
  $.ajax({
    method: "POST",
    url: HOME_API_PATH + "checkPassword",
    data: data,
    async: false,
    success: function (data) {
      values = data;
      console.log(data);
    },

    error: function (error) {
      console.log(`Error ${error}`);
    },
  });
  return values;
};

function checkEmail(email, customer_id) {
  const data = {
    email: email,
    customer_id: customer_id,
  };
  var values;

  $.ajax({
    method: "POST",
    url: HOME_API_PATH + "checkEmail",
    data: data,
    async: false,
    success: function (data) {
      console.log(data);
      values = data;
    },
    error: function (error) {
      console.log(`Error ${error}`);
    },
  });

  return values;
}

updateDataFromHome = (ele, id, field, table, id_fild) => {
  var itemid = ele.id;
  var val = document.getElementById(ele.id).value;

  var data = {
    id_fild: id_fild,
    id: id,
    field: field,
    value: val,
    table: table,
  };

  if (field == "email") {
    if (emailvalidation(val)) {
      callUpdateRequestFromHome(data);
    }
  } else if (field == "phone") {
    if (phonenumber(val)) {
      callUpdateRequestFromHome(data);
    }
  } else {
    callUpdateRequestFromHome(data);
  }
};

updateStatusFromHome = (value, id, field, table, id_fild) => {
  Swal.fire({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, Cancel it!",
  }).then((result) => {
    if (result.isConfirmed) {
      var data = {
        id_fild: id_fild,
        id: id,
        field: field,
        value: value,
        table: table,
      };

      callUpdateRequestFromHome(data);

      Swal.fire("Canceled!", "Your file has been Canceled.", "success");
    }
  });
};

deleteDataFromHome = (id, table, id_fild) => {
  Swal.fire({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, delete it!",
  }).then((result) => {
    if (result.isConfirmed) {
      var data = {
        id: id,
        table: table,
        id_fild: id_fild,
      };

      console.log(data);

      $.ajax({
        method: "POST",
        url: HOME_API_PATH + "deleteData",
        data: data,
        success: function ($data) {
          console.log($data);
          successToastwithLogout();
        },
        error: function (error) {
          console.log(`Error ${error}`);
        },
      });
      Swal.fire("Deleted!", "Your file has been deleted.", "success");
    }
  });
};

bookRoom = (form) => {
  var formData = new FormData(form);

  Swal.fire({
    title: "Are you sure?",
    text: "You won't Book This Room!",
    icon: "info",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, Make Booking it!",
  }).then((result) => {
    if (result.isConfirmed) {
      var data = {
        room_id: formData.get("room_id"),
        arrival_date: formData.get("arrival_date"),
        departure_date: formData.get("departure_date"),
        customer_id: formData.get("customer_id"),
        total: formData.get("total"),
        booking_occupancy: formData.get("booking_occupancy"),
        name: formData.get("name"),
        email: formData.get("email"),
        phone: formData.get("phone"),
        nic: formData.get("nic"),
        address: formData.get("address"),
      };

      $.ajax({
        method: "POST",
        url: HOME_API_PATH + "addBooking",
        data: data,
        success: function ($data) {
          console.log($data);
          
          // Send email to the customer
          sendEmailToCustomer(data.email, data.name, data.arrival_date, data.departure_date, data.total );
          
          successToast();
          window.location.href = 'index.php'
        },
        error: function (error) {
          console.log(`Error ${error}`);
        },
      });

      Swal.fire("Saved!", "Your Booking has been Saved.", "success");
    }
  });
};

function sendEmailToCustomer(customerEmail, name, arrival_date, departure_date, total) {
  // Server-side script to send email using PHPMailer
  $.ajax({
    method: "POST",
    url: "server/PHPMailer-master/src/sendEmail.php", // Create this file on the server
    data: { 
      email: customerEmail, 
      name: name, 
      arrival_date: arrival_date, 
      departure_date: departure_date, 
      total: total 
     },
    success: function (response) {
      console.log(response);
    },
    error: function (error) {
      console.log(`Error ${error}`);
    },
  });
}

bookpackage = (form) => {
  var formData = new FormData(form);

  if (
    document.getElementById("p_name").value.trim() != "" &&
    document.getElementById("exdate").value.trim() != "" &&
    document.getElementById("cvv").value.trim() != ""
  ) {
    Swal.fire({
      title: "Are you sure?",
      text: "You won't Book This Package!",
      icon: "info",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, Make Booking it!",
    }).then((result) => {
      if (result.isConfirmed) {
        var data = {
          customer_id: formData.get("customer_id"),
          package_id: formData.get("package_id"),
          total: formData.get("total"),
          traval_start_date: formData.get("traval_start_date"),
        };

        $.ajax({
          method: "POST",
          url: HOME_API_PATH + "bookpackage",
          data: data,
          success: function ($data) {
            console.log($data);
            successToastRedirect("rent_confirmation.php?order_id=" + $data);
          },
          error: function (error) {
            console.log(`Error ${error}`);
          },
        });
        Swal.fire("Saved!", "Your Booking has been Saved.", "success");
      }
    });
  } else {
    errorMessage("Please Enter Card Details");
  }
};

callUpdateRequestFromHome = (data) => {
  $.ajax({
    method: "POST",
    url: HOME_API_PATH + "updateData",
    data: data,
    success: function ($data) {
      console.log($data);
      successToast();
    },
    error: function (error) {
      console.log(`Error ${error}`);
    },
  });
};

search = (form) => {
  var formData = new FormData(form);
  var arrival_date = formData.get("arrival_date");
  var departure_date = formData.get("departure_date");
  var booking_occupancy = formData.get("booking_occupancy");
  console.log(booking_occupancy);

  var q = new Date();
  var date = new Date(q.getFullYear(), q.getMonth(), q.getDate());
  var mydate = new Date(formData.get("arrival_date"));

  if (mydate > date) {
    if (booking_occupancy != 0) {
      if (
        formData.get("arrival_date").trim() != "" &&
        formData.get("departure_date").trim() != "" &&
        formData.get("booking_occupancy") != 0
      ) {
        window.location.href =
          "accomodation.php?arrival_date=" +
          arrival_date +
          "&departure_date=" +
          departure_date +
          "&booking_occupancy=" +
          booking_occupancy;
      } else {
        window.location.href = "index.php";
      }
    } else {
      errorMessage("Please Select Occupancy");
    }
  } else {
    errorMessage("Please Select fuature Date");
  }
};
