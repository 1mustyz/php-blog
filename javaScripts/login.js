console.log('it works');


const myForm = document.querySelector('.myForm');
const msgDomRed = document.querySelector('.msg-red')
const msgDomGreen = document.querySelector('.msg-green');
;

myForm.addEventListener('submit',function (e) {
    e.preventDefault();

    const formData = new FormData(this);

    fetch('./includes/loginuser.inc.php',{
       method: 'post',
      body: formData  
    }).then(function(response) {
        return response.json();
    }).then(function (text) {
        if (text.status == 0){
            msgDomRed.textContent = text.msg;
            msgDomGreen.textContent = ''
        }  
        else {
            msgDomGreen.textContent = text.msg;
            msgDomRed.textContent = '';

        }
        console.log(text);
    }).catch(function (error) {
        console.log(error);
    })
});