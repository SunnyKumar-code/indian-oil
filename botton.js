var nrosShown = false; // Flag to track if months are shown

function showNro() {
  var nroContainer = document.getElementById("nroContainer");
  
  if (!nrosShown) {
    // Show the months
    nroContainer.style.display = "block";
    nroContainer.innerHTML = ""; // Clear existing content
    
    // Array containing all the months
    var nros = [
      { name: "Northern Regional Office (NRO)", link: "login.php" },
      { name: "Adampur AFS ", link: "login.php" },
      { name: "Agra AFS", link: "login.php" },
      { name: "Allahabad AFS", link: "login.php" },
      { name: "AMBALA AFS", link: "login.php" },
      { name: "Amritsar AFS", link: "login.php" },
      { name: "Awantipur AFS", link: "login.php" },
      { name: "BAREILLY  AFS", link: "login.php" },
      { name: "Bhatinda AFS", link: "login.php" },
      { name: "Chandigarh AFS", link: "login.php" },
      { name: "Damtal AFS (Pathankot)", link: "login.php" },
      { name: "Dehradun AFS", link: "login.php" },
      { name: "Fursatganj AFS", link: "login.php" },
      { name: "Gorakhpur AFS", link: "login.php" },
      { name: "Halwara AFS", link: "login.php" },
      { name: "HINDAN afs", link: "login.php" },
      { name: "Jaipur AFS", link: "login.php" },
      { name: "Jaisalmer AFS", link: "login.php" },
      { name: "JAMMU AFS", link: "login.php" },
      { name: "Jodhpur AFS", link: "login.php" },
      { name: "Kanpur afs", link: "login.php" },
      { name: "Lucknow AFS", link: "login.php" },
      { name: "Mohali AFS", link: "login.php" },
      { name: "NAL AFS", link: "login.php" },
      { name: "PALAM AFS", link: "login.php" },
      { name: "SARSAWA AFS", link: "login.php" },
      { name: "Srinagar AFS", link: "login.php" },
      { name: "Suratgarh AFS", link: "login.php" },
      { name: "Udaipur AFS", link: "login.php" },
      { name: "Uttarlai AFS", link: "login.php" },
      { name: "Varanasi AFS", link: "login.php" },
    ];
    
    // Create an anchor element for each month and append it to the monthContainer
    for (var i = 0; i < nros.length; i++) {
      var nro = document.createElement("a");
      nro.textContent = nros[i].name;
      nro.href = nros[i].link;
      nro.target = "_blank"; // Open link in a new tab/window
      nroContainer.appendChild(nro);
    }
    
    nrosShown = true; // Set the flag to true
  } else {
    // Hide the months
    nroContainer.style.display = "none";
    nrosShown = false; // Set the flag to false
  }
}
  //DSO
  var dsosShown = false; // Flag to track if months are shown

function showDso() {
  var dsoContainer = document.getElementById("dsoContainer");
  
  if (!dsosShown) {
    // Show the months
    dsoContainer.style.display = "block";
    dsoContainer.innerHTML = ""; // Clear existing content
    
    // Array containing all the months
    var dsos = [
      { name: "DSO/DAO", link: "login.php" },
      { name: "Delhi DO", link: "login.php" },
      { name: "Hisar DO", link: "login.php" },
      { name: "Gurgaon DO", link: "login.php" },
      { name: "Panipat DO", link: "login.php" },
      { name: "Karnal AO", link: "login.php" },
      { name: "Panipat Terminal", link: "login.php" },
      { name: "Ambala Terminal", link: "login.php" },
      { name: "Bijwasan Terminal", link: "login.php" },
      { name: "Rewari Terminal", link: "login.php" },
      { name: "Tikrikalan Terminal", link: "login.php" },
      { name: "Madanpurkhadar BP", link: "login.php" },
      { name: "Gurgaon BP", link: "login.php" },
      { name: "Tikrikalan BP", link: "login.php" },
      { name: "Karnal BP", link: "login.php" },
    ];
    
    // Create an anchor element for each month and append it to the monthContainer
    for (var i = 0; i < dsos.length; i++) {
      var dso = document.createElement("a");
      dso.textContent = dsos[i].name;
      dso.href = dsos[i].link;
      dso.target = "_blank"; // Open link in a new tab/window
      dsoContainer.appendChild(dso);
    }
    
    dsosShown = true; // Set the flag to true
  } else {
    // Hide the months
    dsoContainer.style.display = "none";
    dsosShown = false; // Set the flag to false
  }
}
//PSO
var psosShown = false; // Flag to track if months are shown

function showPso() {
  var psoContainer = document.getElementById("psoContainer");
  
  if (!psosShown) {
    // Show the months
    psoContainer.style.display = "block";
    psoContainer.innerHTML = ""; // Clear existing content
    
    // Array containing all the months
    var psos = [
      { name: "AMRITSAR DO  ", link: "login.php" },
      { name: "SHIMLA AO", link: "login.php" },
      { name: "Jalandhar BP", link: "login.php" },
      { name: "Shimla DO", link: "login.php" },
      { name: "Bhatinda Terminal", link: "login.php" },
      { name: "Parwanoo Depot", link: "login.php" },
      { name: "Bhatinda DO", link: "login.php" },
      { name: "Sangrur Terminal", link: "login.php" },
      { name: "Una BP", link: "login.php" },
      { name: "Sangrur DO", link: "login.php" },
      { name: "Jammu BP", link: "login.php" },
      { name: "Jammu Depot", link: "login.php" },
      { name: "Baddi BP", link: "login.php" },
      { name: "Jalandhar AO", link: "login.php" },
      { name: "Nabha BP", link: "login.php" },
      { name: "Kargil Depot", link: "login.php" },
      { name: "Zewan Depot", link: "login.php" },
      { name: "Leh Depot", link: "login.php" },
      { name: "Chandigarh AO", link: "login.php" },
      { name: "Jammu DO/AO", link: "login.php" },
      { name: "Jalandhar Terminal", link: "login.php" },
      { name: "Goindwal LPG BP Project", link: "login.php" },
      { name: "Una terminal", link: "login.php" },
      { name: "Jal DO", link: "login.php" },
      { name: "Chandigarh DO", link: "login.php" },
      { name: "LEH BP", link: "login.php" },
      { name: "Kullu Depot", link: "login.php" },
      { name: "PSO", link: "login.php" },
    ];
    
    // Create an anchor element for each month and append it to the monthContainer
    for (var i = 0; i < psos.length; i++) {
      var pso = document.createElement("a");
      pso.textContent = psos[i].name;
      pso.href = psos[i].link;
      pso.target = "_blank"; // Open link in a new tab/window
      psoContainer.appendChild(pso);
    }
    
    psosShown = true; // Set the flag to true
  } else {
    // Hide the months
    psoContainer.style.display = "none";
    psosShown = false; // Set the flag to false
  }
}
//rso
var rsosShown = false; // Flag to track if months are shown

function showRso() {
  var rsoContainer = document.getElementById("rsoContainer");
  
  if (!rsosShown) {
    // Show the months
    rsoContainer.style.display = "block";
    rsoContainer.innerHTML = ""; // Clear existing content
    
    // Array containing all the months
    var rsos = [
      { name: "Udaipur DO", link: "login.php" },
      { name: "Jaipur DO", link: "login.php" },
      { name: "Shimla DO", link: "login.php" },
      { name: "Ajmer DO", link: "login.php" },
      { name: "Jodhpur DO & Jodhpur AO", link: "login.php" },
      { name: "Jaipur Terminal", link: "login.php" },
      { name: "Bharatpur Terminal", link: "login.php" },
      { name: "Jaipur BP", link: "login.php" },
      { name: "Bikaner BP", link: "login.php" },
      { name: "Ajmer BP", link: "login.php" },
      { name: "Jhunjhunu BP", link: "login.php" },
      { name: "RSO ", link: "login.php" },
      { name: "Jodhpur Terminal", link: "login.php" },
      { name: "CHITTORGARH TERMINAL", link: "login.php" },
    ];
    
    // Create an anchor element for each month and append it to the monthContainer
    for (var i = 0; i < rsos.length; i++) {
      var rso = document.createElement("a");
      rso.textContent = rsos[i].name;
      rso.href = rsos[i].link;
      rso.target = "_blank"; // Open link in a new tab/window
      rsoContainer.appendChild(rso);
    }
    
    rsosShown = true; // Set the flag to true
  } else {
    // Hide the months
    rsoContainer.style.display = "none";
    rsosShown = false; // Set the flag to false
  }
}
//upso1
var upso1sShown = false; // Flag to track if months are shown

function showUpso1() {
  var upso1Container = document.getElementById("upso1Container");
  
  if (!upso1sShown) {
    // Show the months
    upso1Container.style.display = "block";
    upso1Container.innerHTML = ""; // Clear existing content
    
    // Array containing all the months
    var upso1s = [
      { name: "Baitalpur Depot", link: "login.php" },
      { name: "Kanpur Terminal", link: "login.php" },
      { name: "Lucknow Terminal", link: "login.php" },
      { name: "Allahabad Terminal", link: "login.php" },
      { name: "Ambabai Depot", link: "login.php" },
      { name: "Mughalsarai Tml", link: "login.php" },
      { name: "Gonda Depot", link: "login.php" },
      { name: "UPSO-I", link: "login.php" },
      { name: "Lucknow BP", link: "login.php" },
      { name: "Allahabad BP", link: "login.php" },
      { name: "Varanasi BP", link: "login.php" },
      { name: "Kanpur BP", link: "login.php" },
      { name: "Kanpur DO", link: "login.php" },
      { name: "Varanasi DO", link: "login.php" },
      { name: "Gorakhpur DO/AO", link: "login.php" },
      { name: "Allahabad DO/AO", link: "login.php" },
      { name: "Lucknow DO/AO", link: "login.php" },
    ];
    
    // Create an anchor element for each month and append it to the monthContainer
    for (var i = 0; i < upso1s.length; i++) {
      var upso1 = document.createElement("a");
      upso1.textContent = upso1s[i].name;
      upso1.href = upso1s[i].link;
      upso1.target = "_blank"; // Open link in a new tab/window
      upso1Container.appendChild(upso1);
    }
    
    upso1sShown = true; // Set the flag to true
  } else {
    // Hide the months
    upso1Container.style.display = "none";
    upso1sShown = false; // Set the flag to false
  }
}
//upso2
var upso2sShown = false; // Flag to track if months are shown

function showUpso2() {
  var upso2Container = document.getElementById("upso2Container");
  
  if (!upso2sShown) {
    // Show the months
    upso2Container.style.display = "block";
    upso2Container.innerHTML = ""; // Clear existing content
    
    // Array containing all the months
    var upso2s = [
      { name: "UPSO-II, SO", link: "login.php" },
      { name: "Noida DO", link: "login.php" },
      { name: "Agra DO", link: "login.php" },
      { name: "Dehradun DO", link: "login.php" },
      { name: "Bareilly DO & AO", link: "login.php" },
      { name: "Moradabad DO", link: "login.php" },
      { name: "Noida AO", link: "login.php" },
      { name: "Agra AO", link: "login.php" },
      { name: "Dehradun AO", link: "login.php" },
      { name: "Mathura Marketing Terminal", link: "login.php" },
      { name: "BDFP Mathura", link: "login.php" },
      { name: "MCO Mathura", link: "login.php" },
      { name: "Agra TOP", link: "login.php" },
      { name: "Meerut Terminal", link: "login.php" },
      { name: "Najibabad Terminal", link: "login.php" },
      { name: "Banthra Depot", link: "login.php" },
      { name: "Aonla Depot", link: "login.php" },
      { name: "Roorkee Terminal", link: "login.php" },
      { name: "Lalkuan Depot", link: "login.php" },
      { name: "Mathura BP", link: "login.php" },
      { name: "Loni BP", link: "login.php" },
      { name: "Aligarh BP", link: "login.php" },
      { name: "Kashipur BP", link: "login.php" },
      { name: "Lakhimpur Kheri BP", link: "login.php" },
      { name: "Etawah BP", link: "login.php" },
      { name: "Farukhabad BP", link: "login.php" },
      { name: "Haldwani", link: "login.php" },
      { name: "Hardwar BP", link: "login.php" },
      { name: "Shahjahanpur BP", link: "login.php" },
    ];
    
    // Create an anchor element for each month and append it to the monthContainer
    for (var i = 0; i < upso2s.length; i++) {
      var upso2 = document.createElement("a");
      upso2.textContent = upso2s[i].name;
      upso2.href = upso2s[i].link;
      upso2.target = "_blank"; // Open link in a new tab/window
      upso2Container.appendChild(upso2);
    }
    
    upso2sShown = true; // Set the flag to true
  } else {
    // Hide the months
    upso2Container.style.display = "none";
    upso2sShown = false; // Set the flag to false
  }
}
// lubes
var lubessShown = false; // Flag to track if months are shown

function showLubes() {
  var lubesContainer = document.getElementById("lubesContainer");
  
  if (!lubessShown) {
    // Show the months
    lubesContainer.style.display = "block";
    lubesContainer.innerHTML = ""; // Clear existing content
    
    // Array containing all the months
    var lubess = [
      { name: "SCFP-Manesar", link: "login.php" },
      { name: "Asaoti LBP", link: "login.php" },
      { name: "CIP LBP ASAOTI", link: "login.php" },
      { name: "SCFP", link: "login.php" },
    ];
    
    // Create an anchor element for each month and append it to the monthContainer
    for (var i = 0; i < lubess.length; i++) {
      var lubes = document.createElement("a");
      lubes.textContent = lubess[i].name;
      lubes.href = lubess[i].link;
      lubes.target = "_blank"; // Open link in a new tab/window
      lubesContainer.appendChild(lubes);
    }
    
    lubessShown = true; // Set the flag to true
  } else {
    // Hide the months
    lubesContainer.style.display = "none";
    lubessShown = false; // Set the flag to false
  }
}