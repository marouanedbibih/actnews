export default class API {
    constructor(apiUrl) {
        this.apiUrl = apiUrl;
    }

    async get(endpoint) {
        try {
            const response = await fetch(`${this.apiUrl}?action=${endpoint}`, {
                method: 'GET',
            });

            if (!response.ok) {
                throw new Error('Network response was not ok');
            }

            return response.json();
        } catch (error) {
            console.error('Error getting data:', error);
            return null;
        }
    }
    async getById(endpoint, id) {
        try {
            const response = await fetch(`${this.apiUrl}?action=${endpoint}&id=${id}`, {
                method: 'GET',
            });
            if (!response.ok) {
                throw new Error("Network Response Not OK");
            }
            return response.json();
        } catch (error) {
            console.error('Error gettign data', error);
            return null;
        }
    }

    async post(endpoint, data) {
        try {
            const response = await fetch(`${this.apiUrl}?action=${endpoint}`, {
                "method": 'POST',
                "headers": {
                    'Content-Type': 'application/json'
                },
                "body": JSON.stringify(data)
            });

            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            console.log('request sent succufly');
            return response.json();
        } catch (error) {
            console.error('Error posting data:', error);
            return null;
        }
    }

    async put(endpoint, data) {
        try {
            const response = await fetch(`${this.apiUrl}?action=${endpoint}`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            });

            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }

            return response.json();
        } catch (error) {
            console.error('Error updating data:', error);
            return null;
        }
    }

    async delete(endpoint, data) {
        try {
            const response = await fetch(`${this.apiUrl}?action=${endpoint}`, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            });

            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }

            return response.json();
        } catch (error) {
            console.error('Error deleting data:', error);
            return null;
        }
    }

    async upload(endpoint, data, id) {
        try {
            const formData = new FormData();
            formData.append('image', data);
            formData.append('id', id);

            const response = await fetch(`${this.apiUrl}?action=${endpoint}`, {
                method: 'POST',
                body: formData,
            });

            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }

            const responseData = await response.json();

            console.log(responseData.message); // You can handle the response from the server
            return responseData; // Return the response data if needed
        } catch (error) {
            console.error('Error:', error);
            return null;
        }
    }

    async postFormData(endpoint, formData) {
        try {
            const response = await fetch(`${this.apiUrl}?action=${endpoint}`, {
                method: 'POST',
                body: formData,
            });

            if (response){
                const jsonResponse = await response.json();
                console.log(jsonResponse);
                return jsonResponse
            }

        } catch (error) {
            console.error('Error posting data:', error);
            return null;
        }
    }
}