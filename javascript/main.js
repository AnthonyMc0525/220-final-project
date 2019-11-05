const role = document.getElementById('role').value;
role.addEventListener("change", (event) => {
  if(role == "Patient"){
    let patientId = document.createElement("input");
    patientId.type = "text";
    role.append(patientId);
    let group = document.createElement("input");
    group.type = "text";
    role.append(group);
    let addDate = document.createElement("input");
    addDate.type = "text";
    role.append(addData);
    let currDate = document.createElement("input");
    currDate.type = "text";

    let form = document.getElementById("register-form");
    form.appendChild(currDate);
  }
});
