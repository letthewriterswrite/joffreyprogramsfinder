document.getElementById("findprogram-btn").addEventListener("click",slideNav);

//Location Or Dance Style
document.getElementById("selectProgramOption").addEventListener("click",selectProgramOption);

//Buttons
document.getElementById("selectProgramLocation").addEventListener("click",submitProgramLocation);
document.getElementById("submitStyle").addEventListener("click",submitStyle);





function selectProgramOption()
{
    if(document.getElementById("program-location").checked == true)
    {
        nextPre();
    }else if(document.getElementById("dance-style").checked == true)
    {
        displayDanceStyle();
    }
    
}






function displayDanceStyle()
{
    //Runs a custom version of nextPre because of conditional option
    var x = document.getElementsByClassName("tab-program");
    x[currentTab].style.display = "none";
    currentTab++;
    
    document.getElementById('danceStyleContainer').style.display = "block";
    
    
}
function submitProgramLocation()
{
    document.getElementById("programForm").submit();
}

function submitStyle ()
{
     document.getElementById("programForm").submit();
}

function slideNav()
{
    if(document.getElementById("joffrey-program-sidenav").className==="joffrey-program-sidenav"){
        document.getElementById("joffrey-program-sidenav").className="joffrey-program-sidenav-active";
        document.getElementById("programForm").className="transparent-program-active";
    }else{
        document.getElementById("joffrey-program-sidenav").className = "joffrey-program-sidenav";
        document.getElementById("programForm").className = "transparent-program";
    }
}




var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form ...
  var x = document.getElementsByClassName("tab-program");
  x[n].style.display = "block";



}

function nextPre () {
    var x = document.getElementsByClassName("tab-program");
    x[currentTab].style.display = "none";
    currentTab++;
    showTab(currentTab);
}
