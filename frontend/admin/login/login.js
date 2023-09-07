import API from "../../../api/js/api.js";
const apiUrl = 'http://localhost/ActNews/api/php/api.php'; // Update with your API URL
const api = new API(apiUrl);


const login_form = document.querySelector('#login-form');
login_form.addEventListener('submit', function (event) {
    event.preventDefault();
    const email = document.querySelector('#email').value;
    const password = document.querySelector('#password').value;
    const data = {
        email: email,
        password: password
    }
    console.log(data);
    api.post('login', data)
        .then(response => {
            console.log(response);
            if (response.message) {
                window.location.href = 'http://localhost/ActNews/frontend/admin/user/user.php';
            }
            else if (response.error) {
                alert(response.error)
            }
        })
})