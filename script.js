var StudentModel;
function student() {
    // alert("ok");
    var model = document.getElementById("studentModal");
    StudentModel = new bootstrap.Modal(model);
    StudentModel.show();

}




function adminLogin() {
    // alert("Ok");
    var email = document.getElementById("email");
    var password = document.getElementById("password");

    var from = new FormData();
    from.append("email", email.value);
    from.append("password", password.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;
            if (response == "Success") {
                window.location = "adminPanel.php";

            } else {
                alert(response);
            }


        }
    };
    request.open("POST", "AdminLoginProcess.php", true);
    request.send(from);


}


function logOut() {
    var req = new XMLHttpRequest();
    req.onreadystatechange = function () {
        if (req.readyState == 4 && req.status == 200) {
            var res = req.responseText;
            if (res == "success") {
                window.location.reload();
            } else {
                alert(res);
            }

        }
    };
    req.open("POST", "logoutProcess.php", true);
    req.send();

}

function Signup() {
    // alert("Ok");
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var nic = document.getElementById("nic");
    var line1 = document.getElementById("line1");
    var line2 = document.getElementById("line2");
    var mobile = document.getElementById("mobile");
    var gender = document.getElementById("gender");
    var course = document.getElementById("course");


    var form = new FormData();
    form.append("fname", fname.value);
    form.append("lname", lname.value);
    form.append("nic", nic.value);
    form.append("line1", line1.value);
    form.append("line2", line2.value);
    form.append("mobile", mobile.value);
    form.append("gender", gender.value);
    form.append("course", course.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var res = request.responseText;

            if (res == "Done") {
                window.location.reload();
            } else {
                alert(res);
            }


        }
    };
    request.open("POST", "studentRegister.php", true);
    request.send(form);


}

// Delete
function Delete(id){
    // alert(id);

   var res = new XMLHttpRequest();
   res.onreadystatechange=function(){
    if(res.readyState==4&&res.status==200){
       var rsp = res.responseText;
       if(rsp=="Succes"){
        window.location.reload();
       }else{
        alert(rsp);
       }
       
    }
   }
   res.open("GET","DeleteStudent.php?id="+id,true);
   res.send();

}
//Delete

//update Student
function updateStudent(id){
    // alert(id);
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var nic = document.getElementById("nic");
    var mobile = document.getElementById("mobile");
    var line1 = document.getElementById("line1");
    var line2 = document.getElementById("line2");

    var form = new FormData();
    form.append("fname", fname.value);
    form.append("lname", lname.value);
    form.append("nic", nic.value);
    form.append("line1", line1.value);
    form.append("line2", line2.value);
    form.append("mobile", mobile.value);


    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var res = request.responseText;

            if (res == "Done") {
                window.location.reload();
            } else {
                alert(res);
            }


        }
    };
    request.open("POST", "UpdateStudentProcess.php?id="+id, true);
    request.send(form);
    
}
//update student END


