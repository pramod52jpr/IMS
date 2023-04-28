document.getElementById("loginBtn").addEventListener("click",()=>{
    document.getElementById("form1").style.display="flex";
    document.getElementById("form2").style.display="none";
    document.getElementById("loginBtn").style.border="none";
    document.getElementById("regBtn").style.border="none";
    document.getElementById("loginBtn").style.borderTop="2px solid red";
    document.getElementById("regBtn").style.borderBottom="1px solid rgba(0, 0, 0, 0.103)";
    document.getElementById("regBtn").style.borderLeft="1px solid rgba(0, 0, 0, 0.103)";
})
document.getElementById("regBtn").addEventListener("click",()=>{
    document.getElementById("form1").style.display="none";
    document.getElementById("form2").style.display="flex";
    document.getElementById("loginBtn").style.border="none";
    document.getElementById("regBtn").style.border="none";
    document.getElementById("regBtn").style.borderTop="2px solid red";
    document.getElementById("loginBtn").style.borderBottom="1px solid rgba(0, 0, 0, 0.103)";
    document.getElementById("loginBtn").style.borderRight="1px solid rgba(0, 0, 0, 0.103)";
})