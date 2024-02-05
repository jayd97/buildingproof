const container = document.getElementById('container');
const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');
const policyBox = document.getElementById('policyBox');




const acceptBtn = document.getElementById('accept');



registerBtn.addEventListener('click', () => {
    
    container.classList.add("active");
    policyBox.style.visibility = "visible";
 
});


loginBtn.addEventListener('click', () => {
    container.classList.remove("active");
    
});


document.getElementById('decline').addEventListener('click', function() {
    document.getElementById('policyBox').style.display = 'none';  
    window.location.href = 'log_in_EN.php';
});


