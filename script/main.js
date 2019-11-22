//for the register page. shows patient form
let role = document.getElementById('role');
role.addEventListener("change", (event) => {
  let chosen = role.options[role.selectedIndex].id;
  console.log(chosen);
  if(chosen == 'patient'){
    let Lemergency = document.getElementById("Elabel");
    Lemergency.style.visibility = "visible";
    let emergency = document.getElementById("Econtact");
    emergency.style.visibility = "visible";
    let relation = document.getElementById("relationTo");
    relation.style.visibility = "visible";
    let Lrelation = document.getElementById("relationLabel");
    Lrelation.style.visibility = "visible";
  } else if (chosen != 'patient'){
    let Lemergency = document.getElementById("Elabel");
    Lemergency.style.visibility = "hidden";
    let emergency = document.getElementById("Econtact");
    emergency.style.visibility = "hidden";
    let relation = document.getElementById("relationTo");
    relation.style.visibility = "hidden";
    let Lrelation = document.getElementById("relationLabel");
    Lrelation.style.visibility = "hidden";
  }
});
