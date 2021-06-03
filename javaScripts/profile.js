console.log('it works');
const profileName = document.querySelector('.profile-name');
const profileAddress = document.querySelector('.profile-address');
const profileEmail = document.querySelector('.icon-envelope');
const profilePhone = document.querySelector('.icon-phone');
const profileImage = document.querySelector('.profile-img');
const uploadForm = document.querySelector('.form-upload');


function inserDom(user) {
    profileName.textContent = user.first_name;
    profilePhone.textContent = user.phone;
    profileEmail.textContent = user.email;
    profileAddress.textContent = user.address;
    profileImage.src = `includes/${user.photo}`;
}

fetch('includes/view-single-user.php',{
       method: 'GET',
      
    }).then(function(response) {
        return response.json();
    }).then(function (text) {
        console.log(text[0].photo);
        inserDom(text[0]);
    }).catch(function (error) {
        console.log(error);
    });

    // uploadForm.addEventListener('submit',function (e) {
    //     e.preventDefault();
    
    //     const formData = new FormData(this);
    //     console.log(formData);
    
    //     fetch('./includes/upload-photo.inc.php',{
    //        method: 'post',
    //       body: formData  
    //     }).then(function(response) {
    //         return response.json();
    //     }).then(function (file) {
    //         // msgDom.textContent = text.msg;
    //         console.log(file);
    //     }).catch(function (error) {
    //         console.log(error);
    //     })
    // });   
