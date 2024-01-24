<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vue Camera Test</title>
    <script src="https://unpkg.com/html5-qrcode@2.0.8/minified/html5-qrcode.min.js"></script>

</head>

<body>
    <div id="reader"></div>
</body>
<script>
    const qrCodeScanner = new Html5Qrcode("reader");

    qrCodeScanner.start(
        { facingMode: "environment" }, // camera parameters
        {}, // configuration object
        (decodedText) => { // success callback function
            // handle decoded text
            console.log(`QR Code scanned: ${decodedText}`);
        },
        (errorMessage) => { // error callback function
            // handle error
            console.log(`Error scanning QR Code: ${errorMessage}`);
        }
    ).catch((err) => {
        console.log("Error starting scanner: ", err);
    });
</script>
<script>
    qrCodeScanner.stop().then((ignore) => {
        // QR Code scanner stopped
    }).catch((err) => {
        // Stop failed, handle it.
    });
</script>

</html>
