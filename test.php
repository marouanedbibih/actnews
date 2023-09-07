<!DOCTYPE html>
<html>
<head>
    <title>Upload and Send File</title>
</head>
<body>
    <form id="uploadForm" enctype="multipart/form-data">
        <input type="file" name="fileToUpload" id="fileToUpload">
        <button type="button" id="sendButton">Send Data</button>
    </form>

    <script>
        document.getElementById("sendButton").addEventListener("click", sendData);

        function sendData() {
            var formData = new FormData(document.getElementById("uploadForm"));

            fetch('http://localhost/ActNews/api/php/api.php?action=addUserImage', {
                method: 'POST',
                body: formData,
            })
            .then(response => response.text())
            .then(data => {
                console.log(data);  // You can handle the response from PHP here
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
    </script>
</body>
</html>
