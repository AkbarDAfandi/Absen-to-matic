@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('QR Code Scanner') }}</div>

                <div class="card-body">
                    <div id="qr-reader" style="width:500px"></div>
                    <div id="qr-reader-results"></div>

                    <script src="https://unpkg.com/html5-qrcode"></script>
                    <script>
                        var resultContainer = document.getElementById('qr-reader-results');
                        var lastResult, countResults = 0;

                        function onScanSuccess(decodedText, decodedResult) {
                            if (decodedText !== lastResult) {
                                ++countResults;
                                lastResult = decodedText;
                                // Handle on success condition with the decoded message.
                                console.log(`Scan result ${decodedText}`, decodedResult);
                            }
                        }

                        var html5QrcodeScanner = new Html5QrcodeScanner(
                            "qr-reader", { fps: 10, qrbox: 250 });
                        html5QrcodeScanner.render(onScanSuccess);
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

