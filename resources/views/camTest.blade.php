<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vue Camera Test</title>
</head>

<body>
    <div id="app">
        <webcam ref="webcam" @photoTaken="photoTakenEvent" @init="webcamInit"></webcam>

        <select @change="setCamera" v-model="deviceId">
            <option value="">-</option>
            <option v-for="camera in cameras" :value="camera.deviceId">
              <v-text>{{ camera.label }}</v-text>
            </option>
        </select>
        <button @click="takePhoto">Take a photo</button>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue-web-cam@latest/dist/vue-web-cam.min.js"></script>

    <script>
        new Vue({
            el: '#app',
            data() {
                return {
                    cameras: [],
                    deviceId: ''
                }
            },
            methods: {
                async takePhoto() {
                    try {
                        await this.$refs.webcam.takePhoto();
                    } catch (err) {
                        console.log(err)
                    }
                },
                loadCameras() {
                    this.$refs.webcam.loadCameras();
                    this.cameras = this.$refs.webcam.cameras;
                },
                webcamInit(deviceId) {
                    this.deviceId = deviceId;
                },
                setCamera() {
                    this.$refs.webcam.changeCamera(this.deviceId === '' ? null : this.deviceId);
                },
                photoTakenEvent({
                    blob,
                    image_data_url
                }) {
                    // handle photo
                }
            },
            mounted() {
                this.loadCameras();

                if (this.cameras.length === 0) {
                    let reloadCamInterval = setInterval(() => {
                        this.loadCameras();
                        if (this.cameras.length > 0) {
                            clearInterval(reloadCamInterval);
                        }
                    }, 1000);
                }
            }
        })
    </script>
</body>

</html>
