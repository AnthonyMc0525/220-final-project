let role = document.getElementById('role');
console.log(role);
role.addEventListener("change", (event) => {
  console.log('Hello world');
  let chosen = role.options[role.selectedIndex].value;
  if(chosen == "Patient"){
    let patientId = document.getElementById("patientId");
    patientId.style.visibility = "visible";
    let group = document.getElementById("group");
    group.style.visibility = "visible";
    let addDate = document.getElementById("admission-date");
    addDate.style.visibility = "visible";
    let currDate = document.getElementById("date");
    currDate.style.visibility = "visible";
  } else {
    let patientId = document.getElementById("patientId");
    patientId.style.visibility = "hidden";
    let group = document.getElementById("group");
    group.style.visibility = "hidden";
    let addDate = document.getElementById("admission-date");
    addDate.style.visibility = "hidden";
    let currDate = document.getElementById("date");
    currDate.style.visibility = "hidden";

  }
});
