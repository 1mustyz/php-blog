console.log('it works');


const myForm = document.querySelector('.myForm');
const msgDom = document.querySelectorAll('.msg');

myForm.addEventListener('submit',function (e) {
    e.preventDefault();

    const formData = new FormData(this);

    fetch('./includes/adduser.inc.php',{
       method: 'post',
      body: formData  
    }).then(function(response) {
        return response.json();
    }).then(function (text) {
        msgDom.forEach((el)=>{
            el.textContent = text.msg
        });
        console.log(text);
    }).catch(function (error) {
        console.log(error);
    })
});